<?php
declare(strict_types=1);

namespace App\Repositories;


use App\Interfaces\Repositories\ContactsRepositoryInterface;
use App\Repositories\Traits\HasDatabaseConnection;

class ContactRepository implements ContactsRepositoryInterface
{
    use HasDatabaseConnection;
    public function findAll(): array
    {

        $stmt = 'SELECT * FROM contacts';

        return $this->executeQurery($stmt);
    }

    public function findById(int $id): array
    {
        // TODO: Implement findById() method.
        return [];
    }

    public function create(array $data): int
    {
        // TODO: Implement create() method.
        return 0;
    }

    public function update(int $id, array $data): bool
    {
        // TODO: Implement update() method.
        return false;
    }

    public function delete(int $id): bool
    {
        // TODO: Implement delete() method.
        return false;
    }
}