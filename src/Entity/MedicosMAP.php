<?php

namespace App\Entity;

use App\Repository\MedicosMAPRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedicosMAPRepository::class)
 */
class MedicosMAP
{
    const REGISTRO_EXITO = 'Médico MAP registrado correctamente';
    const REGISTRO_ERROR = "Hubo Problemas al registrar al médico MAP";
    const BORRADO_EXITO = 'Se ha borrado correctamente al médico MAP';
    const BORRADO_ERROR = "Hubo Problemas al borrar al médico MAP";
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
     * @ORM\OneToMany(targetEntity="App\Entity\Residente", mappedBy="med_map")
     */
    private $residente;

    /**
     * @ORM\OneToMany(targetEntity=Antibiotico::class, mappedBy="medicoMap", orphanRemoval=true)
     */
    private $antibioticos;

    public function __construct()
    {
        $this->antibioticos = new ArrayCollection();
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

    /**
     * @return Collection|Antibiotico[]
     */
    public function getAntibioticos(): Collection
    {
        return $this->antibioticos;
    }

    public function addAntibiotico(Antibiotico $antibiotico): self
    {
        if (!$this->antibioticos->contains($antibiotico)) {
            $this->antibioticos[] = $antibiotico;
            $antibiotico->setMedicoMap($this);
        }

        return $this;
    }

    public function removeAntibiotico(Antibiotico $antibiotico): self
    {
        if ($this->antibioticos->removeElement($antibiotico)) {
            // set the owning side to null (unless already changed)
            if ($antibiotico->getMedicoMap() === $this) {
                $antibiotico->setMedicoMap(null);
            }
        }

        return $this;
    }
}
