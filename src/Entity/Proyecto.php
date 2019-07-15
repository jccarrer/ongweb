<?php

namespace App\Entity;

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
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tematica;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $presupuestoTotal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gastos;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $inversiones;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dirEjectutivo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dirEjecutivoFono;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dirEjecutivoEmail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $coordinador;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $coordinadorFono;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $coordinadorEmail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contador;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contadorFono;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contadorEmail;

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

    public function getTematica(): ?string
    {
        return $this->tematica;
    }

    public function setTematica(string $tematica): self
    {
        $this->tematica = $tematica;

        return $this;
    }

    public function getPresupuestoTotal(): ?string
    {
        return $this->presupuestoTotal;
    }

    public function setPresupuestoTotal(string $presupuestoTotal): self
    {
        $this->presupuestoTotal = $presupuestoTotal;

        return $this;
    }

    public function getGastos(): ?string
    {
        return $this->gastos;
    }

    public function setGastos(string $gastos): self
    {
        $this->gastos = $gastos;

        return $this;
    }

    public function getInversiones(): ?string
    {
        return $this->inversiones;
    }

    public function setInversiones(string $inversiones): self
    {
        $this->inversiones = $inversiones;

        return $this;
    }

    public function getDirEjectutivo(): ?string
    {
        return $this->dirEjectutivo;
    }

    public function setDirEjectutivo(string $dirEjectutivo): self
    {
        $this->dirEjectutivo = $dirEjectutivo;

        return $this;
    }

    public function getDirEjecutivoFono(): ?string
    {
        return $this->dirEjecutivoFono;
    }

    public function setDirEjecutivoFono(string $dirEjecutivoFono): self
    {
        $this->dirEjecutivoFono = $dirEjecutivoFono;

        return $this;
    }

    public function getDirEjecutivoEmail(): ?string
    {
        return $this->dirEjecutivoEmail;
    }

    public function setDirEjecutivoEmail(string $dirEjecutivoEmail): self
    {
        $this->dirEjecutivoEmail = $dirEjecutivoEmail;

        return $this;
    }

    public function getCoordinador(): ?string
    {
        return $this->coordinador;
    }

    public function setCoordinador(string $coordinador): self
    {
        $this->coordinador = $coordinador;

        return $this;
    }

    public function getCoordinadorFono(): ?string
    {
        return $this->coordinadorFono;
    }

    public function setCoordinadorFono(string $coordinadorFono): self
    {
        $this->coordinadorFono = $coordinadorFono;

        return $this;
    }

    public function getCoordinadorEmail(): ?string
    {
        return $this->coordinadorEmail;
    }

    public function setCoordinadorEmail(string $coordinadorEmail): self
    {
        $this->coordinadorEmail = $coordinadorEmail;

        return $this;
    }

    public function getContador(): ?string
    {
        return $this->contador;
    }

    public function setContador(string $contador): self
    {
        $this->contador = $contador;

        return $this;
    }

    public function getContadorFono(): ?string
    {
        return $this->contadorFono;
    }

    public function setContadorFono(string $contadorFono): self
    {
        $this->contadorFono = $contadorFono;

        return $this;
    }

    public function getContadorEmail(): ?string
    {
        return $this->contadorEmail;
    }

    public function setContadorEmail(string $contadorEmail): self
    {
        $this->contadorEmail = $contadorEmail;

        return $this;
    }
}
