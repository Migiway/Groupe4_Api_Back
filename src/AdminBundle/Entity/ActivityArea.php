<?php

namespace App\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\AdminBundle\Entity\User;

/**
 * @ORM\Entity(repositoryClass="App\AdminBundle\Repository\ActivityAreaRepository")
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
     * @Assert\NotBlank
     */
    private $activity_area;

    /**
     * @ORM\OneToMany(targetEntity="App\AdminBundle\Entity\Parameter", mappedBy="activityArea")
     * @Assert\NotBlank
     */
    private $parameter_id;

    /**
     * @ORM\OneToMany(targetEntity="App\AdminBundle\Entity\User", mappedBy="area")
     */
    private $users;

    public function __construct()
    {
        $this->parameter_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActivityArea(): ?string
    {
        return $this->activity_area;
    }
    public function __toString()
    {
        return $this->activity_area;
    }
    public function setActivityArea(string $activity_area): self
    {
        $this->activity_area = $activity_area;

        return $this;
    }

    /**
     * @return Collection|Parameter[]
     */

    public function getParameterId(): Collection
    {
        return $this->parameter_id;
    }

    public function addParameterId(Parameter $parameterId): self
    {
        if (!$this->parameter_id->contains($parameterId)) {
            $this->parameter_id[] = $parameterId;
            $parameterId->setActivityArea($this);
        }

        return $this;
    }

    public function removeParameterId(Parameter $parameterId): self
    {
        if ($this->parameter_id->contains($parameterId)) {
            $this->parameter_id->removeElement($parameterId);
            // set the owning side to null (unless already changed)
            if ($parameterId->getActivityArea() === $this) {
                $parameterId->setActivityArea(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setArea($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getArea() === $this) {
                $user->setArea(null);
            }
        }

        return $this;
    }
}
