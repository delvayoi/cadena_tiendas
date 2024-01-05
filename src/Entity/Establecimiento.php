<?php

namespace App\Entity;

use App\Repository\EstablecimientoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EstablecimientoRepository::class)
 */
class Establecimiento
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $codigo;

    /**
     * @ORM\Column(type="integer")
     */
    private $canttrab;

    /**
     * @ORM\Column(type="integer")
     */
    private $cantprod;

    /**
     * @ORM\ManyToOne(targetEntity=Director::class)
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $directorid;

    /**
     * @ORM\ManyToOne(targetEntity=Direccion::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $direccionid;

    /**
     * @ORM\OneToMany(targetEntity=Trailer::class, mappedBy="estabtrailer")
     */
    private $trailers;

    /**
     * @ORM\OneToMany(targetEntity=Tienda::class, mappedBy="estabTienda" )
     */
    private $tiendas;

  

    public function __construct()
    {
        $this->trailers = new ArrayCollection();
        $this->tiendas = new ArrayCollection();
      
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodigo(): ?int
    {
        return $this->codigo;
    }

    public function setCodigo(int $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getCanttrab(): ?int
    {
        return $this->canttrab;
    }

    public function setCanttrab(int $canttrab): self
    {
        $this->canttrab = $canttrab;

        return $this;
    }

    public function getCantprod(): ?int
    {
        return $this->cantprod;
    }

    public function setCantprod(int $cantprod): self
    {
        $this->cantprod = $cantprod;

        return $this;
    }

    public function getDirectorid(): ?Director
    {
        return $this->directorid;
    }

    public function setDirectorid(?Director $directorid): self
    {
        $this->directorid = $directorid;

        return $this;
    }

    public function getDireccionid(): ?Direccion
    {
        return $this->direccionid;
    }

    public function setDireccionid(?Direccion $direccionid): self
    {
        $this->direccionid = $direccionid;

        return $this;
    }

    /**
     * @return Collection<int, Trailer>
     */
    public function getTrailers(): Collection
    {
        return $this->trailers;
    }

    public function addTrailer(Trailer $trailer): self
    {
        if (!$this->trailers->contains($trailer)) {
            $this->trailers[] = $trailer;
            $trailer->setEstabtrailer($this);
        }

        return $this;
    }

    public function removeTrailer(Trailer $trailer): self
    {
        if ($this->trailers->removeElement($trailer)) {
            // set the owning side to null (unless already changed)
            if ($trailer->getEstabtrailer() === $this) {
                $trailer->setEstabtrailer(null);
            }
        }

        return $this;
    }
  
    /**
     * @return Collection<int, Tienda>
     */
    public function getTiendas(): Collection
    {
        return $this->tiendas;
    }

    public function addTienda(Tienda $tienda): self
    {
        if (!$this->tiendas->contains($tienda)) {
            $this->tiendas[] = $tienda;
            $tienda->setEstabTienda($this);
        }

        return $this;
    }

    public function removeTienda(Tienda $tienda): self
    {
        if ($this->tiendas->removeElement($tienda)) {
            // set the owning side to null (unless already changed)
            if ($tienda->getEstabTienda() === $this) {
                $tienda->setEstabTienda(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getCodigo();
    }

   
  

}
