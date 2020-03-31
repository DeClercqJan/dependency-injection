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

    private $dataTransformOptionsList;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getData(): ?string
    {
        return $this->Data;
    }

    public function setData(?string $Data): self
    {
        $this->Data = $Data;

        return $this;
    }

    public function getDataTransformOptionsList()
    {
        // for some reason, this returns integers, even when I try to hardcode it
        return ["just because this creates the dropdown but it will come with an integer"];
        return $this->dataTransformOptionsList;
    }

    public function setDataTransformOptionsList($transformOption)
    {
        // dump($transformOption);
        //$this->dataTransformOptionsList = array_push($previousDataTransformOptionsList, $transformOption);

//        $previousDataTransformOptionsList = $this->getDataTransformOptionsList();
//        dump($previousDataTransformOptionsList);
//        // for some reason, getter returns 0 if I want to hardcode proeprty op list to array ...
//        if (null === $previousDataTransformOptionsList)
//        {
//            $previousDataTransformOptionsList = array($transformOption);
//            }
//        dump($previousDataTransformOptionsList);
//        $this->dataTransformOptionsList = array_push($previousDataTransformOptionsList, $transformOption);
    }


}
