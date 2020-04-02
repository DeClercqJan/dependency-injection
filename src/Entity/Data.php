<?php

declare(strict_types=1);

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
    private string $Data;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $transformOption;

    public function getId(): ?int
    {
        return $this->id;
    }

// set default options to empty strings as to avoid nulls
    public function __construct(?string $Data = "", ?string $transformOption = "")
    {
        $this->Data = $Data;
        $this->transformOption = $transformOption;
    }

    // need this to render form
     function setData(string $Data): ?string
    {
        return $this->Data = $Data;
    }

    // need this to render form
    public function getData(): ?string
    {
        return $this->Data;
    }

    // need this to render form
    public function setTransformOption(?string $transformOption) : ?string
    {
        return $this->transformOption = $transformOption;
    }

    // need this to render form
    public function getTransformOption() : ?string
    {
        return $this->transformOption;
    }
}
