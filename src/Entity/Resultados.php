<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResultadosRepository")
 */
class Resultados
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="float")
     */
    private $presupuesto;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Proyecto", inversedBy="resultados")
     */
    private $proyecto;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Indicadores", mappedBy="resultados",cascade="remove")
     */
    private $indicadores;

    public function __construct()
    {
        $this->indicadores = new ArrayCollection();
    }

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

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getPresupuesto(): ?float
    {
        return $this->presupuesto;
    }

    public function setPresupuesto(float $presupuesto): self
    {
        $this->presupuesto = $presupuesto;

        return $this;
    }

    public function getProyecto(): ?Proyecto
    {
        return $this->proyecto;
    }

    public function setProyecto(?Proyecto $proyecto): self
    {
        $this->proyecto = $proyecto;

        return $this;
    }

    /**
     * @return Collection|Indicadores[]
     */
    public function getIndicadores(): Collection
    {
        return $this->indicadores;
    }

    public function addIndicadore(Indicadores $indicadore): self
    {
        if (!$this->indicadores->contains($indicadore)) {
            $this->indicadores[] = $indicadore;
            $indicadore->setResultados($this);
        }

        return $this;
    }

    public function removeIndicadore(Indicadores $indicadore): self
    {
        if ($this->indicadores->contains($indicadore)) {
            $this->indicadores->removeElement($indicadore);
            // set the owning side to null (unless already changed)
            if ($indicadore->getResultados() === $this) {
                $indicadore->setResultados(null);
            }
        }

        return $this;
    }



     public function __toString() {

        return $this->nombre; 
    }  


}
