<?php

namespace App\Controller;

use JsonSerializable;
use App\Entity\Candidacy;
use App\Repository\OfferRepository;
use App\Repository\StatusRepository;
use App\Repository\PartnerRepository;
use App\Repository\CandidacyRepository;
use App\Repository\WorkFieldRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api', name: 'api_')]
class ApiController extends AbstractController
{
    #[Route('/partner_details/{id}', methods: ['GET'], name: 'partner_details')]
    public function partnerDetails(PartnerRepository $partnerRepository, int $id): Response
    {
        $partner = $partnerRepository->findOneBy(['id' => $id]);

        $recruiters = [];
        foreach ($partner->getRecruiters() as $recruiter) {
            $recruiters[] = ['id' => $recruiter->getId(), 'fullname' => $recruiter->getFullname()];
        }
        return new JsonResponse($recruiters);
    }

    #[Route('/work_field_details/{id}', methods: ['GET'], name: 'workfield_details')]
    public function workFieldDetails(WorkFieldRepository $workFieldRepository, int $id): Response
    {
        $workfield = $workFieldRepository->findOneBy(['id' => $id]);

        $stacks = [];
        foreach ($workfield->getstacks() as $stack) {
            $stacks[] = ['id' => $stack->getId(), 'name' => $stack->getName()];
        }
        return new JsonResponse($stacks);
    }

    #[Route('/edit_candidacy_status/{id}/{newStatus}', name: 'edit_candidacy_status', methods: ['GET', 'POST'])]
    #[Entity('candidacy', options: ['mapping' => ['id' => 'id']])]
    #[Entity('status', options: ['mapping' => ['newStatus' => 'status']])]
    #[IsGranted('ROLE_EDITOR')]
    public function editCandidacyStatus(
        string $newStatus,
        Request $request,
        Candidacy $candidacy,
        OfferRepository $offerRepository,
        StatusRepository $statusRepository,
        CandidacyRepository $candidacyRepository
    ): Response {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $offer = $candidacy->getOffer();
        if ($user->getRecruiter() != $offer->getRecruiter()) {
            return $this->redirectToRoute('app_candidacy_recruiter_index', [], Response::HTTP_SEE_OTHER);
        }
        $status = $statusRepository->findOneBy(['status' => $newStatus]);
        $candidacy->setStatus($status);
        $candidacyRepository->save($candidacy, true);

        if ($newStatus == "Acceptée") {
            $offer->setOpen(false);
            $offerRepository->save($offer, true);

            $statusDeclined = $statusRepository->findOneBy(['status' => "Refusée"]);
            $otherCandidacies = $candidacyRepository->findByOffer($offer);
            foreach ($otherCandidacies as $otherCandidacy) {
                if ($otherCandidacy != $candidacy) {
                    $otherCandidacy->setStatus($statusDeclined);
                    $candidacyRepository->save($otherCandidacy, true);
                }
            }
        }

        return new JsonResponse(true);
    }
}
