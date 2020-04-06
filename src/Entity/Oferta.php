<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OfertaRepository")
 */
class Oferta
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $descripcio;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dataPub;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titol;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Empresa", inversedBy="ofertas")
     */
    private $empresa;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Candidat", mappedBy="oferta")
     */
    private $ofertaCandidat;

    public function __construct()
    {
        $this->ofertaCandidat = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescripcio(): ?string
    {
        return $this->descripcio;
    }

    public function setDescripcio(?string $descripcio): self
    {
        $this->descripcio = $descripcio;

        return $this;
    }

    public function getDataPub(): ?\DateTimeInterface
    {
        return $this->dataPub;
    }

    public function setDataPub(?\DateTimeInterface $dataPub): self
    {
        $this->dataPub = $dataPub;

        return $this;
    }

    public function getTitol(): ?string
    {
        return $this->titol;
    }

    public function setTitol(?string $titol): self
    {
        $this->titol = $titol;

        return $this;
    }

    public function toString()
    {
        return $this->getId();
    }
    public function getEmpresa(): ?Empresa
    {
        return $this->empresa;
    }

    public function setEmpresa(?Empresa $empresa): self
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * @return Collection|Candidat[]
     */
    public function getOfertaCandidat(): Collection
    {
        return $this->ofertaCandidat;
    }

    public function addOfertaCandidat(Candidat $ofertaCandidat): self
    {
        if (!$this->ofertaCandidat->contains($ofertaCandidat)) {
            $this->ofertaCandidat[] = $ofertaCandidat;
            $ofertaCandidat->setOferta($this);
        }

        return $this;
    }

    public function removeOfertaCandidat(Candidat $ofertaCandidat): self
    {
        if ($this->ofertaCandidat->contains($ofertaCandidat)) {
            $this->ofertaCandidat->removeElement($ofertaCandidat);
            // set the owning side to null (unless already changed)
            if ($ofertaCandidat->getOferta() === $this) {
                $ofertaCandidat->setOferta(null);
            }
        }

        return $this;
    }
}
