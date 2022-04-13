<?php
session_start();
require_once 'pdo.php';



if(isset($_POST['signup'])){
  $stmt=$pdo->prepare('SELECT * from users where username=:uname');
  $stmt->execute(array(':uname'=>$_POST['username']));
  $row=$stmt->fetch(PDO::FETCH_ASSOC);
  echo($row);

  if(strlen($_POST['username'])==0 || strlen($_POST['password'])==0 || strlen($_POST['confirmpassword'])==0){
    $_SESSION['signuperror']="All fields are mandatory";
    header('Location: newmember.php');
    return;
  }
  else if($_POST['password']!=$_POST['confirmpassword']){
    $_SESSION['signuperror']="The passwords do not match";
    header('Location: newmember.php');
    return;

  }else if($row['username']==$_POST['username']){
    $_SESSION['signuperror']="User already exists. Please login.";
    header('Location: newmember.php');
    return;

  }


  else{
    $randno=rand(1000000000,9999999999);
    $_SESSION['uniqueid']=$randno;
    $stmt=$pdo->prepare('INSERT INTO users (username,password,uniqueid) VALUES (:uname,:pass,:uid)');
    $stmt->execute(array(':uname'=>$_POST['username'],':pass'=>hash('md5',$_POST['password']),':uid'=>$randno));
    $_SESSION['success']='Sign Up successful,please <a href="login.php">login</a>';

    header('Location:index.php');
    return;

  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

  </head>
  <body>
      <div class="container">
        <br>
        <p class='lead' style='font-size:50px'>Sign Up</p>
        <div >
          <?php
          if (isset($_SESSION['signuperror'])){
            echo("<p style='color:red'>".$_SESSION['signuperror']."</p>");
            unset($_SESSION['signuperror']);
          }
          else{
            echo("<p><br></p>");
          }

           ?>
        </div>
      <div class="row">


       <div class="form-group cols-3">
         <form  method="post">
          <label for="username">Username</label><br><br>
          <label for="password">Password</label><br><br>
          <label for="confirmpassword">Confirm Password</label><br><br>
          <input type="submit" name="signup" value="Sign Up">
          </div>
          <div class="form-group cols-3">


              <input type="text" name="username"><br><br>

              <input type="password" name="password" ><br><br>

              <input type="password" name="confirmpassword" ><br><br>

            </form>

          </div>

          </div>
          <p class='lead' style='font-size:15px'>By clicking 'Sign Up' ,you agree to our EULA(End User License Agreement) and Terms of Service.</p>
          <a href="index.php">Back to Home</a><br>
          <a href="login.php">Log in instead</a>
            <img style="float:right;vertical-align:middle;" src="./images/mic-right.png" alt="Standup Comedy">





      </div>
  <!--     <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
     --> <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

  </body>
</html>
