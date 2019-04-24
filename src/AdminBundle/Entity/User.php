<?php

namespace App\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\DateTime;


/**
 * @ORM\Entity(repositoryClass="App\AdminBundle\Repository\UserRepository")
 */
class User implements UserInterface
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
    private $user_lastName;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $user_firstName;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $user_password;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $user_email;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="integer")
     */
    private $user_code;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="boolean")
     */
    private $user_gender;

    /**
     * @ORM\Column(type="datetime")
     */
    private $user_createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $user_updateAt;

    /**
     * @ORM\Column(type="boolean", options={"default" : 0})
     */
    private $user_status;

    /**
     * Assert\DateTime
     * @ORM\Column(type="datetime")
     */
    private $user_dob;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_function;

    /**
     * @ORM\Column(type="integer")
     */
    private $user_phone;

    /**
     * @ORM\Column(type="integer")
     */
    private $user_fixe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_imgUrl;

    /**
     * @ORM\OneToMany(targetEntity="App\AdminBundle\Entity\Operation", mappedBy="user_id")
     */
    private $operations;

    /**
     * @ORM\OneToMany(targetEntity="App\AdminBundle\Entity\Parameter", mappedBy="param_user")
     */
    private $parameters;

    /**
     * @ORM\OneToMany(targetEntity="App\AdminBundle\Entity\Company", mappedBy="user_id")
     */
    private $companies;

    /**
     * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\Role", inversedBy="users")
     */
    private $role;

    /**
     * @ORM\OneToMany(targetEntity="App\AdminBundle\Entity\Operation", mappedBy="operation_author")
     */
    private $author;

    public function __construct()
    {
        $this->operations = new ArrayCollection();
        $this->parameters = new ArrayCollection();
        $this->companies = new ArrayCollection();
        $this->author = new ArrayCollection();
        $this->user_createdAt = new \DateTime;
        $this->user_updateAt = new \DateTime;
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserLastName(): ?string
    {
        return $this->user_lastName;
    }

    public function setUserLastName(string $user_lastName): self
    {
        $this->user_lastName = $user_lastName;

        return $this;
    }

    public function getUserFirstName(): ?string
    {
        return $this->user_firstName;
    }

    public function setUserFirstName(string $user_firstName): self
    {
        $this->user_firstName = $user_firstName;

        return $this;
    }

    public function getUserPassword(): ?string
    {
        return $this->user_password;
    }

    public function setUserPassword(string $user_password): self
    {
        $this->user_password = $user_password;

        return $this;
    }

    public function getUserEmail(): ?string
    {
        return $this->user_email;
    }

    public function setUserEmail(string $user_email): self
    {
        $this->user_email = $user_email;

        return $this;
    }

    public function getUserCode(): ?int
    {
        return $this->user_code;
    }

    public function setUserCode(int $user_code): self
    {
        $this->user_code = $user_code;

        return $this;
    }

    public function getUserGender(): ?bool
    {
        return $this->user_gender;
    }

    public function setUserGender(bool $user_gender): self
    {
        $this->user_gender = $user_gender;

        return $this;
    }

    public function getUserCreatedAt(): ?\DateTimeInterface
    {
        return $this->user_createdAt;
    }

    public function setUserCreatedAt(\DateTimeInterface $user_createdAt): self
    {
        $this->user_createdAt = $user_createdAt;

        return $this;
    }

    public function getUserUpdateAt(): ?\DateTimeInterface
    {
        return $this->user_updateAt;
    }

    public function setUserUpdateAt(\DateTimeInterface $user_updateAt): self
    {
        $this->user_updateAt = $user_updateAt;

        return $this;
    }

    public function getUserStatus(): ?bool
    {
        return $this->user_status;
    }

    public function setUserStatus(bool $user_status): self
    {
        $this->user_status = $user_status;

        return $this;
    }

    public function getUserDob(): ?\DateTimeInterface
    {
        return $this->user_dob;
    }

    public function setUserDob(\DateTimeInterface $user_dob): self
    {
        $this->user_dob = $user_dob;

        return $this;
    }

    public function getUserFunction(): ?string
    {
        return $this->user_function;
    }

    public function setUserFunction(string $user_function): self
    {
        $this->user_function = $user_function;

        return $this;
    }

    public function getUserPhone(): ?int
    {
        return $this->user_phone;
    }

    public function setUserPhone(int $user_phone): self
    {
        $this->user_phone = $user_phone;

        return $this;
    }

    public function getUserFixe(): ?int
    {
        return $this->user_fixe;
    }

    public function setUserFixe(int $user_fixe): self
    {
        $this->user_fixe = $user_fixe;

        return $this;
    }

    public function getUserImgUrl(): ?string
    {
        return $this->user_imgUrl;
    }

    public function setUserImgUrl(string $user_imgUrl): self
    {
        $this->user_imgUrl = $user_imgUrl;

        return $this;
    }

    /**
     * @return Collection|Operation[]
     */
    public function getOperations(): Collection
    {
        return $this->operations;
    }

    public function addOperation(Operation $operation): self
    {
        if (!$this->operations->contains($operation)) {
            $this->operations[] = $operation;
            $operation->setUserId($this);
        }
    }
    /**
     * @return Collection|Company[]
     */
    public function getCompanies(): Collection
    {
        return $this->companies;
    }

    public function addCompany(Company $company): self
    {
        if (!$this->companies->contains($company)) {
            $this->companies[] = $company;
            $company->setUserId($this);
        }

        return $this;
    }

    public function removeOperation(Operation $operation): self
    {
        if ($this->operations->contains($operation)) {
            $this->operations->removeElement($operation);
            // set the owning side to null (unless already changed)
            if ($operation->getUserId() === $this) {
                $operation->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Parameter[]
     */
    public function getParameters(): Collection
    {
        return $this->parameters;
    }

    public function addParameter(Parameter $parameter): self
    {
        if (!$this->parameters->contains($parameter)) {
            $this->parameters[] = $parameter;
            $parameter->setParamUser($this);
        }

        return $this;
    }

    public function removeParameter(Parameter $parameter): self
    {
        if ($this->parameters->contains($parameter)) {
            $this->parameters->removeElement($parameter);
            // set the owning side to null (unless already changed)
            if ($parameter->getParamUser() === $this) {
                $parameter->setParamUser(null);
            }
        }
    }
    public function removeCompany(Company $company): self
    {
        if ($this->companies->contains($company)) {
            $this->companies->removeElement($company);
            // set the owning side to null (unless already changed)
            if ($company->getUserId() === $this) {
                $company->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Company[]
     */
    public function getAuthor(): Collection
    {
        return $this->author;
    }

    public function addAuthor(Author $author): self
    {
        if (!$this->author->contains($author)) {
            $this->author[] = $author;
            $author->setUserId($this);
        }

        return $this;
    }

    public function getRole(): ?Role
    {
        //return $this->role;
        if (!is_null($this->role))
        {
            $roles[] = $this->role->getCode();
            // guarantee every user at least has ROLE_USER

        }
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }

    public function setRole(?Role $role): self
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Returns the roles granted to the user.
     *
     *     public function getRoles()
     *     {
     *         return ['ROLE_USER'];
     *     }
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return ['admin'];
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        return $this->user_password;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->getUserEmail();
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        return null;
    }
}
