<?php

namespace App\Entity;

use App\Repository\CourtRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private $courtName;

    /**
     * @Assert\NotBlank(message="Podaj kod sądu")
     * @ORM\Column(type="string", length=30, unique=true)
     */
    private $courtCode;

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

    /**
     * @ORM\OneToMany(targetEntity=Judge::class, mappedBy="workplace")
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

    public function getCourtName(): ?string
    {
        return $this->courtName;
    }

    public function setCourtName(string $court_name): self
    {
        $this->courtName = $court_name;

        return $this;
    }

    public function getCourtCode(): ?string
    {
        return $this->courtCode;
    }

    public function setCourtCode(string $court_code): self
    {
        $this->courtCode = $court_code;

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
            $judge->setWorkplace($this);
        }

        return $this;
    }

    public function removeJudge(Judge $judge): self
    {
        if ($this->judges->removeElement($judge)) {
            // set the owning side to null (unless already changed)
            if ($judge->getWorkplace() === $this) {
                $judge->setWorkplace(null);
            }
        }

        return $this;
    }
}
