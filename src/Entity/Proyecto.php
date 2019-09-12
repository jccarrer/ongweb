<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProyectoRepository")
 */
class Proyecto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Osc", inversedBy="proyectos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $osc;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tematica;

    /**
     * @ORM\Column(type="float")
     */
    private $presupuesto_total;

    /**
     * @ORM\Column(type="float")
     */
    private $gastos;

    /**
     * @ORM\Column(type="float")
     */
    private $inversiones;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CargosProyecto", mappedBy="proyecto",cascade="remove")
     */
    private $cargosProyectos;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Resultados", mappedBy="proyecto",cascade="remove")
     */
    private $resultados;

 

    public function __construct()
    {
        $this->cargosProyectos = new ArrayCollection();
        $this->presupuesto = new ArrayCollection();
        $this->resultados = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOsc(): ?osc
    {
        return  $this->osc;
    }

    public function setOsc(?osc $osc): self
    {
        $this->osc = $osc;

        return $this;
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

    public function getTematica(): ?string
    {
        return $this->tematica;
    }

    public function setTematica(string $tematica): self
    {
        $this->tematica = $tematica;

        return $this;
    }

    public function getPresupuestoTotal(): ?float
    {
        return $this->presupuesto_total;
    }

    public function setPresupuestoTotal(float $presupuesto_total): self
    {
        $this->presupuesto_total = $presupuesto_total;

        return $this;
    }

    public function getGastos(): ?float
    {
        return $this->gastos;
    }

    public function setGastos(float $gastos): self
    {
        $this->gastos = $gastos;

        return $this;
    }

    public function getInversiones(): ?float
    {
        return $this->inversiones;
    }

    public function setInversiones(float $inversiones): self
    {
        $this->inversiones = $inversiones;

        return $this;
    }

    /**
     * @return Collection|CargosProyecto[]
     */
    public function getCargosProyectos(): Collection
    {
        return $this->cargosProyectos;
    }

    public function addCargosProyecto(CargosProyecto $cargosProyecto): self
    {
        if (!$this->cargosProyectos->contains($cargosProyecto)) {
            $this->cargosProyectos[] = $cargosProyecto;
            $cargosProyecto->setProyecto($this);
        }

        return $this;
    }

    public function removeCargosProyecto(CargosProyecto $cargosProyecto): self
    {
        if ($this->cargosProyectos->contains($cargosProyecto)) {
            $this->cargosProyectos->removeElement($cargosProyecto);
            // set the owning side to null (unless already changed)
            if ($cargosProyecto->getProyecto() === $this) {
                $cargosProyecto->setProyecto(null);
            }
        }

        return $this;
    }


    /**
     * @return Collection|Resultados[]
     */
    public function getResultados(): Collection
    {
        return $this->resultados;
    }

    public function addResultado(Resultados $resultado): self
    {
        if (!$this->resultados->contains($resultado)) {
            $this->resultados[] = $resultado;
            $resultado->setProyecto($this);
        }

        return $this;
    }

    public function removeResultado(Resultados $resultado): self
    {
        if ($this->resultados->contains($resultado)) {
            $this->resultados->removeElement($resultado);
            // set the owning side to null (unless already changed)
            if ($resultado->getProyecto() === $this) {
                $resultado->setProyecto(null);
            }
        }

        return $this;
    }

 
     public function __toString() {
        return $this->nombre;
    }

}
