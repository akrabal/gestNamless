<?php
namespace App\classe ;

class Database{
    private $servername;
    private $username ;
    private $password ;
    private $dbname ;
    private $db ;

    /**
     * @param string $_servername ex:(localhost)
     * @param string $_username ex:(Root)
     * @param string $_password ex:(password)
     * @param string $_dbname  le nom de la base de donne  
     */
    public function __construct($_servername,$_username,$_password,$_dbname)
    {
        $this->servername= $_servername ;
        $this->username = $_username;
        $this->password = $_password;
        $this->dbname = $_dbname;
        try {

            $_db = new \PDO("mysql:host=$this->servername; dbname=$this->dbname", $this->username, $this->password);
    
            $_db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
           
            $this->db=$_db;
     
        } catch (\PDOException $th) {
    
            die("Error: ".$th->getMessage());
    
        }
    }
    
    public static function connect($_servername,$_username,$_password,$_dbname){
        try {

            $_db = new \PDO("mysql:host=$_servername; dbname=$_dbname", $_username, $_password);
    
            $_db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
           
            return $_db;
     
        } catch (\PDOException $th) {
    
            die("Error: ".$th->getMessage());
    
        }
    
    }

    public function getPdo()
    {
        return $this->db;
    }   

    public static function findAdmin(\PDO $_pdo,$_nom,$_password)
    {  
        if( !empty($_nom) && !empty($_password)  )
        {
            $sql =   'SELECT idAdministrateur, NomAdmin, Password
            FROM administrateur
            WHERE NomAdmin = :Nom ';
            $PdoStatemnent = $_pdo->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
            $PdoStatemnent->execute(array(':Nom' => $_nom));
            $Array = $PdoStatemnent->fetchAll();
            foreach ($Array as $value) { 
              if(password_verify($_password,$value["Password"]))
              {
                  return new Administrateur($value["NomAdmin"],$value["Password"],$value["idAdministrateur"]);
              }else {
                  return false ;
              }
              
            }  
        }else {
            return false ;
        }
    }    
    
   

    

    public static function findAllFournisseur(\PDO $_pdo)
    {
        $sql =   'SELECT *
            FROM Fournisseur';
            $PdoStatemnent = $_pdo->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
            $PdoStatemnent->execute();
            $Array = $PdoStatemnent->fetchAll();
            $fournisseurArray=[];
            foreach ($Array as $value) { 
                $fournisseurArray[]= new Fournisseur($value["NomFournisseur"],$value["NomEtablisement"],$value["NumeroTelephone"],$value["quartierFourniseur"],$value["geolocalisation"],$value["idAdministrateur"],$value["idFournisseur"]);
            }

            return $fournisseurArray ;
    }

    public static function findAllCategorie(\PDO $_pdo)
    {
        
        $sql =   'SELECT *
            FROM Categorie';
            $PdoStatemnent = $_pdo->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
            $PdoStatemnent->execute();
            $Array = $PdoStatemnent->fetchAll();
            $CategorieArray=[];
            foreach ($Array as $value) { 
                $CategorieArray[]= new Categorie($value["NomCategorie"],$value["DescriptionCategorie"],$value["idCategorie"]);
            }

            return $CategorieArray ;
    }

    public static function findAllProduit(\PDO $_pdo)
    {
        $sql =  'SELECT *
            FROM Produit';
            $PdoStatemnent = $_pdo->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
            $PdoStatemnent->execute();
            $Array = $PdoStatemnent->fetchAll();
            $ProduitArray=[];
            foreach ($Array as $value) { 
                $ProduitArray[]= new Produit($value["NomProduit"],$value["PrixVente"],$value["prixAchat"],$value["idFournisseur"],$value["idCategorie"],$value["photo"],$value["idAdministrateur"]);
            }

            return $ProduitArray ;
    }


  


}

  
   

