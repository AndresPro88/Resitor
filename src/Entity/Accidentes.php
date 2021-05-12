<?php

namespace App\Entity;

use App\Repository\AccidentesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AccidentesRepository::class)
 */
class Accidentes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Fecha_Accidente;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Fecha_Alta_Accidente;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $consecuencias;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $actuacion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaAccidente(): ?\DateTimeInterface
    {
        return $this->Fecha_Accidente;
    }

    public function setFechaAccidente(\DateTimeInterface $Fecha_Accidente): self
    {
        $this->Fecha_Accidente = $Fecha_Accidente;

        return $this;
    }

    public function getFechaAltaAccidente(): ?\DateTimeInterface
    {
        return $this->Fecha_Alta_Accidente;
    }

    public function setFechaAltaAccidente(\DateTimeInterface $Fecha_Alta_Accidente): self
    {
        $this->Fecha_Alta_Accidente = $Fecha_Alta_Accidente;

        return $this;
    }

    public function getConsecuencias(): ?string
    {
        return $this->consecuencias;
    }

    public function setConsecuencias(string $consecuencias): self
    {
        $this->consecuencias = $consecuencias;

        return $this;
    }

    public function getActuacion(): ?string
    {
        return $this->actuacion;
    }

    public function setActuacion(string $actuacion): self
    {
        $this->actuacion = $actuacion;

        return $this;
    }
}
