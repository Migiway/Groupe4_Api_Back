<?php

namespace App\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @ORM\Entity(repositoryClass="App\AdminBundle\Repository\NoteRepository")
 */
class Note
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=255, name="title")
     * @Assert\NotBlank(message = "Ce champ doit être remplit")
     */
    private $title;

    /**
     * @ORM\Column(type="datetime", nullable=true, name="date_creation")
     */
    private $dateCreation;

    /**
     * @ORM\Column(type="datetime", nullable=true, name="date_echeance")
     */
    private $dateEcheance;

    /**
     * @ORM\Column(type="string", length=255, name="rel_type")
     */
    private $rel_type;

    /**
     * @ORM\Column(type="boolean", nullable=true, name="rappel_email")
     */
    private $rappel_email;

    /**
     * @ORM\Column(type="text", length=255, name="description")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\User")
     * @Assert\NotBlank(message = "Ce champ doit être remplit")
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     */
    private $rel_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\ParameterNoteCategorie")
     */
    private $categorie_note;

    /**
     * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\ParameterNotePriorite")
     */
    private $priorite_note;

    /**
     * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\ParameterNoteEcheance")
     */
    private $echeance_note;

    public function __construct()
    {
        $this->dateCreation = new \DateTime;
        $this->dateEcheance = new \DateTime;
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getTitle(): ?string
    {
        return $this->title;
    }
    
    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getRelType(): ?string
    {
        return $this->rel_type;
    }
    
    public function setRelType(?string $rel_type): self
    {
        $this->rel_type = $rel_type;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getDateEcheance(): ?\DateTimeInterface
    {
        return $this->dateEcheance;
    }

    public function setDateEcheance(\DateTimeInterface $dateEcheance): self
    {
        $this->dateEcheance = $dateEcheance;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getRelId(): ?int
    {
        return $this->rel_id;
    }

    public function setRelId(?int $rel_id): self
    {
        $this->rel_id = $rel_id;

        return $this;
    }

    public function getRappelEmail(): ?bool
    {
        return $this->rappel_email;
    }

    public function setRappelEmail(?bool $rappel_email): self
    {
        $this->rappel_email = $rappel_email;

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

    public function getCategorieNote(): ?ParameterNoteCategorie
    {
        return $this->categorie_note;
    }

    public function setCategorieNote(?ParameterNoteCategorie $categorie_note): self
    {
        $this->categorie_note = $categorie_note;

        return $this;
    }

    public function getPrioriteNote(): ?ParameterNotePriorite
    {
        return $this->priorite_note;
    }

    public function setPrioriteNote(?ParameterNotePriorite $priorite_note): self
    {
        $this->priorite_note = $priorite_note;

        return $this;
    }

    public function getEcheanceNote(): ?ParameterNoteEcheance
    {
        return $this->echeance_note;
    }

    public function setEcheanceNote(?ParameterNoteEcheance $echeance_note): self
    {
        $this->echeance_note = $echeance_note;

        return $this;
    }

    
}
