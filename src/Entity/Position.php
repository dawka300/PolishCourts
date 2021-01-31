<?php

namespace App\Entity;

use App\Repository\PositionRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="positions")
 * @ORM\Entity(repositoryClass=PositionRepository::class)
 */
class Position
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message="Podaj nazwę stanowiska")
     * @ORM\Column(type="string", length=150, unique=true)
     */
    private $namePosition;

    /**
     * @Assert\NotBlank(message="Podaj kod stanowiska")
     * @ORM\Column(type="string", length=50, unique=true)
     */
    private $codePosition;

    /**
     * @ORM\Column(name="updated", type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updated;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNamePosition(): ?string
    {
        return $this->namePosition;
    }

    public function setNamePosition(string $name_position): self
    {
        $this->namePosition = $name_position;

        return $this;
    }

    public function getCodePosition(): ?string
    {
        return $this->codePosition;
    }

    public function setCodePosition(string $code_position): self
    {
        $this->codePosition = $code_position;

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
