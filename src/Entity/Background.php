<?php

namespace App\Entity;

use App\Repository\BackgroundRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BackgroundRepository::class)
 */
class Background
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $degree;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $school;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Picture", cascade={"persist", "remove"})
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $startDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $endDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDegree(): ?string
    {
        return $this->degree;
    }

    public function setDegree(string $degree): self
    {
        $this->degree = $degree;

        return $this;
    }

    public function getSchool(): ?string
    {
        return $this->school;
    }

    public function setSchool(string $school): self
    {
        $this->school = $school;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPicture(): ?Picture
    {
        return $this->picture;
    }

    public function setPicture(Picture $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getStartDate(): ?string
    {
        return $this->startDate;
    }

    public function setStartDate(string $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?string
    {
        return $this->endDate;
    }

    public function setEndDate(string $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }
}
