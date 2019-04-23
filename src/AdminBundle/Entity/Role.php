<?php
/**
 * Created by PhpStorm.
 * User: migiw
 * Date: 23/04/2019
 * Time: 09:30
 */

namespace App\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\DateTime;


/**
 * @ORM\Entity(repositoryClass="App\AdminBundle\Repository\RoleRepository")
 */
class Role
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="datetime")
     */
    private $role_createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $role_updateAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="role_id")
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->role_createdAt = new \DateTime;
        $this->role_updateAt = new \DateTime;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }
}