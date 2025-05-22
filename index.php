<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use Database\Dialects\SQLiteDB;
use Database\Utils;
use Models\Flight;

echo "\n";

$database = SQLiteDB::getInstance();
$dbUtils = new Utils();

echo "{$dbUtils->getSqliteVersion($database)} \n";
echo "{$dbUtils->checkIfTableExists($database, 'flights')} \n";
echo "\n";

try {
    echo "TESTING: \n";

    $flight = new Flight(
        "AA123",
        "LAX",
        "JFK",
        "2025-06-01 08:00:00",
        "2025-06-01 16:30:00",
        "American Airlines"
    );

    echo "Initial flight: $flight \n";

    $flight->setDepartureTime("2025-06-01 09:00:00");

    echo "Updated flight: $flight \n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

die("\n");
