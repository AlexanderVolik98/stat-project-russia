<?php

declare(strict_types=1);

namespace App\Mapper;

use App\Entity\District;
use App\Entity\Subject;
use App\Model\DistrictModel;
use App\Model\SubjectModel;

class DistrictMapper
{
    public static function map(District $district, DistrictModel $districtModel): void
    {
        $districtModel
            ->setName($district->getName())
            ->setAllPopulation($district->getAllPopulation())
            ->setFemalePopulation($district->getFemalePopulation())
            ->setMalePopulation($district->getMalePopulation())
            ->setSubjects(self::mapSubjects($district));
    }

    public static function mapSubjects(District $district): array
    {
        return $district->getSubjects()
            ->map(fn (Subject $subject) => new SubjectModel(
                $subject->getName(),
                $subject->getPopulation(),
                $subject->getPopulationOverWorkingAge(),
                $subject->getPopulationUnderWorkingAge(),
                $subject->getWorkingPopulation(),
            ))->toArray();
    }
}
