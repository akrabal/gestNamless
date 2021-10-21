<?php
session_start();
require '../vendor/autoload.php';
use App\classe\Administrateur;
use App\classe\Database;

$pdo= Database::connect("localhost","root","","gesnamless");

$router = new AltoRouter();
$router->map('POST','/connexion',function(){require '../views/postConnect.php';},'pconnexion');
$router->map('GET','/connexion',function(){ require '../views/connexion.php';},'connexion' );

if(isset($_SESSION["Admin"])&&!empty($_SESSION["Admin"]))
{
        $router->map( 'GET', '/', function() { require '../views/acceille.php'; }, 'home' );
        $router->map('GET','/ajouterProduit',function(){ require '../views/ajouterProduit.php';},'ajouterProduit');
        $router->map('GET','/ajouterFournisseur',function(){ require '../views/ajouterFournisseur.php';},'ajouterFournisseur');
        $router->map('GET','/ajouterCategories',function(){ require '../views/ajouterCategories.php';},'ajouterCategories');
        $router->map('POST','/postProduit',function(){ require '../views/postProduit.php';},'pProduit');
        $router->map('POST','/postFournisseur',function(){ require '../views/postFournisseur.php';},'pFournisseur');
        $router->map('POST','/postCategories',function(){ require '../views/postCategories.php';},'pCategories');
        $router->map('GET','/deconnexion',function(){ require '../views/deconnect.php';},'deconect');

}

$match = $router->match();

if ($match !== false) {
    
    $match["target"]();
}else {
    echo '404';
}
