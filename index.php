<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use Database\Dialects\SQLiteDB;

$database = SQLiteDB::getInstance();

die();
