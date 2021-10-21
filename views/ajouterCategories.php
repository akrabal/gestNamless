<?php

//require 'include/headerdash.php';
require "include/header.php";
//require 'include/navdash.php';
require "include/Navbar.php";

?>
<div class="container-fluid">

    <div class="row justify-content-center" >
    <div class="col-12 col-md-5 col-xl-4 my-5">
        <h1 class="mb-0 fw-bold text-center">
                ajouter  categorie
            </h1>
        <form method="POST" action="/postCategories" >


            <div class="form-group">

                <!-- Label -->
                <label class="form-label">
                  categorie
                </label>

                <!-- Input -->
                <input type="text" class="form-control" name="nom" id="" placeholder="le nom de la categories">

            </div>
            <div class="form-group">

                <!-- Label -->
                <label class="form-label">
                  description de la categorie 
                </label>
                <textarea name="Desc" id="" cols="40" rows="7"></textarea>
                <!-- Input -->
                
               
            </div>
             <!-- Submit -->
             <button class="btn btn-lg w-100 btn-primary mb-3">
              Ajouter un categorie
            </button>
        </form>
    </div>
    </div>       
</div>    



<?php
require 'include/footerdash.php';
?>