<?php

use App\classe\Administrateur;
use App\classe\Database;
use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase{
    
    private $db;
    /**
     * @before
     */
    public function Instance()
    {
      $this->db = new Database ("localhost","root","","gesnamless");
    }
    

    public function testIfDatabaseIsCool()
    {      
       $this->assertInstanceOf(PDO::class, $this->db->getPdo());
    } 

   
      // l'admin Bill gate dois etre dans la base de donnees d'abord 

     public function testverifyIsTheGoodArray()
   { 
      $Array=[];

      $sql =   'SELECT idAdministrateur, NomAdmin, Password
               FROM administrateur
               WHERE NomAdmin = :Nom ';
      $PdoStatemnent = $this->db->getPdo()->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
      $PdoStatemnent->execute(array(':Nom' => "bill"));
      $Array = $PdoStatemnent->fetchAll();
      foreach ($Array as $value) { 
         $this->assertIsArray($value);
         $this->assertArrayHasKey("idAdministrateur", $value);
         $this->assertArrayHasKey("NomAdmin", $value);
         $this->assertArrayHasKey("Password", $value); 
      }
   }

   // l'admin Bill gate dois etre dans la base de donnees d'abord 
   public function testifReturnIsAdmin()
   { 
         $admin=Database::findAdmin($this->db->getPdo(),"bill","gate");
         $this->assertInstanceOf(Administrateur::class,$admin);
   }

   // l'admin Bill gate dois etre dans la base de donnees d'abord 
   public function testverifyIfPasswordIsFalse()
   {
      $state=Database::findAdmin($this->db->getPdo(),"bill","cool");
      $this->assertFalse($state);
   }
   // l'admin Bill gate dois etre dans la base de donnees d'abord 
   public function testverifyIfPasswordIsNotSet()
   {
      $state=Database::findAdmin($this->db->getPdo(),"","cool");
      $this->assertFalse($state);
   }


}