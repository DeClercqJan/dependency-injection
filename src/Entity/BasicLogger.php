<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LoggerRepository")
 */
class BasicLogger extends Logger
{
//    /**
//     * @ORM\Id()
//     * @ORM\GeneratedValue()
//     * @ORM\Column(type="integer")
//     */
//    private $id;
//
//    public function getId(): ?int
//    {
//        return $this->id;
//    }

//    /**
//     * @param mixed $level
//     * @param string $message
//     * @param array $context
//     */
    public function log($level, $message, array $context = []): void
        //public function log($level, $message, array $context = array())
    {
        // just copied the signature of parent class and did my own thing
        $input = "Level: $level ; Message: $message";
        file_put_contents('basicLog.info', $input . "\n\r", FILE_APPEND);
    }

}
