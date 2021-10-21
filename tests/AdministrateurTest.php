<?php

use App\classe\Administrateur;
use App\classe\Categorie;
use App\classe\Database;
use App\classe\Fournisseur;
use App\classe\Produit;
use PHPUnit\Framework\TestCase;

class AdministrateurTest extends TestCase {
   private $adminNoName;
   private $db ;
   private $adminWithName;

   /**
    * @before 
    */
   public function instance()
   {
      $this->adminNoName = new Administrateur();
      $this->adminWithName= new Administrateur("bill","gate");
      $this->db =  Database::connect("localhost","root","","gesnamless");
      
   }
   
   
   public function testverifyType(){
      $this->assertInstanceOf(Administrateur::class,$this->adminNoName);
      $this->assertInstanceOf(Administrateur::class, $this->adminWithName);
   }

   public function testAddAdministrateurIsRun(){
        $state = $this->adminWithName->saveAdmin($this->db);
        $this->assertTrue($state);    
   }
   public function testifNameAndPasswordIsSet()
   {
      $state = $this->adminNoName->saveAdmin($this->db); 
      $this->assertFalse($state); 
   }   
   
  
   public function testAddFournisseur(){
       $admin = new Administrateur("bill","gate"); 
       $fornisseur= $admin->setFournisseur("moise","bbservice","90447856","tokoin","4566648096761E");
       $this->assertInstanceOf(Fournisseur::class,$fornisseur);  
   } 

   public function testgodwin(){
      $admin = new Administrateur("godwin","bien"); 
      $fornisseur= $admin->setFournisseur("moise","bbservice","90447856","tokoin","4566648096761E");
      $this->assertInstanceOf(Fournisseur::class,$fornisseur);  
  } 

   public function testAddCategorie()
   {
      $admin = new Administrateur("bill","gate");
      $categorie = $admin->setCategorie("telephone","les iphone ,et tout et tout");
      $this->assertInstanceOf(Categorie::class,$categorie);  

   }

   
   public function testAddProduit(){
    $admin = new Administrateur("bill","gate");
    $categorie = $admin->setCategorie("telephone","les iphone ,et tout et tout");
    $fournisseur= $admin->setFournisseur("moise","bbservice","90447856","tokoin","4566648096761E");
    $photo ="/photo/cool.jpg";
    $produit =  $admin->setProduit("Iphone6",55000,52000,$categorie,$fournisseur,$photo);
    $this->assertInstanceOf(Produit::class,$produit);
   }





}


