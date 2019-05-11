<?php

namespace App\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\AdminBundle\Repository\ColorsRepository")
 */
class Colors
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Regex(pattern="/^#(?:[0-9a-fA-F]{3}){1,2}$/", message="Veuiller rentrer une couleur au format hexa")
     */
    private $colors_code;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Regex(pattern="/^#(?:[0-9a-fA-F]{3}){1,2}$/", message="Veuiller rentrer une couleur au format hexa")
     */
    private $colors_survol;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Regex(pattern="/^#(?:[0-9a-fA-F]{3}){1,2}$/", message="Veuiller rentrer une couleur au format hexa")
     */
    private $colors_champ_obligatoire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Regex(pattern="/^#(?:[0-9a-fA-F]{3}){1,2}$/", message="Veuiller rentrer une couleur au format hexa")
     */
    private $colors_tag_entreprise;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Regex(pattern="/^#(?:[0-9a-fA-F]{3}){1,2}$/", message="Veuiller rentrer une couleur au format hexa")
     */
    private $colors_tag_contact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Regex(pattern="/^#(?:[0-9a-fA-F]{3}){1,2}$/", message="Veuiller rentrer une couleur au format hexa")
     */
    private $colors_tag_score;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getColorsCode(): ?string
    {
        return $this->colors_code;
    }

    public function setColorsCode(?string $colors_code): self
    {
        $this->colors_code = $colors_code;

        return $this;
    }

    public function getColorsSurvol(): ?string
    {
        return $this->colors_survol;
    }

    public function setColorsSurvol(?string $colors_survol): self
    {
        $this->colors_survol = $colors_survol;

        return $this;
    }
    public function getColorsChampObligatoire(): ?string
    {
        return $this->colors_champ_obligatoire;
    }

    public function setColorsChampObligatoire(?string $colors_champ_obligatoire): self
    {
        $this->colors_champ_obligatoire = $colors_champ_obligatoire;

        return $this;
    }
    public function getColorsTagEntreprise(): ?string
    {
        return $this->colors_tag_entreprise;
    }

    public function setColorsTagEntreprise(?string $colors_tag_entreprise): self
    {
        $this->colors_tag_entreprise = $colors_tag_entreprise;

        return $this;
    }
    public function getColorsTagContact(): ?string
    {
        return $this->colors_tag_contact;
    }

    public function setColorsTagContact(?string $colors_tag_contact): self
    {
        $this->colors_tag_contact = $colors_tag_contact;

        return $this;
    }
    public function getColorsTagScore(): ?string
    {
        return $this->colors_tag_score;
    }

    public function setColorsTagScore(?string $colors_tag_score): self
    {
        $this->colors_tag_score = $colors_tag_score;

        return $this;
    }

}
