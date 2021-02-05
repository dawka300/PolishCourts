<?php

namespace App\Entity;

use App\Repository\UniversityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="universities")
 * @ORM\Entity(repositoryClass=UniversityRepository::class)
 */
class University
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message="Podaj nazwę uniwersytetu")
     * @ORM\Column(type="string", length=200, unique=true)
     */
    private $name;

    /**
     * @Assert\NotBlank(message="Podaj kod uniwersytetu")
     * @ORM\Column(type="string", length=30, unique=true)
     */
    private $code;

    /**
     * @ORM\OneToMany(targetEntity=Judge::class, mappedBy="graduationUniversity")
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

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
            $judge->setGraduationUniversity($this);
        }

        return $this;
    }

    public function removeJudge(Judge $judge): self
    {
        if ($this->judges->removeElement($judge)) {
            // set the owning side to null (unless already changed)
            if ($judge->getGraduationUniversity() === $this) {
                $judge->setGraduationUniversity(null);
            }
        }

        return $this;
    }
}
