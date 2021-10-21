<?php
namespace App\classe ;

class Categorie{
    
    private $idCategorie;    
    private $NomCategorie ;
    private $Description ;

    public function __construct($_NomCategorie, $_Description,$_idCategorie=null)
    {
        $this->NomCategorie=$_NomCategorie;
        $this->Description=$_Description;
        $this->idCategorie=$_idCategorie;
    }

    public function getID()
    {   
        return $this->idCategorie;
    }

    public function getNom()
    {
        return $this->NomCategorie;
    }

    public function SaveCategorie(\PDO $pdo)
    {
        $state = false;
         if( !empty($this->NomCategorie)&& !is_null($this->NomCategorie)  ){
                $sql = ' INSERT INTO Categorie (NomCategorie,DescriptionCategorie) Values(:NomCategorie,:DescriptionCategorie) ';
                $PdoStatemnent = $pdo->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
                $PdoStatemnent->execute(array(':NomCategorie' => $this->NomCategorie,':DescriptionCategorie'=> $this->Description));
                $state = true;
                //quand on enregistre on recupere l'id
                $this->idCategorie=$pdo->lastInsertId();
           }
    
        return $state;
    }
}