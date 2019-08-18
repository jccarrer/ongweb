<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActividadesRepository")
 */
class Actividades
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Indicadores", inversedBy="actividades")
     */
    private $indicadores;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fecha_inicio;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fecha_final;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $identificacion_docente;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombres_apellidos_docente;

    /**
     * @ORM\Column(type="float")
     */
    private $presupuesto_proyectado;

    /**
     * @ORM\Column(type="float")
     */
    private $presupuesto_ejecutado;

    /**
     * @ORM\Column(type="float")
     */
    private $presupuesto_avance;

    /**
     * @ORM\Column(type="smallint")
     */
    private $meta;

    /**
     * @ORM\Column(type="smallint")
     */
    private $avances;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $estado;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DocumentosVerificacion", mappedBy="actividades")
     */
    private $documentosVerificacions;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Beneficiarios", mappedBy="actividades")
     */
    private $beneficiarios;

    public function __construct()
    {
        $this->documentosVerificacions = new ArrayCollection();
        $this->beneficiarios = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIndicadores(): ?Indicadores
    {
        return $this->indicadores;
    }

    public function setIndicadores(?Indicadores $indicadores): self
    {
        $this->indicadores = $indicadores;

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

    public function getFechaInicio(): ?string
    {
        return $this->fecha_inicio;
    }

    public function setFechaInicio(string $fecha_inicio): self
    {
        $this->fecha_inicio = $fecha_inicio;

        return $this;
    }

    public function getFechaFinal(): ?string
    {
        return $this->fecha_final;
    }

    public function setFechaFinal(string $fecha_final): self
    {
        $this->fecha_final = $fecha_final;

        return $this;
    }

    public function getIdentificacionDocente(): ?string
    {
        return $this->identificacion_docente;
    }

    public function setIdentificacionDocente(string $identificacion_docente): self
    {
        $this->identificacion_docente = $identificacion_docente;

        return $this;
    }

    public function getNombresApellidosDocente(): ?string
    {
        return $this->nombres_apellidos_docente;
    }

    public function setNombresApellidosDocente(string $nombres_apellidos_docente): self
    {
        $this->nombres_apellidos_docente = $nombres_apellidos_docente;

        return $this;
    }

    public function getPresupuestoProyectado(): ?float
    {
        return $this->presupuesto_proyectado;
    }

    public function setPresupuestoProyectado(float $presupuesto_proyectado): self
    {
        $this->presupuesto_proyectado = $presupuesto_proyectado;

        return $this;
    }

    public function getPresupuestoEjecutado(): ?float
    {
        return $this->presupuesto_ejecutado;
    }

    public function setPresupuestoEjecutado(float $presupuesto_ejecutado): self
    {
        $this->presupuesto_ejecutado = $presupuesto_ejecutado;

        return $this;
    }

    public function getPresupuestoAvance(): ?float
    {
        return $this->presupuesto_avance;
    }

    public function setPresupuestoAvance(float $presupuesto_avance): self
    {
        $this->presupuesto_avance = $presupuesto_avance;

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

    public function getAvances(): ?int
    {
        return $this->avances;
    }

    public function setAvances(int $avances): self
    {
        $this->avances = $avances;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * @return Collection|DocumentosVerificacion[]
     */
    public function getDocumentosVerificacions(): Collection
    {
        return $this->documentosVerificacions;
    }

    public function addDocumentosVerificacion(DocumentosVerificacion $documentosVerificacion): self
    {
        if (!$this->documentosVerificacions->contains($documentosVerificacion)) {
            $this->documentosVerificacions[] = $documentosVerificacion;
            $documentosVerificacion->setActividades($this);
        }

        return $this;
    }

    public function removeDocumentosVerificacion(DocumentosVerificacion $documentosVerificacion): self
    {
        if ($this->documentosVerificacions->contains($documentosVerificacion)) {
            $this->documentosVerificacions->removeElement($documentosVerificacion);
            // set the owning side to null (unless already changed)
            if ($documentosVerificacion->getActividades() === $this) {
                $documentosVerificacion->setActividades(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Beneficiarios[]
     */
    public function getBeneficiarios(): Collection
    {
        return $this->beneficiarios;
    }

    public function addBeneficiario(Beneficiarios $beneficiario): self
    {
        if (!$this->beneficiarios->contains($beneficiario)) {
            $this->beneficiarios[] = $beneficiario;
            $beneficiario->setActividades($this);
        }

        return $this;
    }

    public function removeBeneficiario(Beneficiarios $beneficiario): self
    {
        if ($this->beneficiarios->contains($beneficiario)) {
            $this->beneficiarios->removeElement($beneficiario);
            // set the owning side to null (unless already changed)
            if ($beneficiario->getActividades() === $this) {
                $beneficiario->setActividades(null);
            }
        }

        return $this;
    }


     public function __toString() {
        return $this->nombre;
    } 

}
