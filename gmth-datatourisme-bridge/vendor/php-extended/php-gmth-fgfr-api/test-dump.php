<?php

/**
 * This script is to test the dump endpoint.
 * 
 * Usage :
 * php test-dump.php /file/to/dump/db.json
 */
ini_set('memory_limit', '256M');

use PhpExtended\Gmth\GmthApiDumpEndpoint;

global $argv;

if(!isset($argv[1]))
	throw new InvalidArgumentException('The first argument should be the path where the database dump is.');
$filePath = $argv[1];

$composer = __DIR__.'/vendor/autoload.php';
if(!is_file($composer))
	throw new RuntimeException('You should run composer first.');
require $composer;

$endpoint = new GmthApiDumpEndpoint();

$result = $endpoint->getFromFile($filePath);

var_dump($result);
