<?php
require 'payment_process.php';

if(!isset($_SESSION['logged']))
{
  die('<div class="container" style="text-align:center"><h1>Please login to continue</h1></div>');
}



 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-toggleable-md fixed-top navbar-inverse" style="background-color:#0d0d0d;">
      <div class="container">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#mainNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
          <div class="navbar-nav">
            <a class="nav-item nav-link active s" href="index.php" style="font-size:15px">Home</a>
          </div>  </div> </div> </nav>

    <div class="jumbotron jumbotron-fluid" style=" background-image:url('./images/headmic.jpg'); background-size: 100% auto; background-repeat:no-repeat" id="booking_home">
      <h1 align="center" style="color:#cccccc;"><br>Booking for Comedy Festival 2022</h1>
    </div>

    <div class="container">
      <p class="lead"> Note: The seats for all events is based on first come-first serve basis.The Management is not in any way responsible for any person not recieveing a desired position in the audience.<br>The attendees are advised to arrive at the location well in advance to avoid any dissapointments. </p>
    </div><br>
      <div class="container">

        <form id="myForm" name='myForm' method="post" >


          <?php
            if (isset($_SESSION['bookingerror'])){
              echo("<p style='color:red'>".$_SESSION['bookingerror']."</p>");
              unset($_SESSION['bookingerror']);
            }
            else{
              echo("<p><br></p>");
            }
           ?>

          <h3>Personal Details</h3><br>
        <div class="form-group">
          <div class="form-group row">
            <div class="col-md-2">
              <label  >Name : </label>
            </div>
            <div class="col-md-10">
              <input type="text" name="full_name" id="full_name" placeholder="Surname First name" onKeyUp="name_check()"
              value="<?php if(isset($full_name)){echo($full_name);}  ?>"
                >
              </div>
            </div>
<br>
            <div class="form-group row">
              <div class="col-md-2">
                <label  >Email ID : </label>
              </div>
              <div class="col-md-10">
                <input type="text" id="email" name="email" placeholder="Enter valid email id"  onkeyup="emailcheck()"
                value="<?php if(isset($email)){echo($email);}  ?>">
                </div>
              </div>
<br>
            <div class="form-group row">
              <div class="col-md-2">
                <label for="address"  >Full address for correspondance:</label>
              </div>
              <div class="col-md-10">
                <textarea id="address" name="address" rows="4" cols="80" placeholder="Your address here"><?php if(isset($address)){echo($address);}  ?></textarea>
              </div>

          </div>
          <br>

          <div class="form-group row">
            <div class="col-md-2">
              <label >Pincode:</label>
            </div>
            <div class="col-md-10">
              <input type="text" id="pincode" name="pincode" maxlength="6" onkeyup="pincheck()"
              value="<?php if(isset($pincode)){echo($pincode);}  ?>"></input>
            </div>
        </div>

<br>
          <div class="form-group row">
            <div class="col-md-2">
              <label for="phone_number">Phone number for contact<br>(Preferrably WhatsApp number)</label>
            </div>
            <div class="col-md-10">
              <input type="text" id="phone_number" name="phone_number" placeholder="Your phone number here" onKeyUp="phnocheck()" maxlength="10"
              value="<?php if(isset($phone)){echo($phone);}  ?>"></input>
            </div>
              <br><br><br><br><br><br>
              </div>
              <h3>Preferences</h3>
              <br>


              <div class="form-group row">
                <div class="col-md-2">
                    <label >Number of seats :</label></div>
              <div class="col-md-10">
                <input type="number" id="numberofseats" name="numberofseats" min=1 max=9 maxlength="1" onKeyUp="seatcheck()">

                </div>
                </div>


            <div class="form-group row">
              <div class="col-md-2">
                <label >Please select type of seat:</label><br>
              </div>
              <div class="col-md-10">

            <input type="radio" id="standard" name="seat" value="standard" checked>
            <label >Standard</label><br>
            <input type="radio" id="vip" name="seat" value="vip">
            <label >VIP</label><br>


          </div>
          <br>
        </div><br>

        <div class="form-group row">
          <div class="col-md-2">
            Select the days you want to attend the festival:
          </div>

          <div class="col-md-10">
            <input type="checkbox" id="Nov2" name="days[]" value="2">
            <label > 2 November</label><br>
            <input type="checkbox" id="Nov3" name="days[]" value="3">
            <label> 3 November</label><br>
            <input type="checkbox" id="Nov4" name="days[]" value="4">
            <label> 4 November</label><br>
            <input type="checkbox" id="Nov5" name="days[]" value="5">
            <label> 5 November</label>

          </div>

        </div>
          <br>
        <div class="form-group row">
          <div class="col-md-8">
            Would you like to avail the Food Pass&trade; ?
            </div>
            <div class="col-md-4">


            <input type="radio" id="yesfood" name="food" checked value="1">
            <label >Yes &nbsp;&nbsp;&nbsp;&nbsp;  </label>
            <input type="radio" id="nofood" name="food" value="0">
            <label >No</label><br>
            </div>
            </div>
<br>
            <div class="form-group row">
              <div class="col-md-8">
                Would you like to subscribe to our newsletter ?
                </div>
                <div class="col-md-4">


                <input type="radio" id="yesnews" name="news" checked>
                <label >Yes &nbsp;&nbsp;&nbsp;&nbsp;  </label>
                <input type="radio" id="nonews" name="news">
                <label >No</label><br>
                </div>
              </div>
      </div>
      <div align="center">
      <br><br>
      <input type="submit" name="booking_submit" class="form-submit-button "
      style="border-radius: 10px;  font-size: 25px; font-family:Helvetica;"
      onclick="return submitfunction();"
      value="Proceed to payment">
    </div>

          </form>

          <br><br>

          <style>
          .form-submit-button {
          background-color: #0073e6;
          transition-duration: 0.4s;
          }

          .form-submit-button:hover {

          background-color: white;
          }
          </style>
          <div align="center">
          <br><br></div>





      </div>
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




    <script type="text/javascript" src="booking_check.js"></script>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

  </body>
</html>
