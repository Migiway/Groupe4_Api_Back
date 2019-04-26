<?php

namespace App\AdminBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * ForgotPassword
 */
class ForgotPassword
{
    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    protected $tmpEmail;

    /**
     * Set tmpEmail
     *
     * @param string $tmpEmail
     *
     * @return User
     */
    public function setTmpEmail($tmpEmail)
    {
        $this->tmpEmail = $tmpEmail;

        return $this;
    }

    /**
     * Get tmpEmail
     *
     * @return string
     */
    public function getTmpEmail()
    {
        return $this->tmpEmail;
    }
}
