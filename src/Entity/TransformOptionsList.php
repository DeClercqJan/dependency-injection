<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="TransformOptionsListRepository")
 */
class TransformOptionsList
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array")
     */
    private $transformOptionsList = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTransformOptionsList()
    {
        return $this->transformOptionsList;
    }

//    public function setTransformOptions($TransformOptions): self
//    {
//        $this->TransformOptions = $TransformOptions;
//
//        return $this;
//    }

public function __construct($transformOption)
{
    $previousTransformOptionsList = $this->getTransformOptionsList();
    $this->transformOptionsList = array_push($previousTransformOptionsList, $transformOption);
}
}
