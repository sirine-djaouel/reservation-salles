<?php session_start(); 
$connect = mysqli_connect("localhost", "root", "", 'reservationsalles');
?>

<!DOCTYPE html>
<html>
<head>
    <title>reservation - check reservation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>
    <header>
      <?php include("header.php");?>
    </header>
    <main>

      <section id="event">
        <div id="eventcontainer">
          <h1 id="title-event">EVENEMENTS</h1> 
        
          <?php 
            if (isset($_SESSION["login"])){
            echo '<h2 id="subtitle-event">retrouvez les réservations en cours @ ' .$_SESSION['login'].'</h2><hr>'; 

            $requete1 = "SELECT titre, description,DATE_FORMAT(debut,'%d/%m/%Y, %H:%i:%s'), DATE_FORMAT(fin,'%d/%m/%Y, %H:%i:%s'), reservations.id, utilisateurs.login FROM reservations INNER JOIN utilisateurs ON reservations.id_utilisateur = utilisateurs.id WHERE reservations.id = '$_GET[id]'";
            $query1 = mysqli_query($connect, $requete1);
            $event = mysqli_fetch_all($query1);
            }
          ?>
  
          <article>
            <?php echo 'TITRE EVENEMENT: '.$event[0][0]. '</br>';?>
            <?php echo 'DESCRIPTION : '.$event[0][1];?>
                    
            <p>Début de l'évènement le <i><?php echo "<b>".$event[0][2]."</b>"  ?></i></p>
              
            <p>Fin de l'évènement le <i><?php echo "<b>".$event[0][3]."</b>" ?></i></p>
             
            <p>Organisé par <?php echo "<b>".$event[0][5]."</b>"; ?></p>
          </article>
        </div>
      </section> 
    </main>
    <footer>
      <?php include("footer.php")?>
    </footer>
</body>
</html>