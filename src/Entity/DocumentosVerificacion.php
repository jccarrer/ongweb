<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DocumentosVerificacionRepository")
 */
class DocumentosVerificacion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Actividades", inversedBy="documentosVerificacions")
     */
    private $actividades;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lista_asistencia_url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $material_entregado_url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $foto_url;

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

    public function getListaAsistenciaUrl(): ?string
    {
        return $this->lista_asistencia_url;
    }

    public function setListaAsistenciaUrl(string $lista_asistencia_url): self
    {
        $this->lista_asistencia_url = $lista_asistencia_url;

        return $this;
    }

    public function getMaterialEntregadoUrl(): ?string
    {
        return $this->material_entregado_url;
    }

    public function setMaterialEntregadoUrl(string $material_entregado_url): self
    {
        $this->material_entregado_url = $material_entregado_url;

        return $this;
    }

    public function getFotoUrl(): ?string
    {
        return $this->foto_url;
    }

    public function setFotoUrl(string $foto_url): self
    {
        $this->foto_url = $foto_url;

        return $this;
    }
}
