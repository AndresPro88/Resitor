<?php

namespace App\Entity;

use App\Repository\OxigenoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OxigenoRepository::class)
 */
class Oxigeno
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
    private $fecha_oxi_in;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha_oxi_out;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaOxiIn(): ?\DateTimeInterface
    {
        return $this->fecha_oxi_in;
    }

    public function setFechaOxiIn(\DateTimeInterface $fecha_oxi_in): self
    {
        $this->fecha_oxi_in = $fecha_oxi_in;

        return $this;
    }

    public function getFechaOxiOut(): ?\DateTimeInterface
    {
        return $this->fecha_oxi_out;
    }

    public function setFechaOxiOut(\DateTimeInterface $fecha_oxi_out): self
    {
        $this->fecha_oxi_out = $fecha_oxi_out;

        return $this;
    }
}
