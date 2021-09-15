<?php

namespace App\Entity;

use App\Repository\ConsultaExternaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConsultaExternaRepository::class)
 */
class ConsultaExterna
{
    const REGISTRO_EXITO = 'Consulta externa añadida correctamente';
    const REGISTRO_ERROR = 'Hubo un error al añadir la consulta externa';
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Residente::class, inversedBy="consultaExternas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $residente;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaConsulta;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $especialista;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $motivoConsulta;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $valoracion;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $cambioTratamiento;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $proximaConsulta;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $pComp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResidente(): ?Residente
    {
        return $this->residente;
    }

    public function setResidente(?Residente $residente): self
    {
        $this->residente = $residente;

        return $this;
    }

    public function getFechaConsulta(): ?\DateTimeInterface
    {
        return $this->fechaConsulta;
    }

    public function setFechaConsulta(\DateTimeInterface $fechaConsulta): self
    {
        $this->fechaConsulta = $fechaConsulta;

        return $this;
    }

    public function getEspecialista(): ?string
    {
        return $this->especialista;
    }

    public function setEspecialista(?string $especialista): self
    {
        $this->especialista = $especialista;

        return $this;
    }

    public function getMotivoConsulta(): ?string
    {
        return $this->motivoConsulta;
    }

    public function setMotivoConsulta(?string $motivoConsulta): self
    {
        $this->motivoConsulta = $motivoConsulta;

        return $this;
    }

    public function getValoracion(): ?string
    {
        return $this->valoracion;
    }

    public function setValoracion(?string $valoracion): self
    {
        $this->valoracion = $valoracion;

        return $this;
    }

    public function getCambioTratamiento(): ?string
    {
        return $this->cambioTratamiento;
    }

    public function setCambioTratamiento(?string $cambioTratamiento): self
    {
        $this->cambioTratamiento = $cambioTratamiento;

        return $this;
    }

    public function getProximaConsulta(): ?\DateTimeInterface
    {
        return $this->proximaConsulta;
    }

    public function setProximaConsulta(?\DateTimeInterface $proximaConsulta): self
    {
        $this->proximaConsulta = $proximaConsulta;

        return $this;
    }

    public function getPComp(): ?string
    {
        return $this->pComp;
    }

    public function setPComp(?string $pComp): self
    {
        $this->pComp = $pComp;

        return $this;
    }
}
