<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use App\Repository\CoursRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=CoursRepository::class)
 *  @ORM\Table(name="cours", indexes={@ORM\Index(columns={"nom","description" }, flags={"fulltext"})})
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
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="cour")
     */
    private $commentaires;

    /**
     * @ORM\Column(type="integer")
     */
    private $reference;

    /**
     * @ORM\ManyToOne(targetEntity=Ecoles::class, )
     * @ORM\JoinColumn(nullable=false)
     */
    private $ecole;


    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
        $this->cours = new ArrayCollection();
    }

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
   

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setCour($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getCour() === $this) {
                $commentaire->setCour(null);
            }
        }

        return $this;
    }

    public function getReference(): ?int
    {
        return $this->reference;
    }

    public function setReference(int $reference): self
    {
        $this->reference = $reference;

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

    public function __toString(){
        return $this->nom;
    }
   
}
    

