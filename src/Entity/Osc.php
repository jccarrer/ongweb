<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OscRepository")
 */
class Osc
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
    private $direccion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ciudad;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telefono;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ruc;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $estatutos;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cta_bancaria;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ci_representante;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ci_uafe;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User",inversedBy="osc")
     */
    private $usuario;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Proyecto", mappedBy="osc")
     */
    private $proyectos;

    public function __construct()
    {
        $this->proyectos = new ArrayCollection();
        $this->usuario = new ArrayCollection();
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

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getCiudad(): ?string
    {
        return $this->ciudad;
    }

    public function setCiudad(string $ciudad): self
    {
        $this->ciudad = $ciudad;

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

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getRuc(): ?string
    {
        return $this->ruc;
    }

    public function setRuc(string $ruc): self
    {
        $this->ruc = $ruc;

        return $this;
    }

    public function getEstatutos(): ?string
    {
        return $this->estatutos;
    }

    public function setEstatutos(string $estatutos): self
    {
        $this->estatutos = $estatutos;

        return $this;
    }

    public function getCtaBancaria(): ?string
    {
        return $this->cta_bancaria;
    }

    public function setCtaBancaria(string $cta_bancaria): self
    {
        $this->cta_bancaria = $cta_bancaria;

        return $this;
    }

    public function getCiRepresentante(): ?string
    {
        return $this->ci_representante;
    }

    public function setCiRepresentante(string $ci_representante): self
    {
        $this->ci_representante = $ci_representante;

        return $this;
    }

    public function getCiUafe(): ?string
    {
        return $this->ci_uafe;
    }

    public function setCiUafe(string $ci_uafe): self
    {
        $this->ci_uafe = $ci_uafe;

        return $this;
    }

    
     /**
     * @return Collection|Usuario[]
     */   
    
    public function getUsuario(): Collection
    {
        return $this->usuario;
    }

    public function setUsuario(?user $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    

    
    
    
    
    
    
    
    /**
     * @return Collection|Proyecto[]
     */
    public function getProyectos(): Collection
    {
        return $this->proyectos;
    }

    public function addProyecto(Proyecto $proyecto): self
    {
        if (!$this->proyectos->contains($proyecto)) {
            $this->proyectos[] = $proyecto;
            $proyecto->setOsc($this);
        }

        return $this;
    }

    public function removeProyecto(Proyecto $proyecto): self
    {
        if ($this->proyectos->contains($proyecto)) {
            $this->proyectos->removeElement($proyecto);
            // set the owning side to null (unless already changed)
            if ($proyecto->getOsc() === $this) {
                $proyecto->setOsc(null);
            }
        }

        return $this;
    }
    
    

     public function __toString() {
        return $this->nombre;
    }    
    
}
