<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CargosRepository")
 */
class Cargos
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
     * @ORM\OneToMany(targetEntity="App\Entity\CargosProyecto", mappedBy="cargo")
     */
    private $cargosProyectos;

    public function __construct()
    {
        $this->cargosProyectos = new ArrayCollection();
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
            $cargosProyecto->setCargo($this);
        }

        return $this;
    }

    public function removeCargosProyecto(CargosProyecto $cargosProyecto): self
    {
        if ($this->cargosProyectos->contains($cargosProyecto)) {
            $this->cargosProyectos->removeElement($cargosProyecto);
            // set the owning side to null (unless already changed)
            if ($cargosProyecto->getCargo() === $this) {
                $cargosProyecto->setCargo(null);
            }
        }

        return $this;
    }

     public function __toString() {
        return $this->nombre;
    }
    

}
