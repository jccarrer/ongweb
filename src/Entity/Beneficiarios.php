<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BeneficiariosRepository")
 */
class Beneficiarios
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Actividades", inversedBy="beneficiarios")
     */
    private $actividades;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $identificacion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombres;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $apellidos;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $genero;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $correo;

    /**
     * @ORM\Column(type="smallint")
     */
    private $edad;

    /**
     * @ORM\Column(type="boolean")
     */
    private $discapacitado;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActividades(): ?Actividades
    {
        return $this->actividades;
    }

    public function setActividades(?Actividades $actividades): self
    {
        $this->actividades = $actividades;

        return $this;
    }

    public function getIdentificacion(): ?string
    {
        return $this->identificacion;
    }

    public function setIdentificacion(string $identificacion): self
    {
        $this->identificacion = $identificacion;

        return $this;
    }

    public function getNombres(): ?string
    {
        return $this->nombres;
    }

    public function setNombres(string $nombres): self
    {
        $this->nombres = $nombres;

        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getGenero(): ?string
    {
        return $this->genero;
    }

    public function setGenero(string $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): self
    {
        $this->correo = $correo;

        return $this;
    }

    public function getEdad(): ?int
    {
        return $this->edad;
    }

    public function setEdad(int $edad): self
    {
        $this->edad = $edad;

        return $this;
    }

    public function getDiscapacitado(): ?bool
    {
        return $this->discapacitado;
    }

    public function setDiscapacitado(bool $discapacitado): self
    {
        $this->discapacitado = $discapacitado;

        return $this;
    }
}
