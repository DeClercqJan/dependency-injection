<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SpacesToDashesRepository")
 */
class SpacesToDashes implements TransformInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */

    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function transform(string $input) : string
    {
        $output = str_replace(' ', '-', $input);
        return $output;
    }
}
