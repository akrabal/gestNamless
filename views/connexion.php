<?php
require_once 'include/header.php'
?>


<!-- CONTENT -->
<section>
  <div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center gx-0 min-vh-100">
      <div class="col-12 col-md-6 col-lg-4 py-8 py-md-11">

        <!-- Heading -->
        <h1 class="mb-0 fw-bold">
          connexion
        </h1>

        <!-- Text -->
       

        <!-- Form -->
        <form method="POST" action="/connexion" class="mb-6">

          <!-- Email -->
          <div class="form-group">
            <label class="form-label" for="email">
              Nom de l'admin
            </label>
            <input type="text" name="Nom" class="form-control" id="email" placeholder="Nom de l'admin">
          </div>

          <!-- Password -->
          <div class="form-group mb-5">
            <label class="form-label" for="password">
              Password
            </label>
            <input type="password" name="password" class="form-control" id="password" placeholder=" mots de passe ">
          </div>

          <!-- Submit -->
          <button class="btn w-100 btn-primary" type="submit">
            envoyer
          </button>

        </form>

     

      </div>
      <div class="col-lg-7 offset-lg-1 align-self-stretch d-none d-lg-block">

        <!-- Image -->
        <div class="h-100 w-cover bg-cover" style="background-image: url(depend/assets/img/covers/cover-14.jpg);"></div>

        <!-- Shape -->
        <div class="shape shape-start shape-fluid-y text-white">
          <svg viewBox="0 0 100 1544" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h100v386l-50 772v386H0V0z" fill="currentColor"></path></svg>            </div>

      </div>
    </div> <!-- / .row -->
  </div> <!-- / .container -->
</section>
<?php
  require_once 'include/footer.php'?>