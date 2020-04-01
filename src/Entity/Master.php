<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Psr\Log\LoggerInterface;

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __construct(LoggerInterface $logger, TransformInterface $transform)
    // public function __construct(BasicLogger $logger, TransformInterface $transform)
    {
        $this->logger = $logger;
        $this->transform = $transform;
    }

    private function log(string $message)
    {
        return $this->logger->log("INFO", $message);
    }

    public function transform(string $input): string
    {
        $output = $this->transform->transform($input);
        $this->log($output);
        return $output;
    }
}
