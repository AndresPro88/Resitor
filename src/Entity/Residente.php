<?php

namespace App\Entity;

use App\Repository\ResidenteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass=ResidenteRepository::class)
 */
class Residente
{
    const REGISTRO_EXITO = 'Residente registrado correctamente';
    const REGISTRO_ERROR = "Hubo Problemas al registrar residente";
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
     * @ORM\Column(type="string", length=1)
     */
    private $sexo;

    /**
     * @ORM\Column(type="integer")
     */
    private $estado_civil;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $lugar_procedencia;

    /**
     * @ORM\Column(type="integer")
     */
    private $tipo_estancia;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $peluqueria;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $nombre_seguro;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $poliza_seguro;

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
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $foto;

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
     * @ORM\OneToMany(targetEntity=Contacto::class, mappedBy="residente")
     */
    private $contactos;
    /**
     * @ORM\OneToMany(targetEntity=Accidente::class, mappedBy="residente")
     */
    private $accidentes;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MedicosMAP", inversedBy="residente")
     */
    private $med_map;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Podologo", inversedBy="residente")
     */
    private $podologia;

    /**
     * @ORM\OneToMany(targetEntity=Sondas::class, mappedBy="residente")
     */
    private $sondas;

    /**
     * @ORM\OneToMany(targetEntity=ConstantesVitales::class, mappedBy="residente")
     */
    private $constantesVitales;

    /**
     * @ORM\OneToMany(targetEntity=SegEnfermeria::class, mappedBy="residente")
     */
    private $segEnfermerias;

    /**
     * @ORM\OneToMany(targetEntity=ConsultaExterna::class, mappedBy="residente")
     */
    private $consultaExternas;

    /**
     * @ORM\OneToMany(targetEntity=Antibiotico::class, mappedBy="residente")
     */
    private $antibioticos;

    /**
     * @ORM\OneToMany(targetEntity=Tratamiento::class, mappedBy="Residente", orphanRemoval=true)
     */
    private $tratamientos;

    public function __construct()
    {
        $this->contactos = new ArrayCollection();
        $this->accidentes = new ArrayCollection();
        $this->sondas = new ArrayCollection();
        $this->constantesVitales = new ArrayCollection();
        $this->segEnfermerias = new ArrayCollection();
        $this->consultaExternas = new ArrayCollection();
        $this->antibioticos = new ArrayCollection();
        $this->tratamientos = new ArrayCollection();
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

    /**
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param mixed $sexo
     */
    public function setSexo($sexo): void
    {
        $this->sexo = $sexo;
    }

    /**
     * @return mixed
     */
    public function getEstadoCivil()
    {
        return $this->estado_civil;
    }

    /**
     * @param mixed $estado_civil
     */
    public function setEstadoCivil($estado_civil): void
    {
        $this->estado_civil = $estado_civil;
    }

    /**
     * @return mixed
     */
    public function getLugarProcedencia()
    {
        return $this->lugar_procedencia;
    }

    /**
     * @param mixed $lugar_procedencia
     */
    public function setLugarProcedencia($lugar_procedencia): void
    {
        $this->lugar_procedencia = $lugar_procedencia;
    }

    /**
     * @return mixed
     */
    public function getTipoEstancia()
    {
        return $this->tipo_estancia;
    }

    /**
     * @param mixed $tipo_estancia
     */
    public function setTipoEstancia($tipo_estancia): void
    {
        $this->tipo_estancia = $tipo_estancia;
    }

    /**
     * @return mixed
     */
    public function getPeluqueria()
    {
        return $this->peluqueria;
    }

    /**
     * @param mixed $peluqueria
     */
    public function setPeluqueria($peluqueria): void
    {
        $this->peluqueria = $peluqueria;
    }

    /**
     * @return mixed
     */
    public function getNombreSeguro()
    {
        return $this->nombre_seguro;
    }

    /**
     * @param mixed $nombre_seguro
     */
    public function setNombreSeguro($nombre_seguro): void
    {
        $this->nombre_seguro = $nombre_seguro;
    }

    /**
     * @return mixed
     */
    public function getPolizaSeguro()
    {
        return $this->poliza_seguro;
    }

    /**
     * @param mixed $poliza_seguro
     */
    public function setPolizaSeguro($poliza_seguro): void
    {
        $this->poliza_seguro = $poliza_seguro;
    }

    /**
     * @return mixed
     */
    public function getMedMap()
    {
        return $this->med_map;
    }

    /**
     * @param mixed $med_map
     */
    public function setMedMap($med_map): void
    {
        $this->med_map = $med_map;
    }
    /**
     * @return mixed
     */
    public function getPodologia()
    {
        return $this->podologia;
    }

    /**
     * @param mixed $podologia
     */
    public function setPodologia($podologia): void
    {
        $this->podologia = $podologia;
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

    /**
     * @return mixed
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param mixed $foto
     */
    public function setFoto($foto): void
    {
        $this->foto = $foto;
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
    /**
     * @return Collection|Contacto[]
     */
    public function getContactos(): Collection
    {
        return $this->contactos;
    }

    public function addContacto(Accidente $contactos): self
    {
        if (!$this->contactos->contains($contactos)) {
            $this->contactos[] = $contactos;
            $contactos->setResidente($this);
        }

        return $this;
    }

    public function removeContacto(Contacto $contactos): self
    {
        if ($this->contactos->removeElement($contactos)) {
            // set the owning side to null (unless already changed)
            if ($contactos->getResidente() === $this) {
                $contactos->setResidente(null);
            }
        }

        return $this;
    }
    /**
     * @return Collection|Accidente[]
     */
    public function getAccidentes(): Collection
    {
        return $this->accidentes;
    }
    public function accidenteUltimaSemana()
    {
        foreach ($this->getAccidentes() as $accidente){
            if (strtotime($accidente->getFechaAccidente()->format('Y-m-d H:i:s')) > strtotime('-7 day', strtotime(date('Y-m-d H:i:s')))) {
                return true;
            }
        }
        return false;
    }
    public function addAccidente(Accidente $accidente): self
    {
        if (!$this->accidentes->contains($accidente)) {
            $this->accidentes[] = $accidente;
            $accidente->setResidente($this);
        }

        return $this;
    }

    public function removeAccidente(Accidente $accidente): self
    {
        if ($this->accidentes->removeElement($accidente)) {
            // set the owning side to null (unless already changed)
            if ($accidente->getResidente() === $this) {
                $accidente->setResidente(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Sondas[]
     */
    public function getSondas(): Collection
    {
        return $this->sondas;
    }

    public function addSonda(Sondas $sonda): self
    {
        if (!$this->sondas->contains($sonda)) {
            $this->sondas[] = $sonda;
            $sonda->setResidente($this);
        }

        return $this;
    }

    public function removeSonda(Sondas $sonda): self
    {
        if ($this->sondas->removeElement($sonda)) {
            // set the owning side to null (unless already changed)
            if ($sonda->getResidente() === $this) {
                $sonda->setResidente(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ConstantesVitales[]
     */
    public function getConstantesVitales(): Collection
    {
        return $this->constantesVitales;
    }

    public function addConstantesVitale(ConstantesVitales $constantesVitale): self
    {
        if (!$this->constantesVitales->contains($constantesVitale)) {
            $this->constantesVitales[] = $constantesVitale;
            $constantesVitale->setResidente($this);
        }

        return $this;
    }

    public function removeConstantesVitale(ConstantesVitales $constantesVitale): self
    {
        if ($this->constantesVitales->removeElement($constantesVitale)) {
            // set the owning side to null (unless already changed)
            if ($constantesVitale->getResidente() === $this) {
                $constantesVitale->setResidente(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SegEnfermeria[]
     */
    public function getSegEnfermerias(): Collection
    {
        return $this->segEnfermerias;
    }

    public function addSegEnfermeria(SegEnfermeria $segEnfermeria): self
    {
        if (!$this->segEnfermerias->contains($segEnfermeria)) {
            $this->segEnfermerias[] = $segEnfermeria;
            $segEnfermeria->setResidente($this);
        }

        return $this;
    }

    public function removeSegEnfermeria(SegEnfermeria $segEnfermeria): self
    {
        if ($this->segEnfermerias->removeElement($segEnfermeria)) {
            // set the owning side to null (unless already changed)
            if ($segEnfermeria->getResidente() === $this) {
                $segEnfermeria->setResidente(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ConsultaExterna[]
     */
    public function getConsultaExternas(): Collection
    {
        return $this->consultaExternas;
    }

    public function addConsultaExterna(ConsultaExterna $consultaExterna): self
    {
        if (!$this->consultaExternas->contains($consultaExterna)) {
            $this->consultaExternas[] = $consultaExterna;
            $consultaExterna->setResidente($this);
        }

        return $this;
    }

    public function removeConsultaExterna(ConsultaExterna $consultaExterna): self
    {
        if ($this->consultaExternas->removeElement($consultaExterna)) {
            // set the owning side to null (unless already changed)
            if ($consultaExterna->getResidente() === $this) {
                $consultaExterna->setResidente(null);
            }
        }

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
            $antibiotico->setResidente($this);
        }

        return $this;
    }

    public function removeAntibiotico(Antibiotico $antibiotico): self
    {
        if ($this->antibioticos->removeElement($antibiotico)) {
            // set the owning side to null (unless already changed)
            if ($antibiotico->getResidente() === $this) {
                $antibiotico->setResidente(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Tratamiento[]
     */
    public function getTratamientos(): Collection
    {
        return $this->tratamientos;
    }

    public function addTratamiento(Tratamiento $tratamiento): self
    {
        if (!$this->tratamientos->contains($tratamiento)) {
            $this->tratamientos[] = $tratamiento;
            $tratamiento->setResidente($this);
        }

        return $this;
    }

    public function removeTratamiento(Tratamiento $tratamiento): self
    {
        if ($this->tratamientos->removeElement($tratamiento)) {
            // set the owning side to null (unless already changed)
            if ($tratamiento->getResidente() === $this) {
                $tratamiento->setResidente(null);
            }
        }

        return $this;
    }
}
