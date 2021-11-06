<?php

namespace App\Entity;

use App\Repository\PanierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PanierRepository::class)
 */
class Panier
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Cours::class, mappedBy="panier", orphanRemoval=true)
     */
    private $cour;

    /**
     * @ORM\ManyToOne(targetEntity=Admin::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $admin;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function __construct()
    {
        $this->cour = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Cours[]
     */
    public function getCour(): Collection
    {
        return $this->cour;
    }

    public function addCour(Cours $cour): self
    {
        if (!$this->cour->contains($cour)) {
            $this->cour[] = $cour;
            $cour->setPanier($this);
        }

        return $this;
    }

    public function removeCour(Cours $cour): self
    {
        if ($this->cour->removeElement($cour)) {
            // set the owning side to null (unless already changed)
            if ($cour->getPanier() === $this) {
                $cour->setPanier(null);
            }
        }

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
