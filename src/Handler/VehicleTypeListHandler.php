<?php

declare(strict_types=1);

namespace App\Handler;

use App\Repository\VehicleTypeRepository;

final class VehicleTypeListHandler
{
    /**
     * @var VehicleTypeRepository
     */
    private $repository;

    /**
     * @param VehicleTypeRepository $repository
     */
    public function __construct(VehicleTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(): array
    {
        return $this->repository->findBy([], ['description' => 'ASC']);
    }
}
