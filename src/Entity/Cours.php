<?php

namespace App\Entity;

use App\Repository\CoursRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CoursRepository::class)
 */
class Cours
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
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity=Matieres::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $matiere;

    /**
     * @ORM\ManyToOne(targetEntity=NiveauScolaire::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $niveauscolaire;

    /**
     * @ORM\ManyToOne(targetEntity=Ecoles::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $ecole;

    /**
     * @ORM\ManyToOne(targetEntity=Admin::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $admin;

    /**
     * @ORM\ManyToOne(targetEntity=Panier::class, inversedBy="cour")
     * @ORM\JoinColumn(nullable=false)
     */
    private $panier;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getMatiere(): ?Matieres
    {
        return $this->matiere;
    }

    public function setMatiere(?Matieres $matiere): self
    {
        $this->matiere = $matiere;

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

    public function getEcole(): ?Ecoles
    {
        return $this->ecole;
    }

    public function setEcole(?Ecoles $ecole): self
    {
        $this->ecole = $ecole;

        return $this;
    }

    public function getAdmin(): ?Admin
    {
        return $this->admin;
    }

    public function setAdmin(?Admin $admin): self
    {
        $this->admin = $admin;

        return $this;
    }

    public function getPanier(): ?Panier
    {
        return $this->panier;
    }

    public function setPanier(?Panier $panier): self
    {
        $this->panier = $panier;

        return $this;
    }
}
