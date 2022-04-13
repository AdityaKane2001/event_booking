<?php
session_start();
require_once 'pdo.php';

if(isset($_POST['login'])){
  if(strlen($_POST['username'])==0 || strlen($_POST['password'])==0 ){
    $_SESSION['loginerror']="All fields are mandatory";
    header('Location: login.php');
    return;
  }
  else{

  $stmt=$pdo->prepare('SELECT * from users where username=:uname');
  $stmt->execute(array(':uname'=>$_POST['username']));
  $row=$stmt->fetch(PDO::FETCH_ASSOC);



  if($row==false){
    $_SESSION['loginerror']="Enter valid username";
    header('Location: login.php');
    return;

  }
  else{
    $inp_pass_hash=hash('md5',$_POST['password']);

    if($inp_pass_hash!==$row['password']){
      $_SESSION['loginerror']="Enter correct password";
      header('Location: login.php');
      return;

    }
    else{
      $_SESSION['success']='Login successful.Book <a href="booking.php">here!</a>';
      $_SESSION['logged']=1;
      $_SESSION['user']=$_POST['username'];
      $_SESSION['id']=$row['id'];
      $_SESSION['uniqueid']=$row['uniqueid'];
      header('Location: index.php');
      return;

    }


  }


}
}

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Login</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="scripts/jquery-3.5.1.js" charset="utf-8"></script>
   </head>
   <body>
     <br><br><br><br>
    <!-- <div class="jumbotron jumbotron-fluid"  align="center" style=" background-image:url('../images/headmic.jpg');background-size: 100% auto; background-repeat:no-repeat" id="payment_home">-->
        <div class="container">
            <h3 class="display-4 text align-center" style="color:#000000;">Login to <br>  Comedy Festival</h3>
       </div>


      <!-- Login prompt -->


      <div id="login-wrapper" class="container" style="text-align:center">





        <div id="login" class="form-group">
          <?php
            if (isset($_SESSION['loginerror'])){
              echo("<p style='color:red'>".$_SESSION['loginerror']."</p>");
              unset($_SESSION['loginerror']);
            }
            else{
              echo("<p><br></p>");
            }
           ?>
          <form method="post">
            <label for="username">Username</label>
            <input type="text" name="username"><br>
            <label for="password">Password</label>
            <input type="password" name="password" ><br>
            <input type="submit" name="login" value="Login">



          </form>

        </div>
        Not a Member?<a href="newmember.php">Sign Up</a> now.<br>
        <div class="container">
          <br><br>
          <a href="index.php">Back</a>
        </div>
        </div>


          <img style="float:right;vertical-align:middle;" src="../images/mic-right.png" alt="Standup Comedy">






      <div id="breaklines">
        <br><br><br><br><br><br><br><br><br><br><br><br>


      </div>


<!--
     <footer class="page-footer font-small teal pt-4" style="background-color:black">
       <div class="container-fluid text-center text-md-left">
       <div class="row">
                 <div class="col-md mt-md-0 mt-3" align="center">
             <p class="font-weight-normal" style="color:#8c8c8c;">Made with</p> <p style="color:red;">&#10084;</p><p style="color:#8c8c8c;"> by Aditya Kane and Shantanu Deshpande</p>

           </div>

           <hr class="clearfix w-100 d-md-none pb-3">
         </div>

       </div>

       <div class="footer-copyright text-center py-3"></div>

   </footer>
-->

     <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

   </body>
 </html>
