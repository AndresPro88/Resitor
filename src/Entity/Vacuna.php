<?php

namespace App\Entity;

use App\Repository\VacunaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VacunaRepository::class)
 */
class Vacuna
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $t_vac;

    /**
     * @ORM\Column(type="string", length=300)
     */
    private $n_vac;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTVac(): ?string
    {
        return $this->t_vac;
    }

    public function setTVac(string $t_vac): self
    {
        $this->t_vac = $t_vac;

        return $this;
    }

    public function getNVac(): ?string
    {
        return $this->n_vac;
    }

    public function setNVac(string $n_vac): self
    {
        $this->n_vac = $n_vac;

        return $this;
    }
}
