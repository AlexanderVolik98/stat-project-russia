<?php

declare(strict_types=1);

namespace App\Model;

use JsonSerializable;

class DistrictModel implements JsonSerializable
{
    private string $name;

    private int $allPopulation;

    private int $malePopulation;

    private int $femalePopulation;

    /**
     * @var SubjectModel[]
     */
    private array $subjects;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAllPopulation(): int
    {
        return $this->allPopulation;
    }

    public function setAllPopulation(int $allPopulation): self
    {
        $this->allPopulation = $allPopulation;

        return $this;
    }

    public function getMalePopulation(): int
    {
        return $this->malePopulation;
    }

    public function setMalePopulation(int $malePopulation): self
    {
        $this->malePopulation = $malePopulation;

        return $this;
    }

    public function getFemalePopulation(): int
    {
        return $this->femalePopulation;
    }

    public function setFemalePopulation(int $femalePopulation): self
    {
        $this->femalePopulation = $femalePopulation;

        return $this;
    }

    public function getSubjects(): array
    {
        return $this->subjects;
    }

    public function setSubjects(array $subjects): self
    {
        $this->subjects = $subjects;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'name' => $this->getName(),
            'allPopulation' => $this->getAllPopulation(),
            'malePopulation' => $this->getMalePopulation(),
            'femalePopulation' => $this->getFemalePopulation(),
            'subjects' => $this->getSubjects(),
        ];
    }
}
