<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DataRepository")
 */
class Data
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Data;

    /**
     * @ORM\Column(type="array")
     */
    private $dataTransformOptionsList = [];

//    /**
//     * @ORM\Column(type="string", length=255, nullable=true)
//     */
    public $transformOption;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __construct(?string $Data, array $dataTransformOptionsList, $transformOption)
    {
        $this->Data = $Data;
        $this->dataTransformOptionsList = $dataTransformOptionsList;
        // $this->transformOption = $transformOption;
        $this->transformOption  = "test transformtoption standaard";

    }

    public function getData(): ?string
    {
        return $this->Data;
    }

//    public function setData(?string $Data): self
//    {
//        $this->Data = $Data;
//
//        return $this;
//    }

    public function getDataTransformOptionsList(): ?array
    {
        return $this->dataTransformOptionsList;
    }

//    public function setDataTransformOptionsList(array $dataTransformOptionsList): self
//    {
//        $this->dataTransformOptionsList = $dataTransformOptionsList;
//
//        return $this;
//    }

    public function getTransformOption()
    {
        return $this->transformOption;
    }

}
