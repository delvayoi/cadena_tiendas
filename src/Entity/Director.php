<?php

namespace App\Entity;

use App\Repository\DirectorRepository;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=DirectorRepository::class)
 */
class Director
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     * 
     */
    private $nombre;

    /**
     * @ORM\Column(type="integer")
     */
    private $annosexp;

    /**
     * @ORM\ManyToOne(targetEntity=Sexo::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $sexoid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getAnnosexp(): ?int
    {
        return $this->annosexp;
    }

    public function setAnnosexp(int $annosexp): self
    {
        $this->annosexp = $annosexp;

        return $this;
    }

    public function getSexoid(): ?Sexo
    {
        return $this->sexoid;
    }

    public function setSexoid(?Sexo $sexoid): self
    {
        $this->sexoid = $sexoid;

        return $this;
    }

public function __toString()
{
    return $this->getNombre();
}
}
