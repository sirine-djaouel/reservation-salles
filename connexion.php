<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
    <title>Connectez-vous afin de réserver une salle dans nos espaces coworking ainsi que dans nos bureaux privés.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
      <?php include("includes/header.php")?>
    </header>
    <main>
      <section id="container-connexion">

        <div id="left">
            <div id="left-presentation">
              <h2 class="animation a1">Bienvenue !</h2>
              <h4 class="animation a2">Connectez-vous avec votre identifiant et votre mot de passe.</h4>
            </div>
            <form id="form" method="post" action="connexion.php">

                <input class="form-field animation a3"  type="text" name="login" placeholder="Identifiant">

                <input class="form-field animation a4"  type="password" name="password" placeholder="Mot de Passe"><br>

                <input id="button-connexion" class="animation a6" type="submit" value="CONNEXION" name="submit">

                <p class="animation a5"><a id="linkconnect" href="inscription.php">Pas encore inscrit ? Rejoignez-nous maintenant !</a></p>
            </form>
        
          <?php
          if ((isset($_POST['login'])) && (isset($_POST['password']))){

              if ((!empty($_POST['login'])) && (!empty($_POST['password']))){

              $con = mysqli_connect('localhost','root','','reservationsalles');

                if(! $con){die("Error  : ". mysql_error());}

                $sql = "SELECT * FROM `utilisateurs` WHERE  `login`='$_POST[login]'&&`password`='$_POST[password]'";
                $result = mysqli_query($con, $sql);

                  if ($result){
                    $row = mysqli_num_rows($result);

                    if ($row){
                    $_SESSION['login']=$_POST['login'];
                    $login=$_SESSION['login'];
                    header("location:index.php");
                    }

                    else echo '</br><span class="errormessage">Login ou mot de passe incorrect</span>';
                  }
              }else echo '<span class="errormessage">Veuillez remplir tous les champs</span></br>';
          }
          ?>
        </div>

        <div id="right"></div>

    </section>
    </main>
    <footer>
      <?php include("includes/footer.php");?>
    </footer>
</body>
</html>