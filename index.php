<?php
error_reporting(E_ALL);
use Ridvanbaluyos\Noah\Noah as Noah;

require_once __DIR__ . '/vendor/autoload.php';

$noah = new Noah();
$stations = $noah->getStations();
var_dump($stations);