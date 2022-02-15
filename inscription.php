<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
    <title>reservation - inscription</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>
    <header>
      <?php include("header.php");?>
    </header>
    <main>
      <div id="container-inscription">
            <form id="form-inscription" action="inscription.php" method="post">
                <h1 id="form-title"> INSCRIPTION </h1>
                <label class="champs">Login</label>
                <input class="cadre" type="texte" id="login" name="login" placeholder="Créez votre login"> <br /> <br />

                <label class="champs">Mot de passe</label>
                <input class="cadre" type="password" id="mdp" name="password" placeholder="Entrer un mot de passe"> <br /> <br />

                <label class="champs">Confirmation mot de passe</label>
                <input class="cadre" type="password" id="mdp" name="repeatmdp" placeholder="confirmer le mot de passe"> <br /> <br />

                <input class="button" type="submit" value="CONNEXION" name="submit">

                <p id="connecte"><a href="connexion.php">Vous avez déjà un compte ? Connectez-vous.</a></p>
            
            <?php 
              
              if (isset($_POST['submit'])) {

              $login = htmlentities(trim($_POST['login']));
              $password = htmlentities(trim($_POST['password']));
              $repeatpassword = htmlentities(trim($_POST['repeatmdp']));

              $connect = mysqli_connect('localhost', 'root', '','reservationsalles');
              $requete1 = "SELECT login FROM utilisateurs WHERE login = '$login'" ;
              $req = mysqli_query($connect,$requete1);
              $exist = mysqli_fetch_all($req);

                    if (!empty($exist)){

                      echo "<p class='errormessage'>Ce pseudo est déjà utilisé !</p>";

                    } 
                    elseif ($login && $password && $repeatpassword){ 

                      if ($password == $repeatpassword) {
      
                          $requete = "INSERT INTO utilisateurs (login,password) VALUES ('$login','$password')";
                          $query = mysqli_query($connect, $requete);
        
                          header('location:connexion.php');
                
                          } else echo '<p class="error-connect">Les mots de passe doivent être identiques</p>';
            
                    } else echo '<p class="error-connect">Veuillez saisir tous les champs</p>';
              } 
          
            ?>
            </form>     
        </div>
    </main>
    <footer>
        <?php include("includes/footer.php"); ?>
    </footer>
</body>
</html>