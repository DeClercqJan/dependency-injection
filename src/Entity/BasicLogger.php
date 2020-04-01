<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LoggerRepository")
 */
// note: at
class BasicLogger extends Logger
{
    // do I need this
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
        // stole this from Monologger. You kind of have to. Even though my and this monolog logger implement the same interface, in order to be able to switch between them, I need to follow it's instructions.
        // edit: then I started thinking: why not extend it and keep the interface typehint? This way I don't have to declare methods I won't use.
        // or should I use the parent class Monolog as typehint? it's a chocie between strictness and flexility. Here, flexibiltiy is advisable as other loggers may come to my shores
        // + NEED TO CHECK: can I create methods that are counter to Monolog's parent method? If not, it's an extra security, no? I'm getting an error for my original method so I'm guessing more secure and I need to follow the ways of the parent

        // return "to do: make logger. input was alvast: $input";
        $input = "Level: $level ; Message: $message";
        file_put_contents('basicLog.info', $input . "\n\r", FILE_APPEND);
    }

}
