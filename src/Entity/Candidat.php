<?php

namespace App\Entity;

use App\Repository\CandidatRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CandidatRepository::class)]
class Candidat
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
     * @Assert\Email()
     */
    private $email_contact;

    #[ORM\Column(type: 'string', length: 255)]
    /**
     * @Assert\Regex("#^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$#")
     */
    private $numero_tel;

    #[ORM\ManyToOne(targetEntity: Promotion::class, inversedBy: 'fait_partit')]
    private $promotion_id;

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

    public function getEmailContact(): ?string
    {
        return $this->email_contact;
    }

    public function setEmailContact(string $email_contact): self
    {
        $this->email_contact = $email_contact;

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

    public function getPromotionId(): ?Promotion
    {
        return $this->promotion_id;
    }

    public function setPromotionId(?Promotion $promotion_id): self
    {
        $this->promotion_id = $promotion_id;

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }
}
