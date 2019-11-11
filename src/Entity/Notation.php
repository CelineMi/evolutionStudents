<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NotationRepository")
 */
class Notation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $greenCross;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $blackCross;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $belt;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $noCrossWeeks;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $job;

    /**
     * @ORM\Column(type="boolean")
     */
    private $checked;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\user", inversedBy="notations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Week", mappedBy="notation")
     */
    private $weeks;

    public function __construct()
    {
        $this->weeks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGreenCross(): ?int
    {
        return $this->greenCross;
    }

    public function setGreenCross(?int $greenCross): self
    {
        $this->greenCross = $greenCross;

        return $this;
    }

    public function getBlackCross(): ?int
    {
        return $this->blackCross;
    }

    public function setBlackCross(?int $blackCross): self
    {
        $this->blackCross = $blackCross;

        return $this;
    }

    public function getBelt(): ?string
    {
        return $this->belt;
    }

    public function setBelt(string $belt): self
    {
        $this->belt = $belt;

        return $this;
    }

    public function getNoCrossWeeks(): ?int
    {
        return $this->noCrossWeeks;
    }

    public function setNoCrossWeeks(?int $noCrossWeeks): self
    {
        $this->noCrossWeeks = $noCrossWeeks;

        return $this;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(?string $job): self
    {
        $this->job = $job;

        return $this;
    }

    public function getChecked(): ?bool
    {
        return $this->checked;
    }

    public function setChecked(bool $checked): self
    {
        $this->checked = $checked;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Week[]
     */
    public function getWeeks(): Collection
    {
        return $this->weeks;
    }

    public function addWeek(Week $week): self
    {
        if (!$this->weeks->contains($week)) {
            $this->weeks[] = $week;
            $week->addNotation($this);
        }

        return $this;
    }

    public function removeWeek(Week $week): self
    {
        if ($this->weeks->contains($week)) {
            $this->weeks->removeElement($week);
            $week->removeNotation($this);
        }

        return $this;
    }

}
