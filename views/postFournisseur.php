<?php
require '../vendor/autoload.php';

use App\classe\Administrateur;
use App\classe\Database;
use App\classe\Fournisseur;

$pdo = Database::connect("localhost","root","","gesnamless");

if (!empty($_POST["nom"])&&is_string($_POST["nom"])&&!empty($_POST["numtel"])&& is_string($_POST["numtel"])) 
{  
    $admin = new Administrateur($_SESSION["Admin"]["Nom"],"",$_SESSION["Admin"]["id"]);
    $fournisseur = $admin->setFournisseur($_POST["nom"],$_POST["nomEtab"],$_POST["numtel"],"",$_POST["localisation"]);
    $fournisseur->SaveFourniseur($pdo);
    header('location:/');
    die();
}else{

    header('location:/ajouterFournisseur');
    die();
}