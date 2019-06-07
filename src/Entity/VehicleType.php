<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VehicleTypeRepository")
 * @ORM\Table(name="vehicle_type", indexes={
 *     @ORM\Index(name="idx_code", columns={"code"}),
 * })
 */
class VehicleType
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(name="`id`", type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="`code`", type="string", unique=true, length=190, nullable=false)
     */
    private $code;

    /**
     * @ORM\Column(name="`description`", type="string", length=255, nullable=false)
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getDescripton(): ?string
    {
        return $this->description;
    }

    public function setDescripton(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
