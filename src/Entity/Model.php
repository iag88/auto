<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ModelRepository")
 * @ORM\Table(name="model")
 */
class Model
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(name="`id`", type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="`code`", type="string", length=255, nullable=false)
     */
    private $code;

    /**
     * @ORM\Column(tname="`description`", ype="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @ORM\Column(name="`type`", type="string", length=255, nullable=false)
     */
    private $type;


    /**
     * @ORM\Column(name="`group`", type="string", length=255, nullable=false)
     */
    private $group;

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

    public function getGroup(): ?string
    {
        return $this->group;
    }

    public function setGroup(string $group): self
    {
        $this->group = $group;

        return $this;
    }
}
