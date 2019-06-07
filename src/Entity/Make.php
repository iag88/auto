<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MakeRepository")
 * @ORM\Table(name="make", indexes={
 *     @ORM\Index(name="idx_make_code", columns={"code"}),
 *     @ORM\Index(name="idx_make_type", columns={"type"}),
 * })
 */
class Make
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

    /**
     * @ORM\Column(name="`type`", type="string", length=190, nullable=false)
     * @ORM\ManyToOne(targetEntity="VehicleType", inversedBy="code")
     */
    private $type;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
