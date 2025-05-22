<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use Database\Dialects\SQLiteDB;
use Database\Utils;

$database = SQLiteDB::getInstance();
$dbUtils = new Utils();

echo $dbUtils->getSqliteVersion($database);
echo "\n";
echo $dbUtils->checkIfTableExists($database, 'todos');

die();
