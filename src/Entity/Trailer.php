<?php

namespace App\Entity;

use App\Repository\TrailerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TrailerRepository::class)
 */
class Trailer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $nevera;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $contratohel;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha;

    /**
     * @ORM\ManyToOne(targetEntity=Establecimiento::class, inversedBy="trailers")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE" )
     */
    private $estabtrailer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNevera(): ?bool
    {
        return $this->nevera;
    }

    public function setNevera(?bool $nevera): self
    {
        $this->nevera = $nevera;

        return $this;
    }

    public function getContratohel(): ?bool
    {
        return $this->contratohel;
    }

    public function setContratohel(?bool $contratohel): self
    {
        $this->contratohel = $contratohel;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getEstabtrailer(): ?Establecimiento
    {
        return $this->estabtrailer;
    }

    public function setEstabtrailer(?Establecimiento $estabtrailer): self
    {
        $this->estabtrailer = $estabtrailer;

        return $this;
    }
}
