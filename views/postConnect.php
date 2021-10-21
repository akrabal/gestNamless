<?php
session_start();
require '../vendor/autoload.php';
use App\classe\Administrateur;
use App\classe\Database;
$pdo = Database::connect("localhost","root","","gesnamless");

if (!empty($_POST["Nom"])&&!empty($_POST["password"])&&is_string($_POST["Nom"])&&is_string($_POST["password"])) {
    $admin = Database::findAdmin($pdo,$_POST["Nom"],$_POST["password"]);
    if ($admin instanceof Administrateur) {
        $_SESSION["Admin"]=[
            "Nom"=> $admin->getNom(),
            "id"=> $admin->getID()
        ];
        header('location:/');
        
    }else{
       header('location:/connexion');
       die();
       
    }
    
}else{
    header('location:/connexion');
    die();
    

}


