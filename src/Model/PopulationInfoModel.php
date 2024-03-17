<?php

declare(strict_types=1);

namespace App\Model;

use JsonSerializable;

class PopulationInfoModel implements JsonSerializable
{
    private array $genderPopulation;

    private array $agePopulation;

    public function getGenderPopulation(): array
    {
        return $this->genderPopulation;
    }

    public function setGenderPopulation(array $genderPopulation): self
    {
        $this->genderPopulation = $genderPopulation;

        return $this;
    }

    public function getAgePopulation(): array
    {
        return $this->agePopulation;
    }

    public function setAgePopulation(array $agePopulation): void
    {
        $this->agePopulation = $agePopulation;
    }

    public function jsonSerialize(): array
    {
        return ['genderPopulation' => $this->getGenderPopulation(), 'agePopulation' => $this->getAgePopulation()];
    }
}
