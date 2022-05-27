<?php

namespace App\Entity;

use App\Repository\OrganismeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: OrganismeRepository::class)]
class Organisme
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
     * @Assert\NotBlank(message="Veuillez renseigner l'adresse")
     */
    private $adresse;

    #[ORM\Column(type: 'string', length: 255)]
    /**
     * @Assert\Regex("#^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$#")
     */
    private $numero_tel;

    #[ORM\Column(type: 'string', length: 255)]
    /**
     * @Assert\Email()
     */
    private $email_contact;

    #[ORM\OneToMany(mappedBy: 'organisme_id', targetEntity: Formation::class)]
    private $propose;

    public function __construct()
    {
        $this->propose = new ArrayCollection();
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getNumeroTel(): ?string
    {
        return $this->numero_tel;
    }

    public function setNumeroTel(string $numero_tel): self
    {
        $this->numero_tel = $numero_tel;

        return $this;
    }

    public function getEmailContact(): ?string
    {
        return $this->email_contact;
    }

    public function setEmailContact(string $email_contact): self
    {
        $this->email_contact = $email_contact;

        return $this;
    }

    /**
     * @return Collection<int, Formation>
     */
    public function getPropose(): Collection
    {
        return $this->propose;
    }

    public function addPropose(Formation $propose): self
    {
        if (!$this->propose->contains($propose)) {
            $this->propose[] = $propose;
            $propose->setOrganismeId($this);
        }

        return $this;
    }

    public function removePropose(Formation $propose): self
    {
        if ($this->propose->removeElement($propose)) {
            // set the owning side to null (unless already changed)
            if ($propose->getOrganismeId() === $this) {
                $propose->setOrganismeId(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }
}
