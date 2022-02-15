<?php 
  session_start(); 
    if (isset($_POST["deco"])) 
    {
      session_unset();
      session_destroy();
      header('Location:index.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Réservation de salle</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
      <?php include("includes/header.php")?>
    </header>
    
    <main>
      <section id="banner">
        <div id="presentation-index">
          <h1>Inscrivez-vous et réservez votre espace dès maintenant !</h1>
           <?php if(isset($_SESSION['login'])): ?>
              <h2 id="hello">Bienvenue @ <?php echo $_SESSION['login'] ?> !</h2>
              <p>Vous pouvez, dès à présent, réserver votre espace 
            <div class="link">
              <a href='reservation-form.php'>en cliquant ici !</a>
            </div>
            </p>
        
          <?php else: ?> 
            <p>
              <div class="link">
                <a href='inscription.php' >S'INSCRIRE</a> 
              </div>
            </p>
            <a id="link" href="connexion.php">Déjà inscrit ? Connectez-vous !</a>
          <?php endif; ?>
        </div>
      
        <div id="slider">
          <figure>
            <img src="img/BUREAU1.jpg">
            <img src="img/BUREAU2.jpg">
            <img src="img/BUREAU3.jpg">
            <img src="img/BUREAU4.jpg">
          </figure>
        </div>
      </section>

      <section id="services">
        <h1>NOS SERVICES</h1>
        <div class="cen">
          <div class="service">
            <i class="fas fa-desktop"></i>
            <h2>Un espace de Coworking</h2>
            <p>Travailler en "nomade" à l'heure, c'est possible !</p>
          </div>

          <div class="service">
            <i class="fas fa-wifi"></i>
            <h2>Bureaux Privés</h2>
            <p>Pour travailler en groupe, vous n'avez qu'à venir avec votre ordinateur.</p>
          </div>

          <div class="service">
            <i class="fas fa-print"></i>
            <h2>Impressions</h2>
            <p>imprimez vos documents professionnels auprès de notre service reprographie ouvert toute la journée.</p>
          </div>

          <div class="service">
            <i class="far fa-handshake"></i>
            <h2>Domiciliation</h2>
            <p>En tant que client, bénéficiez d'une adresse commerciale et/ou administrative.</p>
          </div>

          <div class="service">
            <i class="fas fa-coffee"></i>
            <h2>Coffee Shop</h2>
            <p>Vous avez la possibilité d'acheter des boissons chaudes et des snacks à tout moment de la journée.</p>
          </div>
        </div>
      </section>
    </main>
    <footer>
      <?php include("includes/footer.php")?>
    </footer>
</body>
</html>
