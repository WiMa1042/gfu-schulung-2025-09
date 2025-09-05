<?php
declare(strict_types=1);

namespace App\Interfaces\Repositories;
use App\DTOs\ConteactDTO;
use App\Models\Contact;

interface ContactsRepositoryInterface
{
        public function findAll(): array;
    public function findById(int $id): Contact;
    public function create(ConteactDTO $data): int|false;
    public function update(int $id, ConteactDTO $data): bool;
    public function delete(int $id): bool;
}