<?php
declare(strict_types=1);

namespace App\Repositories;


use App\Interfaces\Repositories\ContactsRepositoryInterface;
use App\Models\Contact;
use App\Repositories\Traits\HasDatabaseConnection;
use PDO;

class ContactRepository implements ContactsRepositoryInterface
{
    use HasDatabaseConnection;
    public function findAll(): array
    {

        $stmt = 'SELECT * FROM contacts';
        $contects = $this->executeQurery($stmt);

        return array_map([$this,'mapToContact'], $contects);
    }

    public function findById(int $id): Contact
    {
        $stmt = 'SELECT * FROM contacts WHERE id = :id';
        $query = $this->pdo->prepare($stmt);
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        $query->execute();

        $contact = $query->fetch(PDO::FETCH_ASSOC);

        return $this->mapToContact($contact);

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

    private function mapToContact(array $data): Contact
    {
        return new Contact(
            (int) $data['id'],
            $data['firstname'],
            $data['lastname'],
            $data['title'],
            $data['email'],
            $data['skills'],
            $data['about'],
        );
    }
}