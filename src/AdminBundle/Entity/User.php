<?php

namespace App\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;


/**
 * @ORM\Entity(repositoryClass="App\AdminBundle\Repository\UserRepository")
 * @Vich\Uploadable
 */
class User implements UserInterface, \Serializable
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
     * @ORM\Column(type="boolean", nullable=true)
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
     * @ORM\Column(type="datetime", nullable=true)
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $user_lkd;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $user_facebook;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $user_twitter;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $user_annotation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $user_arrival_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $user_quit_date;

    /**
     * @ORM\OneToMany(targetEntity="App\AdminBundle\Entity\Operation", mappedBy="user_id")
     */
    private $operations;

    /**
     * @ORM\OneToMany(targetEntity="App\AdminBundle\Entity\Contact", mappedBy="user_id")
     */
    private $contacts;

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
     * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\ParameterTeamDepartement", inversedBy="users")
     */
    private $departement;

    /**
     * @ORM\OneToMany(targetEntity="App\AdminBundle\Entity\User", mappedBy="responsable")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity="App\AdminBundle\Entity\User", inversedBy="users")
     */
    private $responsable;

    /**
     * @ORM\OneToMany(targetEntity="App\AdminBundle\Entity\Operation", mappedBy="operation_author")
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $resetPasswordToken;

    protected $plainPassword;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imgUrl;

    /**
     * @var File
     *
     * @Vich\UploadableField(mapping="user_img", fileNameProperty="imgUrl")
     */
    protected $userFile;

    public function getImgUrl()
    {
        return $this->imgUrl;
    }

    public function setImgUrl($imgUrl)
    {
        $this->imgUrl = $imgUrl;

        return $this;
    }


    public function __construct()
    {
        $this->operations = new ArrayCollection();
        $this->parameters = new ArrayCollection();
        $this->companies = new ArrayCollection();
        $this->contacts = new ArrayCollection();
        $this->users = new ArrayCollection();
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

    public function __toString()
    {
        return $this->user_firstName . ' ' . $this->user_lastName;
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

    public function getUserLkd(): ?string
    {
        return $this->user_lkd;
    }

    public function setUserLkd(string $user_lkd)
    {
        return $this->user_lkd = $user_lkd;
    }

    public function getUserFacebook(): ?string
    {
        return $this->user_facebook;
    }

    public function setUserFacebook(string $user_facebook)
    {
        return $this->user_facebook = $user_facebook;
    }

    public function getUserTwitter(): ?string
    {
        return $this->user_twitter;
    }

    public function setUserTwitter(string $user_twitter)
    {
        return $this->user_twitter = $user_twitter;
    }

    public function getUserAnnotation(): ?string
    {
        return $this->user_annotation;
    }

    public function setUserAnnotation(string $user_annotation)
    {
        return $this->user_annotation = $user_annotation;
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

        return $this;
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
        if (is_null($this->companies))
        {
            $this->companies[] = $company;
            $company->setUserId($this);
        }
        else
        {
            if (!$this->companies->contains($company)) {
                $this->companies[] = $company;
                $company->setUserId($this);
            }
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

    // public function addAuthor(Author $author): self
    // {
    //     if (!$this->authors->contains($author)) {
    //         $this->authors[] = $author;
    //         $author->setUserId($this);
    //     }

    //     return $this;
    // }

    /*public function getRole(): ?Role
    {
        //return $this->role;
        if (!is_null($this->role)) {
            $roles[] = $this->role->getCode();
            // guarantee every user at least has ROLE_USER

        }
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }*/

    public function getRole()
    {
        return $this->role;
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
        return ['ROLE_USER'];
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

    public function getResetPasswordToken(): ?string
    {
        return $this->resetPasswordToken;
    }

    public function setResetPasswordToken(?string $resetPasswordToken): self
    {
        $this->resetPasswordToken = $resetPasswordToken;

        return $this;
    }

    public function removeAuthor(Operation $author): self
    {
        if ($this->author->contains($author)) {
            $this->author->removeElement($author);
            // set the owning side to null (unless already changed)
            if ($author->getOperationAuthor() === $this) {
                $author->setOperationAuthor(null);
            }
        }

        return $this;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(?string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;
        if (strlen(trim($plainPassword)) > 0) {
            $encodedPassword = $this->encodePassword($plainPassword, $this->getSalt());
            $this->setUserPassword($encodedPassword);
        }

        return $this;
    }

    public function encodePassword(?string $plainPassword, ?string $salt): ?string
    {
        if (strlen($salt) < 1) {
            $salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
        }

        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        $password = $encoder->encodePassword(
            $plainPassword,
            $this->getSalt()
        );

        $this->eraseCredentials();

        return $password;
    }

    public function getUserArrivalDate()
    {
        return $this->user_arrival_date;
    }

    public function setUserArrivalDate($user_arrival_date)
    {
        return $this->user_arrival_date = $user_arrival_date;
    }

    public function getUserQuitDate()
    {
        return $this->user_quit_date;
    }

    public function setUserQuitDate($user_quit_date)
    {
        return $this->user_quit_date = $user_quit_date;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return User
     */
    public function setUserFile(File $file = null)
    {
        $this->userFile = $file;
        if ($file) {
            $this->user_updateAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getUserFile()
    {
        return $this->userFile;
    }

    public function serialize()
    {
        return serialize(array(
            $this->user_password,
            $this->user_email,
            $this->id
        ));
    }

    public function unserialize($serialized)
    {
        list(
            $this->user_password,
            $this->user_email,
            $this->id
            ) = unserialize($serialized, ['allowed_classes' => false]);
    }

    public function getDepartement()
    {
        return $this->departement;
    }

    public function setDepartement(ParameterTeamDepartement $departement)
    {
        return $this->departement = $departement;
    }

    public function getResponsable()
    {
        return $this->responsable;
    }

    public function setResponsable(User $user)
    {
        return $this->responsable = $user;
    }

    public function getUsers()
    {
        return $this->users;
    }

    public function addUser(User $user)
    {
        if (!$this->users->contains($user))
        {
            $this->users[] = $user;
            $user->setResponsable($this);
        }

        return $this;
    }

    public function getContacts()
    {
        return $this->contacts;
    }

    public function addContact(Contact $contact): self
    {
        if (is_null($this->contacts))
        {
            $this->contacts[] = $contact;
            $contact->setCommercial($this);
        }
        else
        {
            if (!$this->contacts->contains($contact))
            $this->contacts[] = $contact;
            $contact->setCommercial($this);
        }
        /*$this->contacts->add($contact);
        $contact->setCommercial($this);*/

        return $this;
    }
}
