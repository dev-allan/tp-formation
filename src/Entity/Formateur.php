<?php

namespace App\Entity;

use App\Repository\FormateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: FormateurRepository::class)]
class Formateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    /**
     * @Assert\NotBlank(message="Veuillez renseigner le nom")
     */
    private $nom;

    #[ORM\Column(type: 'string', length: 255)]
    /**
     * @Assert\NotBlank(message="Veuillez renseigner le prénom")
     */
    private $prenom;

    #[ORM\Column(type: 'string', length: 255)]
    /**
     * @Assert\Regex("#^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$#")
     */
    private $numero;

    #[ORM\Column(type: 'string', length: 255)]
    /**
     * @Assert\Email()
     */
    private $email;

    #[ORM\ManyToMany(targetEntity: Session::class, mappedBy: 'formateur_id')]
    private $enseigne;

    public function __construct()
    {
        $this->enseigne = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection<int, Session>
     */
    public function getEnseigne(): Collection
    {
        return $this->enseigne;
    }

    public function addEnseigne(Session $enseigne): self
    {
        if (!$this->enseigne->contains($enseigne)) {
            $this->enseigne[] = $enseigne;
            $enseigne->addFormateurId($this);
        }

        return $this;
    }

    public function removeEnseigne(Session $enseigne): self
    {
        if ($this->enseigne->removeElement($enseigne)) {
            $enseigne->removeFormateurId($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }
}
