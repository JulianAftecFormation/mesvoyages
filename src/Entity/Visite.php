<?php

namespace App\Entity;

use App\Repository\VisiteRepository;
use DateTime;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;



    #[ORM\Entity(repositoryClass: VisiteRepository::class)]
    #[Vich\Uploadable]
    class Visite
{ 
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $ville = null;

    #[ORM\Column]
    private ?int $tempmin = null;

    #[ORM\Column(nullable: true)]
    private ?int $tempmax = null;

    #[ORM\Column(length: 50)]
    private ?string $pays = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?DateTimeInterface $datecreation = null;

    #[ORM\Column(nullable: true)]
    private ?int $note = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $avis = null;

    #[ORM\ManyToMany(targetEntity: Environnement::class)]
    private Collection $environnements;
    
    #[Vich\UploadableField(mapping: 'visites', fileNameProperty: 'imageName')]
    #[Assert\Image(mimeTypes: ['image/jpeg', 'image/png'])]
    private ?File $imageFile = null;
    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $imageName = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updated_at = null;
    
    public function __construct()
    {
        $this->environnements = new ArrayCollection();
    }
 
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTempmin(): ?int
    {
        return $this->tempmin;
    }

    public function setTempmin(int $tempmin): static
    {
        $this->tempmin = $tempmin;

        return $this;
    }

    public function getTempmax(): ?int
    {
        return $this->tempmax;
    }

    public function setTempmax(?int $tempmax): static
    {
        $this->tempmax = $tempmax;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): static
    {
        $this->pays = $pays;

        return $this;
    }

    public function getDatecreation(): ?DateTimeInterface
    {
        return $this->datecreation;
    }

    public function setDatecreation(?DateTimeInterface $datecreation): static
    {
        $this->datecreation = $datecreation;

        return $this;
    }
    
    public function getDatecreationString(): string
    {
        if($this->datecreation == null){
            return "";
        }else{
            return $this->datecreation->format('d/m/Y');
        }
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getAvis(): ?string
    {
        return $this->avis;
    }

    public function setAvis(?string $avis): static
    {
        $this->avis = $avis;

        return $this;
    }

    /**
     * @return Collection<int, Environnement>
     */
    public function getEnvironnements(): Collection
    {
        return $this->environnements;
    }

    public function addEnvironnement(Environnement $environnement): static
    {
        if (!$this->environnements->contains($environnement)) {
            $this->environnements->add($environnement);
        }

        return $this;
    }

    public function removeEnvironnement(Environnement $environnement): static
    {
        $this->environnements->removeElement($environnement);

        return $this;
    }

    function getImageFile(): ?File {
        return $this->imageFile;
    }

    function getImageName(): ?string {
        return $this->imageName;
    }

    function setImageFile(?File $imageFile) {
        $this->imageFile = $imageFile;
        if ($this->imageFile instanceof UploadedFile){
            $this->updated_at = new DateTime('now');
        }
        return $this;
    }

    function setImageName(?string $imageName) {
        $this->imageName = $imageName;
        return $this;
    }

    
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }


}