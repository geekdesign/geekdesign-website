<?php

namespace App\Entity;

use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjetsRepository")
 * @Vich\Uploadable()
 * @ORM\HasLifecycleCallbacks
 */
class Projets
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $introduction;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lien;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isOnline;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Types", inversedBy="projets")
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Technologie", inversedBy="projets")
     */
    private $technologie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="Attachment", mappedBy="projets", cascade={"persist"}, orphanRemoval=true)
     */
    private $attachments;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $responsiveImageLaptop;

    /**
     * @Assert\Image(mimeTypes = {"image/gif", "image/jpeg", "image/png"})
     * @Vich\UploadableField(mapping="imagesLaptop", fileNameProperty="responsiveImageLaptop")
     * 
     */
    private $responsiveImageLaptopFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $responsiveImageIpad;

    /**
     * @Assert\Image(mimeTypes = {"image/gif", "image/jpeg", "image/png"})
     * @Vich\UploadableField(mapping="imagesIpad", fileNameProperty="responsiveImageIpad")
     * 
     */
    private $responsiveImageIpadFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $responsiveImagePhone;

    /**
     * @Assert\Image(mimeTypes = {"image/gif", "image/jpeg", "image/png"})
     * @Vich\UploadableField(mapping="imagesPhone", fileNameProperty="responsiveImagePhone")
     * 
     */
    private $responsiveImagePhoneFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $printImage1;

    /**
     * @Assert\Image(mimeTypes = {"image/gif", "image/jpeg", "image/png"})
     * @Vich\UploadableField(mapping="images", fileNameProperty="printImage1")
     * 
     */
    private $printImage1File;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $printImage2;

    /**
     * @Assert\Image(mimeTypes = {"image/gif", "image/jpeg", "image/png"})
     * @Vich\UploadableField(mapping="images", fileNameProperty="printImage2")
     * 
     */
    private $printImage2File;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $printImage3;

    /**
     * @Assert\Image(mimeTypes = {"image/gif", "image/jpeg", "image/png"})
     * @Vich\UploadableField(mapping="images", fileNameProperty="printImage3")
     * 
     */
    private $printImage3File;

    /**
     * Permet d'initialiser un slug d'après le titre soit lors de la création soit lors de la mise à jour
     * 
     * @ORM\PrePersist
     * @ORM\PreUpdate
     * 
     * @return void
     */
    public function creationSlug(){
        if(empty($this->slug)){
            $slugify = new Slugify();
            $this->slug = $slugify->slugify($this->nom);
        }
    }

    public function __construct()
    {
        $this->type = new ArrayCollection();
        $this->technologie = new ArrayCollection();
        $this->setCreatedAt(new \DateTime());
        $this->attachments = new ArrayCollection();
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

    public function getIntroduction(): ?string
    {
        return $this->introduction;
    }

    public function setIntroduction(?string $introduction): self
    {
        $this->introduction = $introduction;

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

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(?string $lien): self
    {
        $this->lien = $lien;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getIsOnline(): ?bool
    {
        return $this->isOnline;
    }

    public function setIsOnline(?bool $isOnline): self
    {
        $this->isOnline = $isOnline;

        return $this;
    }

    /**
     * @return Collection|Types[]
     */
    public function getType(): Collection
    {
        return $this->type;
    }

    public function addType(Types $type): self
    {
        if (!$this->type->contains($type)) {
            $this->type[] = $type;
        }

        return $this;
    }

    public function removeType(Types $type): self
    {
        if ($this->type->contains($type)) {
            $this->type->removeElement($type);
        }

        return $this;
    }

    /**
     * @return Collection|Technologie[]
     */
    public function getTechnologie(): Collection
    {
        return $this->technologie;
    }

    public function addTechnologie(Technologie $technologie): self
    {
        if (!$this->technologie->contains($technologie)) {
            $this->technologie[] = $technologie;
        }

        return $this;
    }

    public function removeTechnologie(Technologie $technologie): self
    {
        if ($this->technologie->contains($technologie)) {
            $this->technologie->removeElement($technologie);
        }

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
    */
    public function updatedTimestamps(): void
    {
        $this->setUpdatedAt(new \DateTime('now'));    
        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt(new \DateTime('now'));
        }
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection|Attachment[]
     */
    public function getAttachments(): Collection
    {
        return $this->attachments;
    }

    public function addAttachment(Attachment $attachment): self
    {
        if (!$this->attachments->contains($attachment)) {
            $this->attachments[] = $attachment;
            $attachment->setProjets($this);
        }
        if($attachment) {
            $this->updatedAt = new \DateTime();
        }

        return $this;
    }

    public function removeAttachment(Attachment $attachment): self
    {
        if ($this->attachments->contains($attachment)) {
            $this->attachments->removeElement($attachment);
            // set the owning side to null (unless already changed)
            if ($attachment->getProjets() === $this) {
                $attachment->setProjets(null);
            }
            if($attachment) {
                $this->updatedAt = new \DateTime();
            }
        }

        return $this;
    }

    public function getResponsiveImageLaptop(): ?string
    {
        return $this->responsiveImageLaptop;
    }

    public function setResponsiveImageLaptop(?string $responsiveImageLaptop): self
    {
        $this->responsiveImageLaptop = $responsiveImageLaptop;

        return $this;
    }

    public function getResponsiveImageLaptopFile()
    {
        return $this->responsiveImageLaptopFile;
    }

    /**
     *
     * @param string|null $responsiveImageLaptopFile
     * @throws \Exception
     */
    public function setResponsiveImageLaptopFile($responsiveImageLaptopFile): void
    {
        $this->responsiveImageLaptopFile = $responsiveImageLaptopFile;
    }




    public function getResponsiveImageIpad(): ?string
    {
        return $this->responsiveImageIpad;
    }

    public function setResponsiveImageIpad(?string $responsiveImageIpad): self
    {
        $this->responsiveImageIpad = $responsiveImageIpad;

        return $this;
    }

    public function getResponsiveImageIpadFile()
    {
        return $this->responsiveImageIpadFile;
    }

    /**
     *
     * @param string|null $responsiveImageIpadFile
     * @throws \Exception
     */
    public function setResponsiveImageIpadFile($responsiveImageIpadFile): void
    {
        $this->responsiveImageIpadFile = $responsiveImageIpadFile;
    }




    
    public function getResponsiveImagePhone(): ?string
    {
        return $this->responsiveImagePhone;
    }

    public function setResponsiveImagePhone(?string $responsiveImagePhone): self
    {
        $this->responsiveImagePhone = $responsiveImagePhone;

        return $this;
    }

    public function getResponsiveImagePhoneFile()
    {
        return $this->responsiveImagePhoneFile;
    }

    /**
     *
     * @param string|null $responsiveImagePhoneFile
     * @throws \Exception
     */
    public function setResponsiveImagePhoneFile($responsiveImagePhoneFile): void
    {
        $this->responsiveImagePhoneFile = $responsiveImagePhoneFile;
    }


    public function getPrintImage1(): ?string
    {
        return $this->printImage1;
    }

    public function setPrintImage1(?string $printImage1): self
    {
        $this->printImage1 = $printImage1;

        return $this;
    }

    public function getPrintImage1File()
    {
        return $this->printImage1File;
    }

    /**
     *
     * @param string|null $printImage1File
     * @throws \Exception
     */
    public function setPrintImage1File($printImage1File): void
    {
        $this->printImage1File = $printImage1File;
    }




    public function getPrintImage2(): ?string
    {
        return $this->printImage2;
    }

    public function setPrintImage2(?string $printImage2): self
    {
        $this->printImage2 = $printImage2;

        return $this;
    }

    public function getPrintImage2File()
    {
        return $this->printImage2File;
    }

    /**
     *
     * @param string|null $printImage2File
     * @throws \Exception
     */
    public function setPrintImage2File($printImage2File): void
    {
        $this->printImage2File = $printImage2File;
    }




    public function getPrintImage3(): ?string
    {
        return $this->printImage3;
    }

    public function setPrintImage3(?string $printImage3): self
    {
        $this->printImage3 = $printImage3;

        return $this;
    }

    public function getPrintImage3File()
    {
        return $this->printImage3File;
    }

    /**
     *
     * @param string|null $printImage2File
     * @throws \Exception
     */
    public function setPrintImage3File($printImage3File): void
    {
        $this->printImage3File = $printImage3File;
    }
}
