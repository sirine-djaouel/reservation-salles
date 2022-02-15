<?php 
  if (isset($_POST["deco"])) 
  {
    session_unset();
    session_destroy();
    header('Location:index.php');
  }
?>
<html>
  <head>
  <style>@import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap');</style>
  <link rel="stylesheet" type="text/css" href="../css/style1.css">
  </head>

<header>
  <nav>
    <a id="header-title" href="index.php"><img src="img/logo.svg"></a>
    <ul>
      <li><a href="planning.php">NOS DISPONIBILITÉS</a></li>
      <li><a href="reservation-form.php">RÉSERVER UN ESPACE</a></li>

      <?php 
        if (isset($_SESSION["login"])):
      ?>    
      <li><a href="profil.php">PROFIL</a></li>
      <li><form action="index.php" method="post">
            <input id="deco" name="deco" value="DECONNEXION" type="submit"/>
          </form>
      </li>

      <?php
        else :
      ?>

      <li><a href="connexion.php"> LOGIN &nbsp;</a><i class="far fa-user"></i></li>

      <?php endif;?>
    </ul>
  </nav>
</header>
</html>