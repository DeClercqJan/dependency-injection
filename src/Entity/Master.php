<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MasterRepository")
 */
class Master
{
//    /**
//     * @ORM\Id()
//     * @ORM\GeneratedValue()
//     * @ORM\Column(type="integer")
//     */
//    private $id;

//    /**
//     * @ORM\Column(type="string", length=255)
//     */

    // need to add typehint after I know how is null check reacts
    private $logger;
    // private LoggerInterface $logger;

    // need to add typehint after I know how is null check reacts
    private $transform;
    // private TransformInterface $transform;

//    public function getId(): ?int
//    {
//        return $this->id;
//    }

    public function __construct($dummy)

    {
        dump("construct functie van Master fires na dummy argument binnne gekregen te hebben");
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

    public function getBasicLogger(): BasicLogger
    {
        if (null === $this->logger) {
            dump("null test fired in getBasicLogger");
            $this->logger = new BasicLogger('basicLogger');
        }
        return $this->logger;
    }

    public function getMonologLogger(): Logger
    {
        if (null === $this->logger) {
            dump("null test fired in getMonologLogger");
            $this->logger = new Logger('monologLogger');
            $this->logger->pushHandler(new StreamHandler('monologLog.info', Logger::INFO));
        }
        return $this->logger;
    }


    public function getTransFormSpacesToDashes(): TransformInterface
    {
        if (null === $this->transform) {
            dump('null test fired in getTransformSpacesToDashes');
            $this->transform = new SpacesToDashes();
        }
        return $this->transform;
    }

    public function getTransFormCapitalize(): TransformInterface
    {
        if (null === $this->transform) {
            dump('null test fired in getTransFormCapitalize');
            $this->transform = new Capitalize();
        }
        return $this->transform;
    }
}
