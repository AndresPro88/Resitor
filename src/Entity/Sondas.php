<?php

namespace App\Entity;

use App\Repository\SondasRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SondasRepository::class)
 */
class Sondas
{
    const REGISTRO_EXITO = 'Sondaje registrado correctamente';
    const REGISTRO_ERROR = 'Hubo problemas al registrar el sondaje';
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Residente::class, inversedBy="sondas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $residente;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha_cambio;

    /**
     * @ORM\Column(type="integer")
     */
    private $tipo_sonda;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $motivo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numero;

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

    public function getFechaCambio(): ?\DateTimeInterface
    {
        return $this->fecha_cambio;
    }

    public function setFechaCambio(\DateTimeInterface $fecha_cambio): self
    {
        $this->fecha_cambio = $fecha_cambio;

        return $this;
    }

    public function getTipoSonda(): ?int
    {
        return $this->tipo_sonda;
    }

    public function setTipoSonda(int $tipo_sonda): self
    {
        $this->tipo_sonda = $tipo_sonda;

        return $this;
    }

    public function getMotivo(): ?string
    {
        return $this->motivo;
    }

    public function setMotivo(?string $motivo): self
    {
        $this->motivo = $motivo;

        return $this;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(?int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }
}
