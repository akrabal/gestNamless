<?php

use App\classe\Database;

require_once "include/header.php";
require_once "include/Navbar.php";
$pdo = Database::connect("localhost","root","","gesnamless");

?>


<section class="py-6">
      <div class="container">
        <div class="row">
          <div class="col-12">

            <!-- Form -->
            <form class="rounded shadow">
              <div class="input-group input-group-lg">

                <!-- Text -->
                <span class="input-group-text border-0 pe-1">
                  <i class="fe fe-search"></i>
                </span>

                <!-- Input -->
                <input type="text" class="form-control border-0 px-1" aria-label="Search our blog..." placeholder="Search our blog..." value="Design Leadership">

                <!-- Text -->
                <span class="input-group-text border-0 py-0 ps-1 pe-3">

                 

                  <!-- Button -->
                  <button type="submit" class="btn btn-sm btn-primary">
                    Search
                  </button>

                </span>

              </div>
            </form>

          </div>
        </div> <!-- / .row -->
      </div>
    </section>
    
<section class="pt-7 pt-md-10 bg-light">
      <div class="container">
        <div class="row align-items-center mb-5">
         
          <div class="col-12 col-md-auto">

            <!-- Button -->
            <a href="#!" class="btn btn-sm btn-outline-gray-300 d-none d-md-inline">
              View all
            </a>

          </div>
        </div> <!-- / .row -->
      
        <div class="row">

        <?php
            $produitArray=Database::findAllProduit($pdo);
            foreach ($produitArray as  $value) { ?>
          <div class="col-12 col-md-6 col-lg-4 d-flex">

            <!-- Card -->
            <div class="card mb-6 mb-lg-0 shadow-light-lg lift lift-lg">

              <!-- Image -->
              <a class="card-img-top" href="#!">

                <!-- Image -->
                <img src="photo/<?=$value->getPhoto()  ?>" alt="..." class="card-img-top">

                <!-- Shape -->
               <!-- <div class="position-relative">
                  <div class="shape shape-bottom shape-fluid-x text-white">
                    <svg viewBox="0 0 2880 480" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M2160 0C1440 240 720 240 720 240H0v240h2880V0h-720z" fill="currentColor"></path></svg>                  </div>
                </div> -->

              </a>

              <!-- Body -->
              <a class="card-body" href="infoProduit">

                <!-- Heading -->
                <h3>
                <?=$value->getNom()  ?>
                </h3>

                <!-- Text -->
                <p class="mb-0 text-muted">
                  <table>
                    <tr>
                      <td>prix de d'achat</td> <td><?=$value->getPrixAchat()  ?></td> 
      
                    </tr>

                    <tr>
                    <td>prix de vente </td> <td><?=$value->getPrixVente()  ?></td>
                    </tr>
                    
                  </table>
                </p>

              </a>

              <!-- Meta -->
              <a class="card-meta mt-auto" href="#!">

                <!-- Divider -->
                <hr class="card-meta-divider">

                <!-- Author -->
                <h6 class="text-uppercase text-muted me-2 mb-0">
                  Ab Hadley
                </h6>
              </a>

            </div>

            

          </div>
          <?php
              
            }
        ?>  
          
          
         
          

          </div>

          
          
        </div> <!-- / .row -->
        
  
      </div> <!-- / .container -->
    </section>
<?php
  require_once "include/footer.php"
?>