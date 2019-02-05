<?php

namespace App\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\OneToMany(targetEntity="App\AdminBundle\Entity\Company", mappedBy="activityArea")
     */
    private $company_id;

    public function __construct()
    {
        $this->parameter_id = new ArrayCollection();
        $this->company_id = new ArrayCollection();
    }

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
     * @return Collection|Company[]
     */
    public function getCompanyId(): Collection
    {
        return $this->company_id;
    }

    public function addCompanyId(Company $companyId): self
    {
        if (!$this->company_id->contains($companyId)) {
            $this->company_id[] = $companyId;
            $companyId->setActivityArea($this);
        }

        return $this;
    }

    public function removeCompanyId(Company $companyId): self
    {
        if ($this->company_id->contains($companyId)) {
            $this->company_id->removeElement($companyId);
            // set the owning side to null (unless already changed)
            if ($companyId->getActivityArea() === $this) {
                $companyId->setActivityArea(null);
            }
        }

        return $this;
    }
}
