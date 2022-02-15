<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>reservation - profil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>
    <header>
       <?php include("header.php"); ?>
    </header>
    <main>
        <section id="container-profil">
          <div>
          <h1> HELLO @
            <?php
               echo $_SESSION['login'];
            ?>
          </h1>
          </div>
          
          <h2 id=sub-profil>modifier vos informations de connexion</h2> 
            <form id="form-profil" action="profil.php" method="post">
                <label class="champs-profil">password actuel</label>
                <input class="cadre-profil" type="password" id="mdp" name="password" placeholder="mot de passe actuel">

                <label class="champs-profil">nouveau login</label>
                <input class="cadre-profil" type="texte" id="login" name="login" placeholder="nouveau login">

                <label class="champs-profil">nouveau password</label>
                <input class="cadre-profil" type="password" id="mdp" name="password" placeholder="new password">

                <label class="champs-profil">confirmer le password</label>
                <input class="cadre-profil" type="password" id="mdp" name="password-confirm" placeholder="confirmation new password">

                <input id="button-profil" type="submit" value="VALIDER" name="submit">
            
                <?php

                if (isset($_POST['submit'])){
                    $login =htmlentities(trim($_POST['login']));
                    $password = htmlentities(trim($_POST['password']));
                    $repeatpassword = htmlentities(trim($_POST['password-confirm']));
          
                    if($login && $password && $repeatpassword){
                        if($password==$repeatpassword){
          
                            $connect = mysqli_connect("localhost","root", "","reservationsalles");
                            $request = "UPDATE utilisateurs SET  login = '$login', password = '$password' WHERE login = '".$_SESSION['login']."'";
                            mysqli_query($connect, $request);
          
                          header('location:connexion.php');
          
                        }
                        else echo '<p class="error"> les deux champs doivent être identiques </p>';
          
                    }
                    else echo '<p class="error"> veuillez compléter tous les champs </p>';
                }
               ?>
            </form>
        </section>
    </main>
    <footer>
      <?php include("footer.php"); ?>
    </footer>
</body>
</html>