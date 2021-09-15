<?php

namespace App\Entity;

use App\Repository\AccidenteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AccidenteRepository::class)
 */
class Accidente
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
    private $fecha_accidente;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $actuacion_due;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $consecuencias;

    /**
     * @ORM\ManyToOne(targetEntity=Residente::class, inversedBy="accidentes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $residente;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaAccidente(): ?\DateTimeInterface
    {
        return $this->fecha_accidente;
    }

    public function accidenteUltimaSemana(){
        if(strtotime($this->fecha_accidente) > strtotime('-7 day', strtotime(date()))){
            return true;
        }else{
            return false;
        }
    }
    public function setFechaAccidente(\DateTimeInterface $fecha_accidente): self
    {
        $this->fecha_accidente = $fecha_accidente;

        return $this;
    }

    public function getActuacionDue(): ?string
    {
        return $this->actuacion_due;
    }

    public function setActuacionDue(string $actuacion_due): self
    {
        $this->actuacion_due = $actuacion_due;

        return $this;
    }

    public function getConsecuencias(): ?string
    {
        return $this->consecuencias;
    }

    public function setConsecuencias(?string $consecuencias): self
    {
        $this->consecuencias = $consecuencias;

        return $this;
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
}
