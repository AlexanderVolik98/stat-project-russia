<?php

declare(strict_types=1);

namespace App\Service;

use App\Mapper\DistrictMapper;
use App\Model\DistrictModel;
use App\Repository\DistrictRepository;

class DistrictService
{
    private array $districtModels;

    public function __construct(
        private readonly DistrictRepository $districtRepository,
    ) {}

    public function getSortedDistrictsByPopulation(): array
    {
        $districts = $this->districtRepository->findAll();
        $districtModels = [];

        usort($districts, function ($districtA, $districtB) {
            return $districtB->getAllPopulation() <=> $districtA->getAllPopulation();
        });


        foreach ($districts as $district) {

            $districtModel = new DistrictModel();
            DistrictMapper::map($district, $districtModel);

            $districtModels[] = $districtModel;
        }

        $this->districtModels = $districtModels;

        return $districtModels;
    }

    public function getGenderPopulationInfo(): array
    {
        $malePopulation = 0;
        $femalePopulation = 0;

        if (0 === count($this->districtModels)) {
            $this->getSortedDistrictsByPopulation();
        }

        /** @var DistrictModel $districtModel */
        foreach ($this->districtModels as $districtModel) {
            $malePopulation += $districtModel->getMalePopulation();
            $femalePopulation += $districtModel->getFemalePopulation();
        }

        return ['malePopulation' => $malePopulation, 'femalePopulation' => $femalePopulation];
    }

    public function getAgePopulationInfo(): array
    {
        $workingPopulation = 0;
        $populationUnderWorkingAge = 0;
        $populationOverWorkingAge = 0;

        if (0 === count($this->districtModels)) {
            $this->getSortedDistrictsByPopulation();
        }

        /** @var DistrictModel $districtModel */
        foreach ($this->districtModels as $districtModel) {
            foreach ($districtModel->getSubjects() as $subjectModel) {
                $workingPopulation += $subjectModel->getWorkingPopulation();
                $populationUnderWorkingAge += $subjectModel->getPopulationUnderWorkingAge();
                $populationOverWorkingAge += $subjectModel->getPopulationOverWorkingAge();
            }
        }

        return [
            'populationUnderWorkingAge' => $populationUnderWorkingAge,
            'workingAge' => $workingPopulation,
            'populationOverWorkingAge' => $populationOverWorkingAge,
        ];
    }
}
