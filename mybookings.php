<?php
session_start();
require_once 'pdo.php';

if(!isset($_SESSION['logged']))
{
  die('<div class="container" style="text-align:center"><h1>Please login to continue</h1></div>');
}

$stmt=$pdo->prepare('SELECT name,tid from user_info inner join transactions on user_info.id=transactions.uid where user_info.id=:uid');
$stmt->execute(array(':uid'=>$_SESSION['id']));
$row=$stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bookings for <?= $row[0]['name'] ?> </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<a href="#"></a>
  </head>
  <body>

    <div class="container">


      <?php if ($row==false){echo"<h1>My Bookings</h1><br><p class='lead'>No transactions found</p>";}
        else {
          echo '<table class="table">';
          echo "<thead><h1>My Bookings</h1></thead>";
          echo("<br><br><br>");
          echo("<tbody>");
          echo("<tr><th>Name</th><th>Transaction ID</th><th></th></tr>");
          foreach($row as $entry)
          {
            echo "<tr>";
            echo("<td>".$entry['name']."</td>");
            echo("<td>".$entry['tid']."</td>");
            echo("<td>"."<a href='viewbooking.php?tid=".urlencode($entry['tid'])."'>View booking</a>"."</td>");
            echo("</tr>");



          }
          echo("</tbody>");
          echo("</table>");
        }?>

        <a href="index.php">Back to Home</a><br><br><br>

        <?php

        require 'vendor/autoload.php';
        if ($row!=false){
        $info="Name:".$row[0]['name']."\n"."UniqueId:".$_SESSION['uniqueid'];

        // This will output the barcode as HTML output to display in the browser
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        echo $generator->getBarcode($info, $generator::TYPE_CODE_128);
        echo("<br><br>");

        echo('<h3>Scan this barcode at the event</h3>');
        }

         ?>
    </div>


<!--    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  -->  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


  </body>
</html>
