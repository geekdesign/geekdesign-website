<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LayoutBlockRepository")
 * @ORM\HasLifecycleCallbacks
 */
class LayoutBlock
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
     * @ORM\Column(type="string", length=255)
     */
    private $camelName;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Block", mappedBy="layout")
     */
    private $blocks;

    public function __construct()
    {
        $this->blocks = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->nom;
    }

    /**
     * Permet d'initialiser un slug d'après le titre soit lors de la création soit lors de la mise à jour
     * 
     * @ORM\PrePersist
     * @ORM\PreUpdate
     * 
     * @return void
     */
    public function creationCamelName(){
        if(empty($this->camelName)){
            $camelName = ucwords($this->nom);
            $camelName = trim($camelName);
            $camelName = str_replace(" ", "", $camelName);
            $this->camelName = lcfirst($camelName);
        }
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

    public function getCamelName(): ?string
    {
        return $this->camelName;
    }

    public function setCamelName(string $camelName): self
    {
        $this->camelName = $camelName;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Block[]
     */
    public function getBlocks(): Collection
    {
        return $this->blocks;
    }

    public function addBlock(Block $block): self
    {
        if (!$this->blocks->contains($block)) {
            $this->blocks[] = $block;
            $block->setLayout($this);
        }

        return $this;
    }

    public function removeBlock(Block $block): self
    {
        if ($this->blocks->contains($block)) {
            $this->blocks->removeElement($block);
            // set the owning side to null (unless already changed)
            if ($block->getLayout() === $this) {
                $block->setLayout(null);
            }
        }

        return $this;
    }
}
