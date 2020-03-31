<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CapitalizeRepository")
 */
class Capitalize implements TransformInterface
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

    // geen typehint voor $string nodig? wordt in ieder geval neit automatisch gecorrigeerd, ook al staat het in de itnerface die werd geimplementeerd
    public function transform(string $input) : string
    {
        $output = strtoupper($input);
        return $output;
    }
}
