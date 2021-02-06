<?php

namespace App\Entity;

use App\Repository\DivisionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Table(name="divisions")
 * @ORM\Entity(repositoryClass=DivisionRepository::class)
 */
class Division
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $divisionName;

    /**
     * @ORM\Column(type="string", length=50, unique=true)
     */
    private $divisionCode;

    /**
     * @ORM\Column(name="updated", type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updated;

    /**
     * @ORM\OneToMany(targetEntity=Judge::class, mappedBy="nameDivision")
     */
    private $judges;

    public function __construct()
    {
        $this->judges = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDivisionName(): ?string
    {
        return $this->divisionName;
    }

    public function setDivisionName(string $division_name): self
    {
        $this->divisionName = $division_name;

        return $this;
    }

    public function getDivisionCode(): ?string
    {
        return $this->divisionCode;
    }

    public function setDivisionCode(string $division_code): self
    {
        $this->divisionCode = $division_code;

        return $this;
    }

    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    public function setUpdated(\DateTimeInterface $updated): self
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * @return Collection|Judge[]
     */
    public function getJudges(): Collection
    {
        return $this->judges;
    }

    public function addJudge(Judge $judge): self
    {
        if (!$this->judges->contains($judge)) {
            $this->judges[] = $judge;
            $judge->setNameDivision($this);
        }

        return $this;
    }

    public function removeJudge(Judge $judge): self
    {
        if ($this->judges->removeElement($judge)) {
            // set the owning side to null (unless already changed)
            if ($judge->getNameDivision() === $this) {
                $judge->setNameDivision(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->divisionName;
    }
}
