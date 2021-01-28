<?php

namespace App\Entity;

use App\Repository\UniversityRepository;
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
}
