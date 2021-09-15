<?php

namespace App\Entity;

use App\Repository\ContactoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactoRepository::class)
 */
class Contacto
{
    const REGISTRO_EXITO = 'Contacto registrado correctamente';
    const REGISTRO_ERROR = "Hubo Problemas al registrar contacto";
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Residente::class)
     */
    private $residente;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=9, nullable=true)
     */
    private $telefono;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $relacion;

    /**
     * @ORM\Column(type="boolean")
     */
    private $urgencia;

    /**
     * @return mixed
     */
    public function getUrgencia()
    {
        return $this->urgencia;
    }

    /**
     * @param mixed $urgencia
     */
    public function setUrgencia($urgencia): void
    {
        $this->urgencia = $urgencia;
    }

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

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getRelacion(): ?string
    {
        return $this->relacion;
    }

    public function setRelacion(?string $relacion): self
    {
        $this->relacion = $relacion;

        return $this;
    }
}
