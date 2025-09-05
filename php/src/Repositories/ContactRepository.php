<?php
declare(strict_types=1);

namespace App\Repositories;


use App\DTOs\ConteactDTO;
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

    public function create(ConteactDTO $data): int|false
    {
        $stmt = 'INSERT INTO contacts (firstname, lastname, title, email, skills, about) '.
                'VALUES (:firstname, :lastname, :title, :email, :skills, :about)';

        $query = $this->pdo->prepare($stmt);
        $this->bindValues($query, $data);
        if (! $query->execute()){
            return false;
        }
        ;
        return (int) $this->pdo->lastInsertId();
    }

    public function update(int $id, ConteactDTO $data): bool
    {
        $stmt = 'UPDATE contacts '.
                'SET firstname = :firstname, '.
                    'lastname = :lastname, '.
                    'title = :title, '.
                    'email = :email, '.
                    'skills = :skills, '.
                    'about = :about '.
                'WHERE id = :id';
        $query = $this->pdo->prepare($stmt);
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $this->bindValues($query, $data);

        return $query->execute();
    }

    public function delete(int $id): bool
    {
        $stmt = 'DELETE FROM contacts WHERE id = :id';
        $query = $this->pdo->prepare($stmt);
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        return $query->execute();
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

    public function bindValues(false|\PDOStatement $query, ConteactDTO $data): self
    {
        $query->bindValue(':firstname', $data->getFirstname());
        $query->bindValue(':lastname', $data->getLastname());
        $query->bindValue(':title', $data->getTitle());
        $query->bindValue(':email', $data->getEmail());
        $query->bindValue(':skills', $data->getSkills());
        $query->bindValue(':about', $data->getAbout());

        return $this;
    }
}