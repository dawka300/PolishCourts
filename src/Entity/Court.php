<?php

namespace App\Entity;

use App\Repository\CourtRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
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

    /**
     * @var DateTime $contentChanged
     *
     * @ORM\Column(name="content_changed", type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="change", field={"court_name", "court_code", "appeal", "circuit", "information"})
     */
    private $contentChanged;

    /**
     * @var string $contentChangedBy
     *
     * @ORM\Column(name="content_changed_by", type="string", nullable=true)
     * @Gedmo\Blameable(on="change", field={"court_name", "court_code", "appeal", "circuit", "information"})
     */
    private $contentChangedBy;

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

    public function getContentChanged(): ?\DateTimeInterface
    {
        return $this->contentChanged;
    }

    public function setContentChanged(?\DateTimeInterface $contentChanged): self
    {
        $this->contentChanged = $contentChanged;

        return $this;
    }

    public function getContentChangedBy(): ?string
    {
        return $this->contentChangedBy;
    }

    public function setContentChangedBy(?string $contentChangedBy): self
    {
        $this->contentChangedBy = $contentChangedBy;

        return $this;
    }
}
