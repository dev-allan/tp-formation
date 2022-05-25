<?php

namespace App\Entity;

use App\Repository\PromotionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PromotionRepository::class)]
class Promotion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\OneToMany(mappedBy: 'promotion_id', targetEntity: Session::class)]
    private $participe;

    #[ORM\OneToMany(mappedBy: 'promotion_id', targetEntity: Candidat::class)]
    private $fait_partit;

    #[ORM\ManyToOne(targetEntity: Formation::class, inversedBy: 'inscrit')]
    private $formation;

    #[ORM\ManyToOne(targetEntity: Formateur::class, inversedBy: 'enseigne')]
    private $formateur;

    public function __construct()
    {
        $this->participe = new ArrayCollection();
        $this->fait_partit = new ArrayCollection();
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

    /**
     * @return Collection<int, Session>
     */
    public function getParticipe(): Collection
    {
        return $this->participe;
    }

    public function addParticipe(Session $participe): self
    {
        if (!$this->participe->contains($participe)) {
            $this->participe[] = $participe;
            $participe->setPromotionId($this);
        }

        return $this;
    }

    public function removeParticipe(Session $participe): self
    {
        if ($this->participe->removeElement($participe)) {
            // set the owning side to null (unless already changed)
            if ($participe->getPromotionId() === $this) {
                $participe->setPromotionId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Candidat>
     */
    public function getFaitPartit(): Collection
    {
        return $this->fait_partit;
    }

    public function addFaitPartit(Candidat $faitPartit): self
    {
        if (!$this->fait_partit->contains($faitPartit)) {
            $this->fait_partit[] = $faitPartit;
            $faitPartit->setPromotionId($this);
        }

        return $this;
    }

    public function removeFaitPartit(Candidat $faitPartit): self
    {
        if ($this->fait_partit->removeElement($faitPartit)) {
            // set the owning side to null (unless already changed)
            if ($faitPartit->getPromotionId() === $this) {
                $faitPartit->setPromotionId(null);
            }
        }

        return $this;
    }

    public function getFormation(): ?Formation
    {
        return $this->formation;
    }

    public function setFormation(?Formation $formation): self
    {
        $this->formation = $formation;

        return $this;
    }

    public function getFormateur(): ?Formateur
    {
        return $this->formateur;
    }

    public function setFormateur(?Formateur $formateur): self
    {
        $this->formateur = $formateur;

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }
}
