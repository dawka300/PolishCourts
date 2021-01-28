<?php

namespace App\Entity;

use App\Repository\DivisionRepository;
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
    private $division_name;

    /**
     * @ORM\Column(type="string", length=50, unique=true)
     */
    private $division_code;

    /**
     * @ORM\Column(name="updated", type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updated;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDivisionName(): ?string
    {
        return $this->division_name;
    }

    public function setDivisionName(string $division_name): self
    {
        $this->division_name = $division_name;

        return $this;
    }

    public function getDivisionCode(): ?string
    {
        return $this->division_code;
    }

    public function setDivisionCode(string $division_code): self
    {
        $this->division_code = $division_code;

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
}
