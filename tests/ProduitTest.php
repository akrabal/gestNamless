<?php

use App\classe\Administrateur;
use App\classe\Database;
use App\classe\Produit;
use PHPUnit\Framework\TestCase;

class ProduitTest extends TestCase
{  

    private $db;
     /**
      * @before
      */
    public function instance()
    {
        $this->db= Database::connect("localhost","root","","gesnamless");
    }
    public function testifSaveProduitIsRun()
    {   $admin = new Administrateur("bill","gate");
        $categorie = $admin->setCategorie("telephone","les iphone ,et tout et tout");
        $fournisseur= $admin->setFournisseur("moise","bbservice","90447856","tokoin","4566648096761E");
        $photo ="/photo/cool.jpg";
        $Produit = new Produit("Iphone6",55000,52000,$categorie,$fournisseur,$photo,$admin);
        $state = $Produit->SaveProduit($this->db);
        $this->assertTrue($state);
    }
}