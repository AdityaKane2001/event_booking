<?php
  session_start();
  require_once 'pdo.php';
  if(!isset($_SESSION['logged']))
  {
    die('<div class="container" style="text-align:center"><h1>Please login to continue</h1></div>');
  }


  $check=$pdo->prepare('SELECT * from user_info where id=:id');
  $check->execute(array(':id'=>$_SESSION['id']));
  $row=$check->fetch(PDO::FETCH_ASSOC);
 ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <style media="screen">
    .center {
display: block;
margin-left: auto;
margin-right: auto;

}
    </style>

  </head>
  <body >

    <nav class="navbar navbar-toggleable-md fixed-top navbar-inverse" style="background-color:#0d0d0d;">
      <div class="container">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#mainNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
          <div class="navbar-nav">
            <a class="nav-item nav-link active s" href="index.php" style="font-size:12px">Home</a>
          </div>  </div> </div> </nav>


    <div class="jumbotron jumbotron-fluid" align="center" style=" background-image:url('../images/headmic.jpg');background-size: 100% auto; background-repeat:no-repeat" id="ticket_home">
      <h2 align="center" style="color:#cccccc;"><br><br>Ticket for Comedy Festival 2022</h2>

    </div>
<div class="container">


    <table class="table">
      <thead>
        <h3 align="center">Ticket Details</h3>
      </thead>
      <tbody>
        <tr>
          <th scope="row">Name</th>

          <td><?= $row['name'] ?> </td>
        </tr>
        <br><br>
        <tr>
          <th scope="row">Address</th>

          <td><?= $row['address'] ?> </td>
        </tr>
        <tr>
          <th scope="row">Email ID</th>

          <td><?= $row['email'] ?>  </td>
        </tr>
        <tr>
           <th scope="row">Phone Number</th>

           <td><?= $row['phone'] ?>  </td>
         </tr>
       <tr>
          <th scope="row">Pincode</th>

          <td><?= $row['pincode'] ?>  </td>
        </tr>
        <tr>
          <th scope="row">Seats</th>

          <td><script type="text/javascript">document.write(sessionStorage.getItem("userseats")); </script> </td>
        </tr>
        <tr>
          <th scope="row">Seats Grade</th>

          <td><script type="text/javascript">
            if (sessionStorage.getItem("uservip")==1){document.write("VIP");}
            else{document.write("Standard");}

          </script> </td></tr>

          <tr>
            <th scope="row">Days</th>

            <td><script type="text/javascript">document.write(sessionStorage.getItem("userdays")); </script> <br>
            <script type="text/javascript">document.write(sessionStorage.getItem("userdaysstr")); </script> </td>
          </tr>

          <tr>
            <th scope="row">FoodPass&trade;</th>

            <td><script type="text/javascript">


            if (sessionStorage.getItem("userfood")==1){
              document.write("Yes");

            }
            else{document.write("No");
            } </script> </td>

          </tr>
          <tr>
            <th scope="row">Total Cost</th>

            <td><script type="text/javascript">document.write(sessionStorage.getItem("usercost")); </script> </td>
          </tr>

          <tr>
            <th scope="row"><h3>Your unique pin is:</h3></th>

            <td><h3>  <?=$_SESSION['uniqueid'] ?> </h3></td>
          </tr>


      </tbody>
    </table>
    <br><br><br>

    <style>

    button {
    background-color: #0073e6;
    transition-duration: 0.4s;

    }

    button:hover {

    background-color: white;
    }
    </style>
      <button class="center" type="button"  onclick="window.print()" style="border-radius: 10px;  font-size: 25px; font-family:Helvetica; width: 250px; height:40px;">Print ticket</button>
      <br><br>




    <p class="lead"> Show this barcode at the security to confirm your presence.<br>Enjoy the show and see you there!</p>
    <?php

    require 'vendor/autoload.php';

    $stmt=$pdo->prepare('SELECT name,tid from user_info join transactions on user_info.id=transactions.uid where user_info.id=:uid');
    $stmt->execute(array(':uid'=>$_SESSION['id']));
    $row=$stmt->fetchAll(PDO::FETCH_ASSOC);

    $info="Name:".$row[0]['name']."\n"."UniqueId:".$_SESSION['uniqueid'];

    // This will output the barcode as HTML output to display in the browser
    $generator = new Picqer\Barcode\BarcodeGeneratorJPG();
    echo("<br><br>");
    echo('<div style="text-align:center">');
    echo $generator->getBarcode($info, $generator::TYPE_CODE_128);
    echo("<br><br>");
    echo('<h3>Scan this barcode at the event</h3>');
    echo("</div>");
    require_once 'mailer.php';





     ?>
    </div>
    <br><br>

     <br><br>

    <div class="container">
      <a href="index.html"><img class="center" src="../images/final.jpg" alt="Comedy Festival 2022" ></a>
    </div>
    <br><br>

    <footer class="page-footer font-small teal pt-4" style="background-color:black">
      <div class="container-fluid text-center text-md-left">
      <div class="row">
                <div class="col-md mt-md-0 mt-3" align="center">
            <h5 class="font-weight-normal" style="color:#8c8c8c;">Made with</h5> <h5 style="color:red;">&#10084;</h5><h5 style="color:#8c8c8c;"> by Aditya Kane and Shantanu Deshpande</h5>

          </div>

          <hr class="clearfix w-100 d-md-none pb-3">
        </div>

      </div>

      <div class="footer-copyright text-center py-3"></div>

  </footer>



    <!-- jQuery first, then Tether, then Bootstrap JS. -->
<!--    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
-->      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>
