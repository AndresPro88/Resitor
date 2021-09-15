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
     * @ORM\Column(type="datetime")
     */
    private $fecha;

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
    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;
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
