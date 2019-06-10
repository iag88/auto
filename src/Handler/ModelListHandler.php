<?php

declare(strict_types=1);

namespace App\Handler;

use App\Entity\SearchLog;
use App\Repository\ModelRepository;
use Doctrine\Common\Persistence\ObjectManager;

final class ModelListHandler
{
    /**
     * @var ModelRepository
     */
    private $repository;

    /**
     * @var ObjectManager
     */
    private $manager;

    /**
     * @param ModelRepository $repository
     * @param ObjectManager $manager
     */
    public function __construct(ModelRepository $repository, ObjectManager $manager)
    {
        $this->repository = $repository;
        $this->manager = $manager;
    }

    /**
     * @param string $type
     * @param string $makeCode
     *
     * @return array
     */
    public function __invoke(string $type, string $makeCode): array
    {
        return $this->repository->findBy(['type' => $type, 'group' => $makeCode]);
    }

    /**
     * @param SearchLog $searchLog
     */
    public function saveSearchLog(SearchLog $searchLog)
    {
        $this->manager->persist($searchLog);
        $this->manager->flush();
    }
}
