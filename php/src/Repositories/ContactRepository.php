<?php
declare(strict_types=1);

namespace App\Repositories;


use App\Interfaces\Repositories\ContactsRepositoryInterface;
use App\Models\Contact;
use App\Repositories\Traits\HasDatabaseConnection;

class ContactRepository implements ContactsRepositoryInterface
{
    use HasDatabaseConnection;
    public function findAll(): array
    {

        $stmt = 'SELECT * FROM contacts';
        $contects = $this->executeQurery($stmt);

        return array_map(function ($contect) {
            return new Contact(
                (int) $contect['id'],
                $contect['firstname'],
                $contect['lastname'],
                $contect['title'],
                $contect['email'],
                $contect['skills'],
                $contect['about'],
            );
        }, $contects);
    }

    public function findById(int $id): Contact
    {

        // TODO: Implement findById() method.
        return new Contact( 0,'','','','','','');// $this->executeQurery($stmt);

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