<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: FormationRepository::class)]
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    /**
     * @Assert\NotBlank(message="Veuillez renseigner le nom de la formation")
     */
    private $intitule;

    #[ORM\OneToMany(mappedBy: 'formation', targetEntity: Promotion::class)]
    private $inscrit;

    #[ORM\ManyToOne(targetEntity: Organisme::class, inversedBy: 'propose')]
    private $organisme_id;

    public function __construct()
    {
        $this->inscrit = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * @return Collection<int, Promotion>
     */
    public function getInscrit(): Collection
    {
        return $this->inscrit;
    }

    public function addInscrit(Promotion $inscrit): self
    {
        if (!$this->inscrit->contains($inscrit)) {
            $this->inscrit[] = $inscrit;
            $inscrit->setFormation($this);
        }

        return $this;
    }

    public function removeInscrit(Promotion $inscrit): self
    {
        if ($this->inscrit->removeElement($inscrit)) {
            // set the owning side to null (unless already changed)
            if ($inscrit->getFormation() === $this) {
                $inscrit->setFormation(null);
            }
        }

        return $this;
    }

    public function getOrganismeId(): ?Organisme
    {
        return $this->organisme_id;
    }

    public function setOrganismeId(?Organisme $organisme_id): self
    {
        $this->organisme_id = $organisme_id;

        return $this;
    }

    public function __toString()
    {
        return $this->intitule;
    }
}
