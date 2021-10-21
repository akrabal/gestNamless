<?php

use App\classe\Database;
$pdo = Database::connect("localhost","root","","gesnamless");
require '../vendor/autoload.php';

require "include/header.php";
//require 'include/headerdash.php';
require "include/Navbar.php";
?>



<div class="container-fluid">

  <div class="row justify-content-center" >
    <div class="col-12 col-md-5 col-xl-4 my-5">
        <h1 class="mb-0 fw-bold text-center">
               ajouter  Produit 
          </h1>
        <form enctype="multipart/form-data" method="POST" action="/postProduit" >


            <div class="form-group">

              <!-- Label -->
              <label class="form-label">
                Nom du Produit
              </label>

              <!-- Input -->
              <input type="text" class="form-control" name="nom" id="" placeholder="NOM">

            </div>


            <div class="form-group">

                <!-- Label -->
                <label class="form-label">
                  prix  d'achat 
                </label>
  
                <!-- Input -->
                <input type="number" class="form-control" name="achat" id=""placeholder="ce que on a negocier chez le vendeur  ">
  
            </div>
            <div class="form-group">

                <!-- Label -->
                <label class="form-label">
                  prix Vente 
                </label>
  
                <!-- Input -->
                <input type="number" class="form-control" name="vente" id=""placeholder="le prix qu'on donne aux clients">
  
            </div>

            <div class="form-group">
              <!-- Label -->
              <label class="form-label">
                fourniseur
              </label>

              <select class="form-control mb-3" name="fournisseur" id="classe">
                  <?php
                  $fournisseurArray = Database::findAllFournisseur($pdo);
                  
                  foreach ($fournisseurArray as  $value) { ?>
                          <option value="<?= $value->getID()?>"> <?= $value->getNom() ; ?></option>
                  <?php
                  }
                  ?>
                 </select>    
            
            </div>

            <div class="form-group">
              <!-- Label -->
              <label class="form-label">
                categories
              </label>


             <select class="form-control mb-3" name="categorie" id="classe">
             <?php  
               $categorieArray = Database::findAllCategorie($pdo);
               foreach ($categorieArray as  $value) {
             ?>
                <option value="<?= $value->getID() ; ?>"><?= $value->getNom() ;?></option>
             <?php
                 }
             ?>   
             </select>
            </div>

           
            <!--
            <div class="form-group">

                
                <label class="form-label">
                  numero de telephone
                </label>
  
                
                <input type="text" class="form-control mb-3" name="numtel" id="" placeholder="(___)___-____" data-inputmask="'mask': '(999)999-9999'">
  
            </div>
            
            <div class="form-group">
              
                <div class="btn-group-toggle">
                    <input type="radio" class="btn-check" name="sexe" value="M" id="option1" autocomplete="off" checked="">
                    <label class="btn btn-white" for="option1">
                        <i class="fe fe-check-circle"></i> Masculin
                    </label>
                    <input type="radio" class="btn-check" name="sexe" value="F" id="option2" autocomplete="off">
                    <label class="btn btn-white" for="option2">
                        <i class="fe fe-check-circle"></i> Feminin
                      </label>
                </div>
            </div>
            -->
            
            

            <div class="form-group">
                <!-- Label -->
              <label class="form-label">
                photo
              </label>

              <div class="btn-group-toggle">
              <input type="file" id="" name="photo">
              </div>

            </div>

            

            <!-- Submit -->
            <button class="btn btn-lg w-100 btn-primary mb-3">
              Ajouter un produit
            </button>

    </div>
  </div>        
</div>

<?php
require 'include/footer.php';
require 'include/footerdash.php';
?>