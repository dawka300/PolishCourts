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
    private $name_position;

    /**
     * @Assert\NotBlank(message="Podaj kod stanowiska")
     * @ORM\Column(type="string", length=50, unique=true)
     */
    private $code_position;

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
        return $this->name_position;
    }

    public function setNamePosition(string $name_position): self
    {
        $this->name_position = $name_position;

        return $this;
    }

    public function getCodePosition(): ?string
    {
        return $this->code_position;
    }

    public function setCodePosition(string $code_position): self
    {
        $this->code_position = $code_position;

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
