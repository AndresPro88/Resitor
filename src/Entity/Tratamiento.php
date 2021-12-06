<?php

namespace App\Entity;

use App\Repository\TratamientoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TratamientoRepository::class)
 */
class Tratamiento
{

    const REGISTRO_EXITO = 'Tratamiento añadido correctamente.';
    const REGISTRO_ERROR = 'Hubo un error al añadir el tratamiento.';
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Residente::class, inversedBy="tratamientos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Residente;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $medicamento;

    /**
     * @ORM\Column(type="integer")
     */
    private $tipo_medicamento;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha_inicio;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha_fin;

    /**
     * @ORM\Column(type="integer")
     */
    private $desayuno;

    /**
     * @ORM\Column(type="integer")
     */
    private $comida;

    /**
     * @ORM\Column(type="integer")
     */
    private $cena;

    /**
     * @ORM\Column(type="integer")
     */
    private $recena;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $observaciones;

    /**
     * @ORM\Column(type="boolean")
     */
    private $actual;

    /**
     * Tratamiento constructor.
     */
    public function __construct()
    {
        $this->desayuno = 0;
        $this->comida = 0;
        $this->cena = 0;
        $this->recena = 0;
    }

    public function getTipoMedicamento(): ?string
    {
        return $this->tipo_medicamento;
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResidente(): ?Residente
    {
        return $this->Residente;
    }

    public function setResidente(?Residente $Residente): self
    {
        $this->Residente = $Residente;

        return $this;
    }

    public function getMedicamento(): ?string
    {
        return $this->medicamento;
    }

    public function setMedicamento(string $medicamento): self
    {
        $this->medicamento = $medicamento;

        return $this;
    }

    public function getDesayuno(): ?int
    {
        return $this->desayuno;
    }

    public function setDesayuno(int $desayuno): self
    {
        $this->desayuno = $desayuno;

        return $this;
    }



    public function getComida(): ?int
    {
        return $this->comida;
    }

    public function setComida(int $comida): self
    {
        $this->comida = $comida;

        return $this;
    }

    public function getCena(): ?int
    {
        return $this->cena;
    }

    public function setCena(int $cena): self
    {
        $this->cena = $cena;

        return $this;
    }
    public function setTipoMedicamento(int $tipo_medicamento): self
    {
        $this->tipo_medicamento = $tipo_medicamento;
        return $this;
    }
    public function getRecena(): ?int
    {
        return $this->recena;
    }

    public function setRecena(int $recena): self
    {
        $this->recena = $recena;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaInicio(): ?\DateTimeInterface
    {
        return $this->fecha_inicio;
    }

    /**
     * @return mixed
     */
    public function getFechaFin(): ?\DateTimeInterface
    {
        return $this->fecha_fin;
    }

    /**
     * @param mixed $fecha_fin
     */
    public function setFechaFin(\DateTimeInterface $fecha_fin): self
    {
        $this->fecha_fin = $fecha_fin;
        return $this;
    }

    /**
     * @param mixed $fecha_inicio
     */
    public function setFechaInicio(\DateTimeInterface $fecha_inicio): self
    {
        $this->fecha_inicio = $fecha_inicio;
        return $this;
    }

    public function getObservaciones(): ?string
    {
        return $this->observaciones;
    }

    public function setObservaciones(?string $observaciones): self
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    public function getActual(): ?bool
    {
        return $this->actual;
    }

    public function setActual(bool $actual): self
    {
        $this->actual = $actual;

        return $this;
    }
}
