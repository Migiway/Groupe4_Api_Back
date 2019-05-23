<?php

namespace App\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity
 * @Vich\Uploadable
 */
class EmailTemplate
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message = "Email Subject cannot be null")
     */
    private $emailSubject;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $emailImgUrl;

    /**
     * @return mixed
     */
    public function getEmailImgUrl()
    {
        return $this->emailImgUrl;
    }

    /**
     * @param mixed $emailImgUrl
     * @return EmailTemplate
     */
    public function setEmailImgUrl($emailImgUrl)
    {
        $this->emailImgUrl = $emailImgUrl;
        return $this;
    }

    /**
     * @var File
     *
     * @Vich\UploadableField(mapping="email_img", fileNameProperty="emailImgUrl")
     */
    private $emailImage;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message = "Email Body cannot be null")
     */
    private $emailBody;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $emailBtnText;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message = "Page Title cannot be null")
     */
    private $pageTitle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pageImgUrl;

    /**
     * @var File
     *
     * @Vich\UploadableField(mapping="email_img", fileNameProperty="pageImgUrl")
     */
    private $pageImage;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message = "Intro Title cannot be null")
     */
    private $pageIntroTitle;

    /**
     * @ORM\OneToOne(targetEntity="App\AdminBundle\Entity\Operation")
     * @Assert\NotNull(message = "Operation cannot be null")
     */
    private $operation;

    public function getOperation(): ?Operation
    {
        return $this->operation;
    }

    public function setOperation(?Operation $operation): self
    {
        $this->operation = $operation;
        return $this;
    }

    /**
     * @return File|null
     */
    public function getEmailImage()
    {
        return $this->emailImage;
    }

    /**
     * @param File $emailImage
     * @return EmailTemplate
     */
    public function setEmailImage(File $emailImage = null)
    {
        $this->emailImage = $emailImage;
        return $this;
    }


    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message = "Intro Text cannot be null")
     */
    private $pageIntroText;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pageBtnTxt;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEmailSubject()
    {
        return $this->emailSubject;
    }

    /**
     * @param mixed $emailSubject
     */
    public function setEmailSubject($emailSubject): void
    {
        $this->emailSubject = $emailSubject;
    }

    /**
     * @return mixed
     */
    public function getEmailBody()
    {
        return $this->emailBody;
    }

    /**
     * @param mixed $emailBody
     */
    public function setEmailBody($emailBody): void
    {
        $this->emailBody = $emailBody;
    }

    /**
     * @return mixed
     */
    public function getEmailBtnText()
    {
        return $this->emailBtnText;
    }

    /**
     * @param mixed $emailBtnText
     */
    public function setEmailBtnText($emailBtnText): void
    {
        $this->emailBtnText = $emailBtnText;
    }

    /**
     * @return mixed
     */
    public function getPageTitle()
    {
        return $this->pageTitle;
    }

    /**
     * @param mixed $pageTitle
     */
    public function setPageTitle($pageTitle): void
    {
        $this->pageTitle = $pageTitle;
    }

    /**
     * @return mixed
     */
    public function getPageImgUrl()
    {
        return $this->pageImgUrl;
    }

    /**
     * @param mixed $pageImgUrl
     * @return EmailTemplate
     */
    public function setPageImgUrl($pageImgUrl)
    {
        $this->pageImgUrl = $pageImgUrl;
        return $this;
    }

    /**
     * @return File|null
     */
    public function getPageImage()
    {
        return $this->pageImage;
    }

    /**
     * @param File $pageImage
     * @return EmailTemplate
     */
    public function setPageImage(File $pageImage): EmailTemplate
    {
        $this->pageImage = $pageImage;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPageIntroTitle()
    {
        return $this->pageIntroTitle;
    }

    /**
     * @param mixed $pageIntroTitle
     */
    public function setPageIntroTitle($pageIntroTitle): void
    {
        $this->pageIntroTitle = $pageIntroTitle;
    }

    /**
     * @return mixed
     */
    public function getPageIntroText()
    {
        return $this->pageIntroText;
    }

    /**
     * @param mixed $pageIntroText
     */
    public function setPageIntroText($pageIntroText): void
    {
        $this->pageIntroText = $pageIntroText;
    }

    /**
     * @return mixed
     */
    public function getPageBtnTxt()
    {
        return $this->pageBtnTxt;
    }

    /**
     * @param mixed $pageBtnTxt
     */
    public function setPageBtnTxt($pageBtnTxt): void
    {
        $this->pageBtnTxt = $pageBtnTxt;
    }
}
