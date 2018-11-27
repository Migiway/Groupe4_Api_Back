<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
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
    private $user_lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_email;

    /**
     * @ORM\Column(type="integer")
     */
    private $user_code;

    /**
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
     * @ORM\Column(type="boolean")
     */
    private $user_status;

    /**
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
}
