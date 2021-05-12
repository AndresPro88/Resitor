<?php

namespace App\Entity;

use App\Repository\TiposDiabetesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TiposDiabetesRepository::class)
 */
class TiposDiabetes
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
    private $nom_dia;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $med_dia;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDia(): ?string
    {
        return $this->nom_dia;
    }

    public function setNomDia(string $nom_dia): self
    {
        $this->nom_dia = $nom_dia;

        return $this;
    }

    public function getMedDia(): ?string
    {
        return $this->med_dia;
    }

    public function setMedDia(string $med_dia): self
    {
        $this->med_dia = $med_dia;

        return $this;
    }
}
