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
    private $Data;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $transformOption;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __construct(?string $Data = null, $transformOption = "Capitalize")
    {
        $this->Data = $Data;
        $this->transformOption = $transformOption;
    }

    public function setData($Data): ?string
    {
        return $this->Data = $Data;
    }

    // needed this, constructor not enough as I'm actually changin this
    public function setTransformOption($transformOption)
    {
        return $this->transformOption = $transformOption;
    }

    public function getData(): ?string
    {
        return $this->Data;
    }

    public function getTransformOption()
    {
        return $this->transformOption;
    }
}
