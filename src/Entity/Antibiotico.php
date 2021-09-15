<?php

namespace App\Entity;

use App\Repository\AntibioticoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AntibioticoRepository::class)
 */
class Antibiotico
{
    const REGISTRO_EXITO = 'Antibiótico añadido correctamente';
    const REGISTRO_ERROR = 'Hubo un error al añadir el antibiótico';
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Residente::class, inversedBy="antibioticos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $residente;

    /**
     * @ORM\ManyToOne(targetEntity=MedicosMAP::class, inversedBy="antibioticos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $medicoMap;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha_antibiotico;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $indicacion;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $pauta;

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

    public function getMedicoMap(): ?MedicosMAP
    {
        return $this->medicoMap;
    }

    public function setMedicoMap(?MedicosMAP $medicoMap): self
    {
        $this->medicoMap = $medicoMap;

        return $this;
    }

    public function getFechaAntibiotico(): ?\DateTimeInterface
    {
        return $this->fecha_antibiotico;
    }

    public function setFechaAntibiotico(\DateTimeInterface $fecha_antibiotico): self
    {
        $this->fecha_antibiotico = $fecha_antibiotico;

        return $this;
    }

    public function getIndicacion(): ?string
    {
        return $this->indicacion;
    }

    public function setIndicacion(?string $indicacion): self
    {
        $this->indicacion = $indicacion;

        return $this;
    }
    public function getPauta(): ?string
    {
        return $this->pauta;
    }

    public function setPauta(?string $pauta): self
    {
        $this->pauta = $pauta;

        return $this;
    }
}
