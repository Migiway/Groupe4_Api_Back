<?php

namespace App\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
/**
 * @ORM\Entity(repositoryClass="App\AdminBundle\Repository\ParameterOperationRepository")
 */
class ParameterOperation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, name="btn_interesse")
     * @Assert\NotBlank(message = "Ce champ doit être remplit")
     */
    private $btnInteresse;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBtnInteresse(): ?string
    {
        return $this->btnInteresse;
    }
    
    public function setBtnInteresse(?string $btnInteresse): self
    {
        $this->btnInteresse = $btnInteresse;

        return $this;
    }

}
