<?php

namespace App\Service;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="MailerTestRepository")
 */
class MailerTest
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
    private $transport;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTransport()
    {
        return $this->transport;
    }

    public function __construct()
    {
        $this->transport = 'sendmail';
    }

//    public function setTransport($transport): self
//    {
//        $this->transport = $transport;
//
//        return $this;
//    }
}
