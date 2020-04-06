<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CandidatRepository")
 */
class Candidat
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cognoms;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telefon;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $estudis;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Oferta", inversedBy="ofertaCandidat")
     */
    private $oferta;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCognoms(): ?string
    {
        return $this->cognoms;
    }

    public function setCognoms(?string $cognoms): self
    {
        $this->cognoms = $cognoms;

        return $this;
    }

    public function getTelefon(): ?string
    {
        return $this->telefon;
    }

    public function setTelefon(?string $telefon): self
    {
        $this->telefon = $telefon;

        return $this;
    }

    public function getEstudis(): ?string
    {
        return $this->estudis;
    }

    public function setEstudis(?string $estudis): self
    {
        $this->estudis = $estudis;

        return $this;
    }

    public function getOferta(): ?Oferta
    {
        return $this->oferta;
    }

    public function setOferta(?Oferta $oferta): self
    {
        $this->oferta = $oferta;

        return $this;
    }
}
