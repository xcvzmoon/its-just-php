<?php

declare(strict_types=1);

namespace Database;

use PDO;

class Utils
{
    public function getSqliteVersion(PDO $db): string
    {
        $query = "SELECT sqlite_version()";

        $statement = $db->prepare($query);

        $statement->execute();

        $result = $statement->fetchColumn();

        return "SQLite version: $result";
    }

    public function checkIfTableExists(PDO $db, string $tableName): string
    {
        $query = "SELECT name FROM sqlite_master WHERE type='table' AND name = :tableName";

        $statement = $db->prepare($query);

        $statement->bindParam(':tableName', $tableName, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result
            ? "Table '$tableName' exists in the database."
            : "Table '$tableName' does NOT exist in the database.";
    }
}
