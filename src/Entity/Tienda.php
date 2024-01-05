<?php

namespace App\Entity;

use App\Repository\TiendaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TiendaRepository::class)
 */
class Tienda
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $nombre;

    /**
     * @ORM\Column(type="integer")
     */
    private $cantdpto;

    /**
     * @ORM\Column(type="integer")
     */
    private $cantcajas;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cafeteria;

    /**
     * @ORM\ManyToOne(targetEntity=Establecimiento::class, inversedBy="tiendas")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $estabTienda;

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

    public function getCantdpto(): ?int
    {
        return $this->cantdpto;
    }

    public function setCantdpto(int $cantdpto): self
    {
        $this->cantdpto = $cantdpto;

        return $this;
    }

    public function getCantcajas(): ?int
    {
        return $this->cantcajas;
    }

    public function setCantcajas(int $cantcajas): self
    {
        $this->cantcajas = $cantcajas;

        return $this;
    }

    public function getCafeteria(): ?bool
    {
        return $this->cafeteria;
    }

    public function setCafeteria(?bool $cafeteria): self
    {
        $this->cafeteria = $cafeteria;

        return $this;
    }

    public function getEstabTienda(): ?Establecimiento
    {
        return $this->estabTienda;
    }

    public function setEstabTienda(?Establecimiento $estabTienda): self
    {
        $this->estabTienda = $estabTienda;

        return $this;
    }
}
