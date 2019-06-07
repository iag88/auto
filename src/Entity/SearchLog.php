<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SearchLogRepository")
 */
class SearchLog
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=190, nullable=true)
     */
    private $vehicleType;

    /**
     * @ORM\Column(type="string", length=190, nullable=true)
     */
    private $make;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numberOfModels;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $requestTime;

    /**
     * @ORM\Column(type="string", length=190, nullable=true)
     */
    private $ipAddress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $userAgent;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVehicleType(): ?string
    {
        return $this->vehicleType;
    }

    public function setVehicleType(?string $vehicleType): self
    {
        $this->vehicleType = $vehicleType;

        return $this;
    }

    public function getMake(): ?string
    {
        return $this->make;
    }

    public function setMake(?string $make): self
    {
        $this->make = $make;

        return $this;
    }

    public function getNumberOfModels(): ?int
    {
        return $this->numberOfModels;
    }

    public function setNumberOfModels(?int $numberOfModels): self
    {
        $this->numberOfModels = $numberOfModels;

        return $this;
    }

    public function getRequestTime(): ?int
    {
        return $this->requestTime;
    }

    public function setRequestTime(?int $requestTime): self
    {
        $this->requestTime = $requestTime;

        return $this;
    }

    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    public function setIpAddress(?string $ipAddress): self
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    public function getUserAgent(): ?string
    {
        return $this->userAgent;
    }

    public function setUserAgent(?string $userAgent): self
    {
        $this->userAgent = $userAgent;

        return $this;
    }
}
