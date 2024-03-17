<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DistrictRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DistrictRepository::class)]
class District
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'integer')]
    private int $allPopulation;

    #[ORM\Column(type: 'integer')]
    private int $malePopulation;

    #[ORM\Column(type: 'integer')]
    private int $femalePopulation;

    /**
     * @var Collection<Subject>
     */
    #[ORM\OneToMany(mappedBy: 'district', targetEntity: Subject::class, fetch: 'EAGER')]
    #[ORM\OrderBy(["population" => "ASC"])]
    private Collection $subjects;

    public function __construct()
    {
        $this->subjects = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

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

    public function getSubjects(): Collection
    {
        return $this->subjects;
    }

    public function getMalePopulation(): int
    {
        return $this->malePopulation;
    }

    public function setMalePopulation(int $malePopulation): void
    {
        $this->malePopulation = $malePopulation;
    }

    public function getFemalePopulation(): int
    {
        return $this->femalePopulation;
    }

    public function setFemalePopulation(int $femalePopulation): void
    {
        $this->femalePopulation = $femalePopulation;
    }
}
