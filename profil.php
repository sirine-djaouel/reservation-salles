<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modifiez votre profil et réserver une salle dans nos espaces coworking ainsi que dans nos bureaux privés.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
       <?php include("includes/header.php"); ?>
    </header>
    <main>
        <section id="container-profil">
          <div>
          <h1> Bienvenue
            <?php
               echo $_SESSION['login'];
            ?>
          </h1>
          </div>
        
<?php
$bdd = mysqli_connect("localhost","root","","reservationsalles");
$result=mysqli_query($bdd, "SELECT * FROM reservations");
$table=mysqli_fetch_all($result, MYSQLI_ASSOC);

var_dump($table);

echo "<table border='1'>";
echo "<tr>";
foreach ($table[0] as $key => $val)
    {
        echo '<th>'. $key .'</th>';
    }
echo "</tr>";


foreach ($table as $key => $val)
    {   echo "<tr>";

        foreach ($val as $key1 => $val1)
        {
            echo '<td>'. $val1 .'</td>';
        }
        

        echo "</tr>";
    }

echo "</table>";
mysqli_close($bdd);

?>

          <h2 id=sub-profil>Modifier vos informations de connexion</h2> 
            <form id="form-profil" action="profil.php" method="post">
                <label class="champs-profil">Mot de passe actuel</label>
                <input class="cadre-profil" type="password" id="mdp" name="password" placeholder="Mot de Passe Actuel">

                <label class="champs-profil">Nouvel Identifiant</label>
                <input class="cadre-profil" type="texte" id="login" name="login" placeholder="Nouvel Identifiant ou votre Identifiant actuel">

                <label class="champs-profil">Nouveau Mot de Passe</label>
                <input class="cadre-profil" type="password" id="mdp" name="password" placeholder="Nouveau Mot de Passe">

                <label class="champs-profil">Confirmer votre nouveau mot de passe</label>
                <input class="cadre-profil" type="password" id="mdp" name="password-confirm" placeholder="Confirmation de votre nouveau Mot de Passe">

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
                    else echo '<p class="error">Veuillez compléter tous les champs </p>';
                }
               ?>
            </form>
        </section>
    </main>
    <footer>
      <?php include("includes/footer.php"); ?>
    </footer>
</body>
</html>