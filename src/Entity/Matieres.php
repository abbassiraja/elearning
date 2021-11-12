<?php

namespace App\Entity;

use App\Repository\MatieresRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MatieresRepository::class)
 */
class Matieres
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity=NiveauScolaire::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $niveauscolaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getNiveauscolaire(): ?NiveauScolaire
    {
        return $this->niveauscolaire;
    }

    public function setNiveauscolaire(?NiveauScolaire $niveauscolaire): self
    {
        $this->niveauscolaire = $niveauscolaire;

        return $this;
    }
    public function __toString(){
        return $this->nom;
    }
}
