<?php
session_start();
require_once 'pdo.php';

if(!isset($_SESSION['logged']))
{
  die('<div class="container" style="text-align:center"><h1>Please login to continue</h1></div>');
}

$stmt=$pdo->prepare('SELECT name,tid,seats,type,days,foodpass,uniqueid from user_info join transactions on user_info.id=transactions.uid where (user_info.id=:uid and tid=:tid)');
$stmt->execute(array(':uid'=>$_SESSION['id'],':tid'=>$_GET['tid']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);




 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Booking #<?= $row['tid'] ?> for <?= $row['name'] ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

  </head>
  <body>
    <div class="container">


  <h1>  Booking #<?= $row['tid'] ?> </h1>
    <table class="table">
        <?php
        echo "<tr><th>Number of seats</th>";
        echo("<td>".$row['seats']."</td>");
        echo "<tr><th>Type of seats</th>";
        echo("<td>".$row['type']."</td>");
        echo "<tr><th>Type of seats</th>";
        echo("<td>".ucfirst($row['type'])."</td>");
        echo "<tr><th>Days</th>";
        echo("<td>");
        $alldays=explode(",",$row['days']);
        echo(sizeof($alldays));
        echo("<br>");
        foreach ($alldays as $day) {
          if($day!=false){
          echo($day." ");
          echo("November 2022");
          echo("<br>");
        }
        }
        echo("</td>");
        echo "<tr><th>FoodPass&trade;</th>";
        echo("<td>");
        if($row['foodpass']==1){echo("Yes");}
        else{echo("No");}
        echo("</td>");
        echo("  <tr>
            <th scope='row'><h3>Your unique pin is:</h3></th>

            <td><h3> ".$row['uniqueid']." </h3></td>
          </tr>")




         ?>
    </table>
      <a href="index.php">Back to Home</a><br>
</div>

    <!--    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script> -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

  </body>
</html>
