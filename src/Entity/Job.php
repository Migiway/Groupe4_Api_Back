<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JobRepository")
 */
class Job
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
    private $job_libelle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJobLibelle(): ?string
    {
        return $this->job_libelle;
    }

    public function setJobLibelle(string $job_libelle): self
    {
        $this->job_libelle = $job_libelle;

        return $this;
    }
}
