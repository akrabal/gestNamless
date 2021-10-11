<?php
namespace App\classe;

 class Administrateur {

     private $Nom ;
     private $Password ;

    public function __construct($_Nom,$_password )
    {
        $this->Nom=$_Nom;
        $this->password = $_password;
    } 

    public function creationAdmin ()
    {

    }

 }