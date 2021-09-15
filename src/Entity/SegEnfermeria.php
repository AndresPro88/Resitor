<?php

namespace App\Entity;

use App\Repository\SegEnfermeriaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SegEnfermeriaRepository::class)
 */
class SegEnfermeria
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Residente::class, inversedBy="segEnfermerias")
     * @ORM\JoinColumn(nullable=false)
     */
    private $residente;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaSeguimiento;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $actividad;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $valoracion;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $tratamiento;

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

    public function getFechaSeguimiento(): ?\DateTimeInterface
    {
        return $this->fechaSeguimiento;
    }

    public function setFechaSeguimiento(\DateTimeInterface $fechaSeguimiento): self
    {
        $this->fechaSeguimiento = $fechaSeguimiento;

        return $this;
    }

    public function getActividad(): ?string
    {
        return $this->actividad;
    }

    public function setActividad(string $actividad): self
    {
        $this->actividad = $actividad;

        return $this;
    }

    public function getValoracion(): ?string
    {
        return $this->valoracion;
    }

    public function setValoracion(string $valoracion): self
    {
        $this->valoracion = $valoracion;

        return $this;
    }

    public function getTratamiento(): ?string
    {
        return $this->tratamiento;
    }

    public function setTratamiento(string $tratamiento): self
    {
        $this->tratamiento = $tratamiento;

        return $this;
    }
}
