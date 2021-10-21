<?php
require '../vendor/autoload.php';
use App\classe\Administrateur;
use App\classe\Database;

$pdo = Database::connect("localhost","root","","gesnamless");

$admin = new Administrateur("bill","gate");
$admin->SaveAdmin($pdo);