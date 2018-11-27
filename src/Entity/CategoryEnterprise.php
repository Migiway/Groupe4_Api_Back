<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryEnterpriseRepository")
 */
class CategoryEnterprise
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
    private $category_label;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategoryLabel(): ?string
    {
        return $this->category_label;
    }

    public function setCategoryLabel(string $category_label): self
    {
        $this->category_label = $category_label;

        return $this;
    }
}
