<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActivityAreaRepository")
 */
class ActivityArea
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
    private $activity_area;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActivityArea(): ?string
    {
        return $this->activity_area;
    }

    public function setActivityArea(string $activity_area): self
    {
        $this->activity_area = $activity_area;

        return $this;
    }
}
