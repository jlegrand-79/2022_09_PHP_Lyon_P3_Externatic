<?php

namespace App\Controller;

use JsonSerializable;
use App\Repository\PartnerRepository;
use App\Repository\WorkFieldRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
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
}
