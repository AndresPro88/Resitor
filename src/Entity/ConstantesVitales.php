<?php

namespace App\Entity;

use App\Repository\ConstantesVitalesRepository;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
/**
 * @ORM\Entity(repositoryClass=ConstantesVitalesRepository::class)
 */
class ConstantesVitales implements \JsonSerializable
{
    const REGISTRO_EXITO = 'Constantes vitales registradas correctamente';
    const REGISTRO_ERROR = 'Hubo un error al registrar las constantes vitales';
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Residente::class, inversedBy="constantesVitales")
     * @ORM\JoinColumn(nullable=false)
     */
    private $residente;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha_cons;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $glucemia;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tension_arterial_sistolica;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tension_arterial_diastolica;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $frecuencia_cardiaca;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $frecuencia_respiratoria;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $saturacion_oxigeno;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $temperatura_corporal;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $peso;

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

    public function getFechaCons(): ?\DateTimeInterface
    {
        return $this->fecha_cons;
    }

    public function setFechaCons(\DateTimeInterface $fecha_cons): self
    {
        $this->fecha_cons = $fecha_cons;

        return $this;
    }

    public function getGlucemia(): ?int
    {
        return $this->glucemia;
    }

    public function setGlucemia(?int $glucemia): self
    {
        $this->glucemia = $glucemia;

        return $this;
    }

    public function getTensionArterialSistolica(): ?int
    {
        return $this->tension_arterial_sistolica;
    }

    public function setTensionArterialSistolica(?int $tension_arterial_sistolica): self
    {
        $this->tension_arterial_sistolica = $tension_arterial_sistolica;
        return $this;
    }

    public function getTensionArterialDiastolica(): ?int
    {
        return $this->tension_arterial_diastolica;
    }

    public function setTensionArterialDiastolica(?int $tension_arterial_diastolica): self
    {
        $this->tension_arterial_diastolica = $tension_arterial_diastolica;
        return $this;
    }

    public function getFrecuenciaCardiaca(): ?int
    {
        return $this->frecuencia_cardiaca;
    }

    public function setFrecuenciaCardiaca(?int $frecuencia_cardiaca): self
    {
        $this->frecuencia_cardiaca = $frecuencia_cardiaca;

        return $this;
    }

    public function getFrecuenciaRespiratoria(): ?int
    {
        return $this->frecuencia_respiratoria;
    }

    public function setFrecuenciaRespiratoria(int $frecuencia_respiratoria): self
    {
        $this->frecuencia_respiratoria = $frecuencia_respiratoria;

        return $this;
    }

    public function getSaturacionOxigeno(): ?int
    {
        return $this->saturacion_oxigeno;
    }

    public function setSaturacionOxigeno(?int $saturacion_oxigeno): self
    {
        $this->saturacion_oxigeno = $saturacion_oxigeno;

        return $this;
    }

    public function getTemperaturaCorporal(): ?float
    {
        return $this->temperatura_corporal;
    }

    public function setTemperaturaCorporal(?float $temperatura_corporal): self
    {
        $this->temperatura_corporal = $temperatura_corporal;

        return $this;
    }

    public function getPeso(): ?float
    {
        return $this->peso;
    }

    public function setPeso(?float $peso): self
    {
        $this->peso = $peso;

        return $this;
    }
    public function jsonSerialize() {
        return ['id' => $this->id,
            'residente' => $this->residente->getId(),
            'fecha_cons'=> $this->fecha_cons ,
            'glucemia' => $this->glucemia,
            'tension_arterial_sistolica' => $this->tension_arterial_sistolica,
            'tension_arterial_diastolica' => $this->tension_arterial_diastolica,
            'peso'=> $this->peso,
            'saturacion_oxigeno' => $this->saturacion_oxigeno,
            'temperatura_corporal' => $this->temperatura_corporal,
            'frecuencia_respiratoria' => $this->frecuencia_respiratoria,
            'frecuencia_cardiaca' => $this->frecuencia_cardiaca
            ];
    }
}
