<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OSCRepository")
 */
class OSC
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
    private $representantelegal;

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
    private $certificadoctabancaria;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $copiacirepresetante;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $copiaderegistrouafe;

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

    public function getRepresentantelegal(): ?string
    {
        return $this->representantelegal;
    }

    public function setRepresentantelegal(string $representantelegal): self
    {
        $this->representantelegal = $representantelegal;

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

    public function getCertificadoctabancaria(): ?string
    {
        return $this->certificadoctabancaria;
    }

    public function setCertificadoctabancaria(string $certificadoctabancaria): self
    {
        $this->certificadoctabancaria = $certificadoctabancaria;

        return $this;
    }

    public function getCopiacirepresetante(): ?string
    {
        return $this->copiacirepresetante;
    }

    public function setCopiacirepresetante(string $copiacirepresetante): self
    {
        $this->copiacirepresetante = $copiacirepresetante;

        return $this;
    }

    public function getCopiaderegistrouafe(): ?string
    {
        return $this->copiaderegistrouafe;
    }

    public function setCopiaderegistrouafe(string $copiaderegistrouafe): self
    {
        $this->copiaderegistrouafe = $copiaderegistrouafe;

        return $this;
    }
}
