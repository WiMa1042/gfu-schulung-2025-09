<?php
declare(strict_types=1);

namespace App\Repositories\Traits;
use PDO;

trait HasDatabaseConnection
{
    private  PDO $pdo;

    public function connection(string $host, int $port, string $username, string $pasword, string $database): self
    {
        $this->pdo = new PDO("mysql:host={$host};port={$port};dbname={$database}", $username, $pasword);

        return $this;
    }

    protected function executeQurery(string $query): array|bool
    {
        return $this->pdo->query($query)->fetchAll();
    }
}