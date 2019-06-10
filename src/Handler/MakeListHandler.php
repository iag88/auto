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
     * @param string $type
     *
     * @return array
     */
    public function __invoke(string $type): array
    {
        return $this->repository->findBy(['type' => $type]);
    }
}
