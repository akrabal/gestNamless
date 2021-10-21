<?php
require '../vendor/autoload.php';
use App\classe\Administrateur;
use App\classe\Database;


$pdo = Database::connect("localhost","root","","gesnamless");

if (!empty($_POST["nom"])&& is_string($_POST["nom"])&&!empty($_POST["achat"])&&is_string($_POST["achat"])&&!empty($_POST["vente"])&&is_string($_POST["vente"])&&!empty($_POST["fournisseur"])&&!empty($_POST["categorie"])&&is_string($_POST["categorie"])&&isset($_FILES)&&!empty($_FILES)) {

    $admin = new Administrateur($_SESSION["Admin"]["Nom"],"",$_SESSION["Admin"]["id"]);
    $fournisseur = $admin->setFournisseur("","","","","",$_POST["fournisseur"]);
    $categorie =  $admin->setCategorie("","",$_POST["categorie"]);
    $Produit = $admin->setProduit($_POST["nom"],$_POST["vente"],$_POST["achat"],$categorie,$fournisseur,$_FILES);
    $Produit->SaveProduit($pdo);
    header('location:/');
    

}else {
    
    header('location:/ajouterProduit');
    
}


 

