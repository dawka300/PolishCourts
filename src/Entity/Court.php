<?php

namespace App\Entity;

use App\Repository\CourtRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="courts")
 * @ORM\Entity(repositoryClass=CourtRepository::class)
 */
class Court
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message="Podaj nazwę sądu")
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $court_name;

    /**
     * @Assert\NotBlank(message="Podaj kod sądu")
     * @ORM\Column(type="string", length=30, unique=true)
     */
    private $court_code;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $appeal;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $circuit;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $information;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCourtName(): ?string
    {
        return $this->court_name;
    }

    public function setCourtName(string $court_name): self
    {
        $this->court_name = $court_name;

        return $this;
    }

    public function getCourtCode(): ?string
    {
        return $this->court_code;
    }

    public function setCourtCode(string $court_code): self
    {
        $this->court_code = $court_code;

        return $this;
    }

    public function getAppeal(): ?string
    {
        return $this->appeal;
    }

    public function setAppeal(?string $appeal): self
    {
        $this->appeal = $appeal;

        return $this;
    }

    public function getCircuit(): ?string
    {
        return $this->circuit;
    }

    public function setCircuit(?string $circuit): self
    {
        $this->circuit = $circuit;

        return $this;
    }

    public function getInformation(): ?string
    {
        return $this->information;
    }

    public function setInformation(?string $information): self
    {
        $this->information = $information;

        return $this;
    }
}
