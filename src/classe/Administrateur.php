<?php
namespace App\classe;

use PDO;

class Administrateur {
     
    /**
     * idAdministrateur
     *
     * @var int
     */
    private $idAdministrateur;

     /**
      * Nom le nom de l'admin
      *
      * @var string
      */
     private $Nom ;     
     /**
      * Password  sont mot de passe
      *
      * @var string
      */
     private $Password ;

     
     /**
      * db
      *
      * @var Pdo
      */
     private $db;
    
    /**
     * __construct
     *
     * @param  string $_Nom
     * @param  string $_password
     * @return void
     */
    public function __construct($_Nom=null,$_password=null,$_id=null)
    {
        $this->Nom=$_Nom;
        $this->Password = $_password;
        $this->idAdministrateur = $_id;
    } 
   

    public function SaveAdmin (\PDO $pdo)
    {   
         $state = false;
         if( !empty($this->Nom)&& !is_null($this->Nom) && !empty($this->Password)&& !is_null($this->Password) ){
                $sql = ' INSERT INTO administrateur (NomAdmin,Password) Values(:Nom,:Password) ';
                $PdoStatemnent = $pdo->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
                $PdoStatemnent->execute(array(':Nom' => "bill ",':Password'=> password_hash("gate",PASSWORD_BCRYPT)));
                $state = true;
                //quand on enregistre on recupere l'id
                $this->idAdministrateur=$pdo->lastInsertId();
           }
    
        return $state;
    
    }

    public function setFournisseur($_NomFouniseur,$_NomEtablisement,$_NumeroTel,$_quartier,$_localisation,$_idFournisseur=null)
    {
        return new Fournisseur($_NomFouniseur,$_NomEtablisement,$_NumeroTel,$_quartier,$_localisation,$this,$_idFournisseur);
    }
    

    public function setCategorie($_Nom,$_Descr,$id_categorie=null)
    {
        return new Categorie($_Nom,$_Descr,$id_categorie);
    }

    public function getNom()
    {
        return $this->Nom;
    }

    public function setProduit($_NomProduit,$_prixVente,$_PrixAchat,$_categorie,$_fournisseur,$_photo)
    {
        return new Produit($_NomProduit,$_prixVente,$_PrixAchat,$_categorie,$_fournisseur,$_photo,$this);
    }

    public function getID()
    {
        return $this->idAdministrateur;
    }
 }