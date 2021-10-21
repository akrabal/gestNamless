<?php
require "include/header.php";
//require 'include/headerdash.php';
require "include/Navbar.php";
//require 'include/navdash.php'

?>
<div class="container-fluid">

<div class="row justify-content-center" >
<div class="col-12 col-md-5 col-xl-4 my-5">
    <h1 class="mb-0 fw-bold text-center">
            ajouter  Fournisseur
        </h1>
    <form method="POST" action="/postFournisseur" >


        <div class="form-group">

            <!-- Label -->
            <label class="form-label">
              Nom du  forunisseur
            </label>

            <!-- Input -->
            <input type="text" class="form-control" name="nom" id="" placeholder="le nom du fournisseur">

        </div>
        <div class="form-group">

                
            <label class="form-label">
            numero de telephone
            </label>


            <input type="text" class="form-control mb-3" name="numtel" id="" placeholder="(___)___-____" data-inputmask="'mask': '(999)999-9999'">

        </div>
        <div class="form-group">

            <!-- Label -->
            <label class="form-label">
              Nom du  de l'etablisement
            </label>

            <!-- Input -->
            <input type="text" class="form-control" name="nomEtab" id="" placeholder="le nom de sa boutique">
        </div>

        <div class="form-group">

            <!-- Label -->
            <label class="form-label">
              la geolocalisation 
            </label>

            <!-- Input -->
            <input type="text" class="form-control" name="localisation" id="" placeholder="apres on va gerer ">

        </div>

         <!-- Submit -->
         <button class="btn btn-lg w-100 btn-primary mb-3">
              Ajouter un forunisseur
            </button>
       
    </form>
</div>
</div>       
</div>    



<?php
require 'include/footerdash.php';
?>