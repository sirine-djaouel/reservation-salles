<?php session_start();
$connect = mysqli_connect('localhost', 'root', '','reservationsalles');
?>

<!DOCTYPE html>
<html>
<head>
    <title>reservation - planning </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>
    <header>
      <?php include("header.php") ?>
    </header>
    <main>
        <h1 id="planningtitle">PLANNING</h1>
        <div id=containertable> 
          <table> 
            <thead>
               <tr>
                <th>&nbsp;</th>
                <th class="day">MONDAY</th>
                <th class="day">TUESDAY</th>
                <th class="day">WEDNESDAY</th>
                <th class="day">THURSDAY</th>
                <th class="day">FRIDAY</th>
              </tr>
            </thead>
            <tbody>
      <?php

      echo "<p id ='dateday'>Nous sommes le ".date('d-m-Y');
      echo " semaine n°" . date('W').  " de l'année " .date('o'). '.</p></br>';

      $h = 0;
      $d = 0;
      
      ?>
      <?php
      while ($h < 11){

        while ($d < 5){

        $day = 1;
        $today = $day + $d;
        
          if ($d == 0){
          
            if ($h == 0) {
            $debut = "08:00:00";
            $fin = "09:00:00";
            echo "<td class='hour'>08h00 - 09h00</td>";
            }

            if ($h == 1) {
            $debut = "09:00:00";
            $fin = "10:00:00";
            echo "<td class='hour'>09h00 - 10h00</td>";
            }

            if ($h == 2) {
            $debut = "10:00:00";
            $fin = "11:00:00";
            echo "<td class='hour'>10h00 - 11h00</td>";
            }

            if ($h == 3) {
            $debut = "11:00:00";
            $fin = "12:00:00";
            echo "<td class='hour'>11h00 - 12h00</td>";
            }

            if ($h == 4) {
            $debut = "12:00:00";
            $fin = "13:00:00";
            echo "<td class='hour'>12h00 - 13h00</td>";
            }

            if ($h == 5) {
            $debut = "13:00:00";
            $fin = "14:00:00";
            echo "<td class='hour'>13h00 - 14h00</td>";
            }

            if ($h == 6) {
            $debut = "14:00:00";
            $fin = "15:00:00";
            echo "<td class='hour'>14h00 - 15h00</td>";
            }

            if ($h == 7) {
            $debut = "15:00:00";
            $fin = "16:00:00";
            echo "<td class='hour'>15h00 - 16h00</td>";
            }

            if ($h == 8) {
            $debut = "16:00:00";
            $fin = "17:00:00";
            echo "<td class='hour'>16h00 - 17h00</td>";
            }

            if ($h == 9) {
            $debut = "17:00:00";
            $fin = "18:00:00";
            echo "<td class='hour'>17h00 - 18h00</td>";
            }

            if ($h == 10) {
            $debut = "18:00:00";
            $fin = "19:00:00";
            echo '<td class="hour">18h00 - 19h00</td>';
            } 
          }
          ?> 
          <td>
          <?php

              $request = "SELECT titre, DATE_FORMAT(fin, '%w'), DATE_FORMAT(debut,'%T'), DATE_FORMAT(fin,'%T'),utilisateurs.login, reservations.id FROM reservations INNER JOIN utilisateurs ON reservations.id_utilisateur = utilisateurs.id WHERE week(reservations.debut) = WEEK(CURDATE())";
              $query = mysqli_query($connect , $request);
              $event = mysqli_fetch_all($query);
          
              $resa = ('<a class="tobook" href="reservation-form.php">Réserver</a>');
              $signal = 0;
          
              foreach ($event as $value){
            
              if ((($value[2] == $debut) && ($value[3] == $fin) && ($value[1] == $today))){
                $signal = 1;
                echo '****' . $value[0] . '****</br>';
                echo 'à ' . $value[2].'</br>';
                echo 'Créateur : ' . $value[4].'</br>';
                
                if(isset($_SESSION["login"])){
                  echo ' <a id="idevent" href = "reservation.php?id='. $value[5].'">lien event</a></td>';
                }
              }

              }
              if ($signal == 0){
                echo $resa;  
              }  
        $d++;
        }
        ?>
       </tr>
      <?php
        $d = 0;
        $h++;
      }
      ?>
        </tbody>
      </table>
     </div>
      
    </main>
    <footer>
      <?php include("footer.php");?>
    </footer>
</body>
</html>
