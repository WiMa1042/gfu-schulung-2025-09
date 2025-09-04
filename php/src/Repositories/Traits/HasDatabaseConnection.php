<?php
declare(strict_types=1);

namespace App\Repositories\Traits;
trait HasDatabaseConnection
{
    private \mysqli $connection;

    public function connection(string $host, int $port, string $username, string $pasword, string $database): self
    {
        $this->connection = new \mysqli($host, $username, $pasword, $database, $port);
        return $this;
    }

    protected function executeQurery(string $query): array|bool
    {
        $result = $this->connection->query($query);
        if (is_bool($result)) {
            return $result;
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}