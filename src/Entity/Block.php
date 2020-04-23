<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BlockRepository")
 */
class Block
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $introduction;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $couleur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\LayoutBlock", inversedBy="blocks")
     */
    private $layout;

    /**
     * @ORM\Column(type="integer")
     */
    private $niveau;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Pages", inversedBy="blocks")
     */
    private $page;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isOnline;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lien;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $textBlanc;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $textLien;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Zone", inversedBy="blocks")
     */
    private $zone;

    public function __toString()
    {
        return $this->nom;
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

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getIntroduction(): ?string
    {
        return $this->introduction;
    }

    public function setIntroduction(?string $introduction): self
    {
        $this->introduction = $introduction;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(?string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getLayout(): ?LayoutBlock
    {
        return $this->layout;
    }

    public function setLayout(?LayoutBlock $layout): self
    {
        $this->layout = $layout;

        return $this;
    }

    public function getNiveau(): ?int
    {
        return $this->niveau;
    }

    public function setNiveau(int $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getPage(): ?Pages
    {
        return $this->page;
    }

    public function setPage(?Pages $page): self
    {
        $this->page = $page;

        return $this;
    }

    public function getIsOnline(): ?bool
    {
        return $this->isOnline;
    }

    public function setIsOnline(bool $isOnline): self
    {
        $this->isOnline = $isOnline;

        return $this;
    }

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(?string $lien): self
    {
        $this->lien = $lien;

        return $this;
    }

    public function getTextBlanc(): ?bool
    {
        return $this->textBlanc;
    }

    public function setTextBlanc(?bool $textBlanc): self
    {
        $this->textBlanc = $textBlanc;

        return $this;
    }

    public function getTextLien(): ?string
    {
        return $this->textLien;
    }

    public function setTextLien(?string $textLien): self
    {
        $this->textLien = $textLien;

        return $this;
    }

    public function getZone(): ?Zone
    {
        return $this->zone;
    }

    public function setZone(?Zone $zone): self
    {
        $this->zone = $zone;

        return $this;
    }
}
