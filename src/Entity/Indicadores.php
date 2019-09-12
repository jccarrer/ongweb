<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IndicadoresRepository")
 */
class Indicadores
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Resultados", inversedBy="indicadores")
     */
    private $resultados;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $detalle;

    /**
     * @ORM\Column(type="smallint")
     */
    private $meta;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Actividades", mappedBy="indicadores",cascade="remove")
     */
    private $actividades;

    public function __construct()
    {
        $this->actividades = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResultados(): ?Resultados
    {
        return $this->resultados;
    }

    public function setResultados(?Resultados $resultados): self
    {
        $this->resultados = $resultados;

        return $this;
    }

    public function getDetalle(): ?string
    {
        return $this->detalle;
    }

    public function setDetalle(string $detalle): self
    {
        $this->detalle = $detalle;

        return $this;
    }

    public function getMeta(): ?int
    {
        return $this->meta;
    }

    public function setMeta(int $meta): self
    {
        $this->meta = $meta;

        return $this;
    }

    /**
     * @return Collection|Actividades[]
     */
    public function getActividades(): Collection
    {
        return $this->actividades;
    }

    public function addActividade(Actividades $actividade): self
    {
        if (!$this->actividades->contains($actividade)) {
            $this->actividades[] = $actividade;
            $actividade->setIndicadores($this);
        }

        return $this;
    }

    public function removeActividade(Actividades $actividade): self
    {
        if ($this->actividades->contains($actividade)) {
            $this->actividades->removeElement($actividade);
            // set the owning side to null (unless already changed)
            if ($actividade->getIndicadores() === $this) {
                $actividade->setIndicadores(null);
            }
        }

        return $this;
    }

     public function __toString() {
        return $this->detalle;
    } 
}
