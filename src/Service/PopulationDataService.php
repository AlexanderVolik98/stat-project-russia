<?php

declare(strict_types=1);

namespace App\Service;

use App\Model\PopulationInfoModel;

class PopulationDataService
{
    public function __construct(private readonly DistrictService $districtService)
    {
    }

    public function getPopulationsByTerritorialBasis(): array
    {
        return $this->districtService->getSortedDistrictsByPopulation();
    }

    public function getPopulationInfo(): PopulationInfoModel
    {
        $populationInfoModel = new PopulationInfoModel();

        $populationInfoModel->setGenderPopulation(
            $this->districtService->getGenderPopulationInfo()
        );

        $populationInfoModel->setAgePopulation(
            $this->districtService->getAgePopulationInfo()
        );

        return $populationInfoModel;
    }
}
