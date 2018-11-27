<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NbSalaryRepository")
 */
class NbSalary
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
    private $salary_libelle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSalaryLibelle(): ?string
    {
        return $this->salary_libelle;
    }

    public function setSalaryLibelle(string $salary_libelle): self
    {
        $this->salary_libelle = $salary_libelle;

        return $this;
    }
}
