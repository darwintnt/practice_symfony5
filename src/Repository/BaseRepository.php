<?php

declare(strict_types=1);

namespace App\Repository;

use Doctrine\DBAL\Connection;
use Doctrine\Persistence\ObjectRepository;

abstract class BaseRepository
{
    private ManagerRegistry $managerRegistry;

    protected Connection $connection;

    protected ObjectRepository $objectRepository;

    public function __construct(ManagerRegistry $managerRegistry, Connection $connection)
    {
        $this->managerRegistry = $managerRegistry;
        $this->connection = $connection;
        $this->objectRepository = '';
    }

    private function getEntityManager()
    {
        $entityManager = $this->managerRegistry->getManager();

        if($entityManager->isOpen()) {
            return $entityManager;
        }

        return $this->managerRegistry->resetManager();
    }
}
