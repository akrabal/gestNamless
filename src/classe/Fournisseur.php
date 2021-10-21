<?php
namespace App\classe;

class Fournisseur {
    private $idFornisseur;
    private $NomFournisseur;
    private $NumeroTelephone;
    private $NomEtablisement;
    private $quartierFournisseur;
    private $geolocalisation;
    private $admin;


    public function __construct($_NomFouniseur,$_NomEtablisement,$_NumeroTel,$_quartier,$_localisation,$_Administrateur,$_idFournisseur=null)
    {
        $this->NomFournisseur=$_NomFouniseur;
        $this->NomEtablisement=$_NomEtablisement;
        $this->NumeroTelephone = $_NumeroTel;
        $this->quartierFournisseur = $_quartier;
        $this->geolocalisation= $_localisation;
        $this->admin = $_Administrateur;
        $this->idFornisseur = $_idFournisseur ;
    }


    public function getID()
    {
        return $this->idFornisseur;
    }

    public function getNom()
    {
        return $this->NomFournisseur;
    }

    public function SaveFourniseur(\PDO $pdo)
    {
        $state = false;
         if( !empty($this->NomFournisseur)&& !is_null($this->NomFournisseur) && !empty($this->NumeroTelephone)&& !is_null($this->NumeroTelephone) ){
                $sql = ' INSERT INTO Fournisseur (NomFournisseur,NomEtablisement,NumeroTelephone,quartierFourniseur,geolocalisation,idAdministrateur) Values(:NomFournisseur,:NomEtablisement,:NumeroTelephone,:quartierFourniseur,:geolocalisation,:idAdministrateur) ';
                $PdoStatemnent = $pdo->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
                $PdoStatemnent->execute(array(':NomFournisseur' => $this->NomFournisseur ,':NomEtablisement'=>$this->NomEtablisement,':NumeroTelephone'=>$this->NumeroTelephone,':quartierFourniseur'=>$this->quartierFournisseur,':geolocalisation'=>$this->geolocalisation,':idAdministrateur'=>$this->admin->getID()));
                $state = true;
                //quand on enregistre on recupere l'id
                $this->idAdministrateur=$pdo->lastInsertId();
           }
    
        return $state;
    }

    

}