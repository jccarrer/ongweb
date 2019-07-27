<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CargosProyectoRepository")
 */
class CargosProyecto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Proyecto", inversedBy="cargosProyectos")
     * @ORM\JoinColumn(name="proyecto_id", referencedColumnName="id")
     */
    private $proyecto;

    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cargos", inversedBy="cargosProyectos")
     * @ORM\JoinColumn(name="cargo_id", referencedColumnName="id")
     */
    private $cargo;

    
    
    
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telefono;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

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

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
      
    
    
    
    
    
    
    
    
    
    
    
    
    public function getProyecto(): ?proyecto
    {
        return $this->proyecto;
    }
    public function setProyecto(?proyecto $proyecto): self
    {
        $this->proyecto = $proyecto;
        return $this;
    }

  
    
    public function getCargo():?cargos
    {
        return $this->cargo;
    }
    
    public function setCargo(?cargos $cargo): self
    {
        $this->cargo = $cargo;
        return $this;
    }

    
    
    


     public function __toString() {
        return $this->nombre;
    }    
    
}
