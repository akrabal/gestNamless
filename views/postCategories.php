<?php
use App\classe\Administrateur;
use App\classe\Categorie;
use App\classe\Database;
require '../vendor/autoload.php';

$pdo = Database::connect("localhost","root","","gesnamless");

if (!empty($_POST["nom"])&&is_string($_POST["nom"])&& is_string($_POST["Desc"])) 
{   
    $admin = new Administrateur($_SESSION["Admin"]["Nom"],"",$_SESSION["Admin"]["id"]);
    $categorie= $admin->setCategorie($_POST["nom"],$_POST["Desc"]);
    $categorie->SaveCategorie($pdo);
    header('location:/');
    die();
}else{

    header('location:/ajouterCategories');
    die();
}


