<?php

declare(strict_types=1);

namespace App\Model;

use App\Type\WorkPopulationType;
use JsonSerializable;

class SubjectModel implements JsonSerializable
{
    public function __construct(
        private readonly string $name,
        private readonly int $population,
        private readonly int $populationOverWorkingAge,
        private readonly int $populationUnderWorkingAge,
        private readonly int $workingPopulation,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getPopulation(): int
    {
        return $this->population;
    }

    public function getPopulationOverWorkingAgeWithLabel(): array
    {
        return [
            'count' => $this->populationOverWorkingAge,
            'label' => WorkPopulationType::OlderNonEmployable,
            ];
    }

    public function getWorkingPopulationWithLabel(): array
    {
        return [
            'count' => $this->workingPopulation,
            'label' => WorkPopulationType::Employable,
        ];
    }

    public function getPopulationUnderWorkingAgeWithLabel(): array
    {
        return [
            'count' => $this->populationUnderWorkingAge,
            'label' => WorkPopulationType::YoungerNonEmployable,
        ];
    }

    public function getPopulationOverWorkingAge(): int
    {
        return $this->populationOverWorkingAge;
    }

    public function getWorkingPopulation(): int
    {
        return $this->workingPopulation;
    }

    public function getPopulationUnderWorkingAge(): int
    {
        return $this->populationUnderWorkingAge;
    }

    public function jsonSerialize(): array
    {
        return [
            'name' => $this->getName(),
            'population' => $this->getPopulation(),
            'populationOverWorkingAge' => $this->getPopulationOverWorkingAgeWithLabel(),
            'populationUnderWorkingAge' => $this->getPopulationUnderWorkingAgeWithLabel(),
            'workingPopulation' => $this->getWorkingPopulationWithLabel(),
        ];
    }
}
