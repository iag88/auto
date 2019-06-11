<?php

declare(strict_types=1);

namespace App\Handler;

use App\Repository\ModelRepository;

final class ModelListHandler
{
    /**
     * @var ModelRepository
     */
    private $repository;

    /**
     * @param ModelRepository $repository
     */
    public function __construct(ModelRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $type
     * @param string $makeCode
     *
     * @return array
     */
    public function __invoke(int $type, int $makeCode): array
    {
        return $this->repository->findBy(['type' => $type, 'groups' => $makeCode]);
    }
}
