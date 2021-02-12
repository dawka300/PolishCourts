<?php

namespace App\Entity;

use App\Repository\JudgeRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Table(name="Judges")
 * @ORM\Entity(repositoryClass=JudgeRepository::class)
 */
class Judge
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $secondName;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $lastName;

    /**
     * @ORM\Column(type="date")
     */
    private $birthDate;

    /**
     * @ORM\ManyToOne(targetEntity=University::class, inversedBy="judges")
     */
    private $graduationUniversity;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $graduationDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $sinceJudge;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $sinceCurrentCourt;

    /**
     * @ORM\ManyToOne(targetEntity=Position::class)
     */
    private $position;

    /**
     * @ORM\ManyToOne(targetEntity=Court::class)
     */
    private $delegatedTo;

    /**
     * @ORM\ManyToOne(targetEntity=Court::class)
     */
    private $delegatedFrom;

    /**
     * @ORM\ManyToOne(targetEntity=Court::class, inversedBy="judges")
     * @ORM\JoinColumn(nullable=false)
     */
    private $workplace;

    /**
     * @ORM\ManyToOne(targetEntity=Division::class, inversedBy="judges")
     * @ORM\JoinColumn(nullable=false)
     */
    private $nameDivision;

    /**
     * @ORM\Column(type="smallint")
     */
    private $numberDivision;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $additionalInformation;

    /**
     * @var DateTime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @var DateTime $updated
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="judge", cascade={"persist", "remove"})
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getSecondName(): ?string
    {
        return $this->secondName;
    }

    public function setSecondName(?string $secondName): self
    {
        $this->secondName = $secondName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getGraduationUniversity(): ?University
    {
        return $this->graduationUniversity;
    }

    public function setGraduationUniversity(?University $graduationUniversity): self
    {
        $this->graduationUniversity = $graduationUniversity;

        return $this;
    }

    public function getGraduationDate(): ?\DateTimeInterface
    {
        return $this->graduationDate;
    }

    public function setGraduationDate(?\DateTimeInterface $graduationDate): self
    {
        $this->graduationDate = $graduationDate;

        return $this;
    }

    public function getSinceJudge(): ?\DateTimeInterface
    {
        return $this->sinceJudge;
    }

    public function setSinceJudge(?\DateTimeInterface $sinceJudge): self
    {
        $this->sinceJudge = $sinceJudge;

        return $this;
    }

    public function getSinceCurrentCourt(): ?\DateTimeInterface
    {
        return $this->sinceCurrentCourt;
    }

    public function setSinceCurrentCourt(?\DateTimeInterface $sinceCurrentCourt): self
    {
        $this->sinceCurrentCourt = $sinceCurrentCourt;

        return $this;
    }

    public function getPosition(): ?Position
    {
        return $this->position;
    }

    public function setPosition(?Position $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getDelegatedTo(): ?Court
    {
        return $this->delegatedTo;
    }

    public function setDelegatedTo(?Court $delegatedTo): self
    {
        $this->delegatedTo = $delegatedTo;

        return $this;
    }

    public function getDelegatedFrom(): ?Court
    {
        return $this->delegatedFrom;
    }

    public function setDelegatedFrom(?Court $delegatedFrom): self
    {
        $this->delegatedFrom = $delegatedFrom;

        return $this;
    }

    public function getWorkplace(): ?Court
    {
        return $this->workplace;
    }

    public function setWorkplace(?Court $workplace): self
    {
        $this->workplace = $workplace;

        return $this;
    }

    public function getNameDivision(): ?Division
    {
        return $this->nameDivision;
    }

    public function setNameDivision(?Division $nameDivision): self
    {
        $this->nameDivision = $nameDivision;

        return $this;
    }

    public function getNumberDivision(): ?int
    {
        return $this->numberDivision;
    }

    public function setNumberDivision(int $numberDivision): self
    {
        $this->numberDivision = $numberDivision;

        return $this;
    }

    public function getAdditionalInformation(): ?string
    {
        return $this->additionalInformation;
    }

    public function setAdditionalInformation(?string $additionalInformation): self
    {
        $this->additionalInformation = $additionalInformation;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setJudge(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getJudge() !== $this) {
            $user->setJudge($this);
        }

        $this->user = $user;

        return $this;
    }

    public function __toString(): string
    {
        return $this->firstName . " " . $this->lastName;

    }
}
