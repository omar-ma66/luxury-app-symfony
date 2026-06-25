<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomSociete = null;

    #[ORM\Column(length: 255)]
    private ?string $activite = null;

    #[ORM\Column(length: 255)]
    private ?string $nomContact = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomContact = null;

    #[ORM\Column(length: 255)]
    private ?string $mailContact = null;

    #[ORM\Column(length: 255)]
    private ?string $telContact = null;

    #[ORM\Column(length: 255)]
    private ?string $messageContact = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSociete(): ?string
    {
        return $this->nomSociete;
    }

    public function setNomSociete(string $nomSociete): static
    {
        $this->nomSociete = $nomSociete;

        return $this;
    }

    public function getActivite(): ?string
    {
        return $this->activite;
    }

    public function setActivite(string $activite): static
    {
        $this->activite = $activite;

        return $this;
    }

    public function getNomContact(): ?string
    {
        return $this->nomContact;
    }

    public function setNomContact(string $nomContact): static
    {
        $this->nomContact = $nomContact;

        return $this;
    }

    public function getPrenomContact(): ?string
    {
        return $this->prenomContact;
    }

    public function setPrenomContact(string $prenomContact): static
    {
        $this->prenomContact = $prenomContact;

        return $this;
    }

    public function getMailContact(): ?string
    {
        return $this->mailContact;
    }

    public function setMailContact(string $mailContact): static
    {
        $this->mailContact = $mailContact;

        return $this;
    }

    public function getTelContact(): ?string
    {
        return $this->telContact;
    }

    public function setTelContact(string $telContact): static
    {
        $this->telContact = $telContact;

        return $this;
    }

    public function getMessageContact(): ?string
    {
        return $this->messageContact;
    }

    public function setMessageContact(string $messageContact): static
    {
        $this->messageContact = $messageContact;

        return $this;
    }
}
