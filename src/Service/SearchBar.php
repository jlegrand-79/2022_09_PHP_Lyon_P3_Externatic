<?php

namespace App\Service;

use App\Entity\Recruiter;
use App\Repository\OfferRepository;

class SearchBar
{
    private OfferRepository $offerRepository;

    public function __construct(OfferRepository $offerRepository)
    {
        $this->offerRepository = $offerRepository;
    }

    public function searchOffer(string $search, string $select): ?array
    {
        $trimSelect = substr_replace($select, "", -5);
        $trimCode = substr($select, -3, 2);

        $offers = [];
        $offersbyCity = $this->offerRepository->findLikeNameAndCity($search, $trimSelect);
        $offersbyDepartment = $this->offerRepository->findLikeDepartment($search, $trimSelect, $trimCode);
        foreach ($offersbyCity as $offer) {
            $offers[] = $offer;
        };
        foreach ($offersbyDepartment as $offer) {
            $offers[] = $offer;
        };
        return $offers;
    }

    public function searchOfferByRecruiter(string $search, string $select, Recruiter $recruiter): ?array
    {
        $trimSelect = substr_replace($select, "", -5);
        $trimCode = substr($select, -3, 2);

        $offers = [];
        $offersbyCity = $this->offerRepository->findLikeNameAndCity($search, $trimSelect, $recruiter);
        $offersbyDepartment = $this->offerRepository->findLikeDepartment($search, $trimSelect, $trimCode, $recruiter);
        foreach ($offersbyCity as $offer) {
            $offers[] = $offer;
        };
        foreach ($offersbyDepartment as $offer) {
            $offers[] = $offer;
        };
        return $offers;
    }
}
