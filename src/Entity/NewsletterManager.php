<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NewsletterManagerRepository")
 */
class NewsletterManager
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="object")
     */
    private $mailer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMailer()
    {
        return $this->mailer;
    }

//    public function setMailer($mailer): self
//    {
//        $this->mailer = $mailer;
//
//        return $this;
//    }

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
}
