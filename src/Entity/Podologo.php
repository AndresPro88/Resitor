<?php

namespace App\Entity;

use App\Repository\PodologoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PodologoRepository::class)
 */
class Podologo
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
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Residente", mappedBy="podologo")
     */
    private $residente;

    /**
     * @return mixed
     */
    public function getResidente()
    {
        return $this->residente;
    }

    /**
     * @param mixed $residente
     */
    public function setResidente($residente): void
    {
        $this->residente = $residente;
    }


    public function getId(): ?int
    {
        return $this->id;
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
}
