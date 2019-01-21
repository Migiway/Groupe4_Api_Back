<?php

namespace App\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParticipateRepository")
 */
class Participate
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Operation", inversedBy="participates")
     */
    private $operation_participate;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contact", inversedBy="participates")
     */
    private $participate_contact;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOperationParticipate(): ?Operation
    {
        return $this->operation_participate;
    }

    public function setOperationParticipate(?Operation $operation_participate): self
    {
        $this->operation_participate = $operation_participate;

        return $this;
    }

    public function getParticipateContact(): ?Contact
    {
        return $this->participate_contact;
    }

    public function setParticipateContact(?Contact $participate_contact): self
    {
        $this->participate_contact = $participate_contact;

        return $this;
    }
}
