<?php

namespace App\Entity;

use App\Repository\ResidenteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ResidenteRepository::class)
 */
class Residente
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
     * @ORM\Column(type="string", length=255)
     */
    private $primer_apellido;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $segundo_apellido;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $dni;

    /**
     * @ORM\Column(type="string", length=12)
     */
    private $num_ss;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha_nac;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha_ingreso;

    /**
     * @ORM\Column(type="integer")
     */
    private $med_map;

    /**
     * @ORM\Column(type="integer")
     */
    private $podologia;

    /**
     * @ORM\Column(type="integer")
     */
    private $num_habitacion;

    /**
     * @ORM\Column(type="integer")
     */
    private $num_lav;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $alergias;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $oxigeno;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $anticoagulante;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $hipertension;

    /**
     * @ORM\Column(type="integer")
     */
    private $diabetes;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $demencia;

    /**
     * @ORM\Column(type="integer")
     */
    private $nivel_dependencia;

    /**
     * @ORM\Column(type="integer")
     */

    //RELACIONES

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contacto", inversedBy="residente")
     */
    private $contacto;

    /**
     * @return mixed
     */
    public function getContacto()
    {
        return $this->contacto;
    }

    /**
     * @param mixed $contacto
     */


    public function setContacto($contacto): void
    {
        $this->contacto = $contacto;
    }


    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(int $id): self
    {
        $this->id = $id;
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

    public function getPrimerApellido(): ?string
    {
        return $this->primer_apellido;
    }

    public function setPrimerApellido(string $primer_apellido): self
    {
        $this->primer_apellido = $primer_apellido;

        return $this;
    }

    public function getSegundoApellido(): ?string
    {
        return $this->segundo_apellido;
    }

    public function setSegundoApellido(string $segundo_apellido): self
    {
        $this->segundo_apellido = $segundo_apellido;

        return $this;
    }

    public function getDni(): ?string
    {
        return $this->dni;
    }

    public function setDni(string $dni): self
    {
        $this->dni = $dni;

        return $this;
    }

    public function getNumSs(): ?string
    {
        return $this->num_ss;
    }

    public function setNumSs(string $num_ss): self
    {
        $this->num_ss = $num_ss;

        return $this;
    }

    public function getFechaNac(): ?\DateTimeInterface
    {
        return $this->fecha_nac;
    }

    public function setFechaNac(\DateTimeInterface $fecha_nac): self
    {
        $this->fecha_nac = $fecha_nac;

        return $this;
    }

    public function getFechaIngreso(): ?\DateTimeInterface
    {
        return $this->fecha_ingreso;
    }

    public function setFechaIngreso(\DateTimeInterface $fecha_ingreso): self
    {
        $this->fecha_ingreso = $fecha_ingreso;

        return $this;
    }

    public function getMedMap(): ?int
    {
        return $this->med_map;
    }

    public function setMedMap(MedicosMAP $med_map): self
    {
        $this->med_map = $med_map->getId();

        return $this;
    }

    public function getPodologia(): ?int
    {
        return $this->podologia;
    }

    public function setPodologia(Podologo $podologia): self
    {
        $this->podologia = $podologia->getId();

        return $this;
    }

    public function getNumHabitacion(): ?int
    {
        return $this->num_habitacion;
    }

    public function setNumHabitacion(int $num_habitacion): self
    {
        $this->num_habitacion = $num_habitacion;

        return $this;
    }

    public function getNumLav(): ?int
    {
        return $this->num_lav;
    }

    public function setNumLav(int $num_lav): self
    {
        $this->num_lav = $num_lav;

        return $this;
    }

    public function getAlergias(): ?string
    {
        return $this->alergias;
    }

    public function setAlergias(?string $alergias): self
    {
        $this->alergias = $alergias;

        return $this;
    }

    public function getOxigeno(): ?int
    {
        return $this->oxigeno;
    }

    public function setOxigeno(?int $oxigeno): self
    {
        $this->oxigeno = $oxigeno;

        return $this;
    }

    public function getAnticoagulante(): ?int
    {
        return $this->anticoagulante;
    }

    public function setAnticoagulante(?int $anticoagulante): self
    {
        $this->anticoagulante = $anticoagulante;

        return $this;
    }

    public function getHipertension(): ?int
    {
        return $this->hipertension;
    }

    public function setHipertension(?int $hipertension): self
    {
        $this->hipertension = $hipertension;

        return $this;
    }

    public function getDiabetes(): ?int
    {
        return $this->diabetes;
    }

    public function setDiabetes(int $diabetes): self
    {
        $this->diabetes = $diabetes;

        return $this;
    }

    public function getDemencia(): ?int
    {
        return $this->demencia;
    }

    public function setDemencia(?int $demencia): self
    {
        $this->demencia = $demencia;

        return $this;
    }

    public function getNivelDependencia(): ?int
    {
        return $this->nivel_dependencia;
    }

    public function setNivelDependencia(int $nivel_dependencia): self
    {
        $this->nivel_dependencia = $nivel_dependencia;

        return $this;
    }

}
