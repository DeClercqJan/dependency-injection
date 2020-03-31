<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MasterRepository")
 */
// is dit dan mijn service locator?
class Master
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
    private $logger;

    private $transform;

    public function __construct(Logger $logger, TransformInterface $transform)
    {
        $this->logger = $logger;
        $this->transform = $transform;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

//    public function getLogger(): ?Logger
//    {
//        return $this->logger;
//    }
//
//    public function getTransform(): ?TransformInterface
//    {
//        return $this->transform;
//    }

    private function log(string $input)
    {
        return $this->logger->log($input);
    }

    public function transform(string $input) : string
    {
        $output = $this->transform->transform($input);
        $this->log($output);
        return $output;
    }
}
