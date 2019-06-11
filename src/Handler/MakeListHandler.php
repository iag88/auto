<?php

declare(strict_types=1);

namespace App\Handler;

use App\Repository\MakeRepository;

final class MakeListHandler
{
    /**
     * @var MakeRepository
     */
    private $repository;

    /**
     * @param MakeRepository $repository
     */
    public function __construct(MakeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $type
     *
     * @return array
     */
    public function __invoke(int $type): array
    {
        return $this->repository->findBy(['type' => $type]);
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return $this->repository->findAll();
    }
}
