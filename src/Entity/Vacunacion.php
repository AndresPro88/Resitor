<?php

namespace App\Entity;

use App\Repository\VacunacionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VacunacionRepository::class)
 */
class Vacunacion
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
    private $fecha_vac;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaVac(): ?\DateTimeInterface
    {
        return $this->fecha_vac;
    }

    public function setFechaVac(\DateTimeInterface $fecha_vac): self
    {
        $this->fecha_vac = $fecha_vac;

        return $this;
    }
}
