<?php
namespace  App\classe;

class Produit {
    
    /**
     * idProduit
     *
     * @var int
     */
    private $idProduit ;
        
     
    /**
     * NomProduit
     *
     * @var string
     */
    private $NomProduit ;

        
    /**
     * PrixVente
     *
     * @var int
     */
    private $PrixVente ;
        
    /**
     * PrixAchat
     *
     * @var int 
     */
    private $PrixAchat ;

    private $Fournisseur ;

    private $Categorie ;

    private $Photo ;

    private $Admin;
    
    public function __construct($_Nom,$_PrixVente,$_PrixAchat,$_Categorie,$_Fournisseur,$_photo,$_Administrateur)
    {
        
        $this->NomProduit = $_Nom;
        $this->PrixVente = $_PrixVente ;
        $this->PrixAchat = $_PrixAchat ;
        $this->Fournisseur =$_Fournisseur ;
        $this->Categorie = $_Categorie ;
        $this->Photo = $_photo;
        $this->Admin = $_Administrateur;

    }
    public function getPhoto()
    {
        return $this->Photo;
    }

    public function getNom()
    {
        return $this->NomProduit;
    }
    public function getPrixAchat()
    {
        return $this->PrixAchat;
    }
    public function getPrixVente()
    {
        return $this->PrixVente;
    }

    private function MovePhoto()
    {
       

       if(empty( $this->Photo["photo"]["error"])) 
       { 
         move_uploaded_file( $this->Photo["photo"]["tmp_name"],"../public/photo/".$this->Photo["photo"]["name"]);
       }
        return $this->Photo["photo"]["name"];
       
    }

    public function SaveProduit(\PDO $pdo)
    {
        $state = false;
        
         if( !empty($this->NomProduit)&& !is_null($this->NomProduit) && !empty($this->PrixAchat)&& !is_null($this->PrixAchat)&& !empty($this->PrixVente)&& !is_null($this->PrixVente) && !empty($this->Fournisseur)&& !is_null($this->Fournisseur)&& !empty($this->Categorie)&& !is_null($this->Categorie)&& !empty($this->Admin)&& !is_null($this->Admin)){
                $sql = ' INSERT INTO Produit (NomProduit,PrixVente,PrixAchat,idCategorie,idFournisseur,photo,idAdministrateur) Values(:NomProduit,:PrixVente,:PrixAchat,:idCategorie,:idFournisseur,:photo,:idAdministrateur) ';
                $PdoStatemnent = $pdo->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
                $PdoStatemnent->execute(array(':NomProduit' => $this->NomProduit,':PrixVente'=> $this->PrixVente, ':PrixAchat'=> $this->PrixAchat,':idCategorie'=>$this->Categorie->getID(),':idFournisseur'=>$this->Fournisseur->getID(),':photo'=>$this->MovePhoto(),':idAdministrateur'=>$this->Admin->getID()));
                $state = true;
                //quand on enregistre on recupere l'id
                $this->idProduit=$pdo->lastInsertId();
           }
           
      
    
        return $state;
    }
  
    
}