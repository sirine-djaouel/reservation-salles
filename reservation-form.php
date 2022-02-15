<?php session_start(); 

?>
<!DOCTYPE html>
<html>
<head>
    <title>reservation - form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
      <?php include("includes/header.php");?>
    </header>
    <?php if(isset($_SESSION['login'])): ?>
     
    <section id="resa">
      <h2 id="hello">bienvenue @ <?php echo $_SESSION['login'] ?></h2>

      <form id="formulaire" method="post" action="reservation-form.php">
        <h1 id="form-title"> RÉSERVER UN ESPACE</h1>

        <label>TITRE</label>
        <input id="input-line" type="text" name="titre" id="titre" placeholder="titre"/>
 
        <div id="time">
          <label>date début</label>
          <input id="dateinput" type="date" name="date">
                        
          <label>début</label>
          <input class="resahour" type="time" name="debut" min="08" max="18" step="3600"/>

          <label>fin</label>
          <input  class="resahour" type="time" name="fin" min="09" max="19" step="3600"/>
        </div>
            
        <label>DESCRIPTION</label>
        <textarea type="textarea" name="description" class="description" id="description" placeholder="description"></textarea>

        <div id="box-button">
          <button class="icon-btn add-btn">
          <div class="add-icon"></div>
          <input class="btn-txt" type="submit" value="RÉSERVER" name="submit">
        </div>
      </form>
      <?php 
        date_default_timezone_set('Europe/Paris');
        $connect = mysqli_connect('localhost', 'root', '','reservationsalles');

        $request = "SELECT id FROM utilisateurs WHERE login ='".$_SESSION['login']."'";
        $query1 = mysqli_query($connect, $request);
        $id = mysqli_fetch_all($query1);
        $id_utilisateur = $id[0][0];

        if (isset($_POST['submit'])){

        $tit = htmlspecialchars ($_POST['titre']);
        $desc = htmlspecialchars ($_POST['description']);
        $date = htmlspecialchars ($_POST['date']);
        $d = htmlspecialchars($_POST['debut']);
        $f = htmlspecialchars ($_POST['fin']);

        $debut = $date." ".$d;
        $fin = $date." ".$f;

          if ($tit && $desc && $date && $d && $f){

          $requete = "INSERT INTO `reservations`(`titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES ('$tit','$desc','$debut','$fin','$id_utilisateur')";
          $query = mysqli_query($connect, $requete);

          header('location:planning.php');
          }
          else echo '<span class="errormessage">Veuillez remplir tous les champs</span></br>';   
        }          
      ?>
    </section>
    <?php else: ?> 
      <div id="presentation-resa">
        <p id="resa-text">Pour accèder à notre formulaire de réservation, veuillez 
          <a href="connexion.php">vous connectez</a>
          ou rejoignez notre communauté de co-workers en créant
          <a href="inscription.php">un nouveau compte en quelques clics</a>
        </p>
      </div>
    <?php endif; ?>   
    </main>
    <footer>
      <?php include("includes/footer.php");?>
    </footer>
</body>
</html>