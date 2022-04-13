<?php
require 'payment_process.php';
if(!isset($_SESSION['logged']))
{
  die('<div class="container" style="text-align:center"><h1>Please login to continue</h1></div>');
}


?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>



  <body onload="myOnloadFunction();">
    <nav class="navbar navbar-toggleable-md fixed-top navbar-inverse" style="background-color:#0d0d0d;">
      <div class="container">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#mainNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
          <div class="navbar-nav">
            <a class="nav-item nav-link active " href="index.html" style="font-size:12px">Home</a>
          </div>  </div> </div> </nav>



		<div class="jumbotron jumbotron-fluid"  align="center" style=" background-image:url('../images/headmic.jpg');background-size: 100% auto; background-repeat:no-repeat" id="payment_home">
			 <div class="container">
				<h1 class="display-4 text align-center" style="color:#cccccc;">Welcome to  &nbsp;&nbsp;&nbsp; WizPay Client</h1>
			</div>
		</div>
    <div class="container">
          <h3>Reciept </h3>
    </div>

    <br><br>
    <div class="container">
      <p class="lead">Do not press home or back button<p>
      <table class="table">
    <thead>
      <tr>
        <th></th>
        <th>Quantity</th>
        <th>Cost</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">Seats</th>
        <td ><script type="text/javascript" >document.write(sessionStorage.getItem("userseats"));</script></td>
        <td ><script  type="text/javascript">if (sessionStorage.getItem("uservip")==0){

        document.write("900");}
        else{
      document.write("1200");}</script> </td>
        <td ><script type="text/javascript" >if (sessionStorage.getItem("uservip")==0){
          var cost=sessionStorage.getItem("userseats")*900;
        document.write(cost);}
        else{var cost=sessionStorage.getItem("userseats")*1200;
      document.write(cost);} </script> </td> </td>
      </tr>
      <tr>
        <th scope="row">Food</th>
        <td><script  type="text/javascript">
          var f;
          if (sessionStorage.getItem("userfood")==1){
            document.write("Yes");
            f=1;
          }
          else{document.write("No");
          f=0;}
        </script>  </td>
        <td><script  type="text/javascript">document.write("500");</script></td>
        <td><script  type="text/javascript"> document.write(500*f);</script>  </td>

      </tr>
      <tr>
        <th scope="row">Days</th>
        <td><script type="text/javascript" >document.write(sessionStorage.getItem("userdays"));</script></</td>
        <td><script type="text/javascript">
        if (sessionStorage.getItem("uservip")==0){
          var cost=sessionStorage.getItem("userseats")*900;
        }
        else{var cost=sessionStorage.getItem("userseats")*1200;
      }
        document.write(cost + " for " + sessionStorage.getItem("userdays") + " days"); </script></td>
        <td><script type="text/javascript">
        if (sessionStorage.getItem("uservip")==0){
          var cost=sessionStorage.getItem("userseats")*sessionStorage.getItem("userdays")*900;
        document.write(cost);}
        else{var cost=sessionStorage.getItem("userseats")*sessionStorage.getItem("userdays")*1200;
      document.write(cost);}</script></td>
      </tr>

      <tr>
        <td></td>
        <th scope="row" colspan="2"><strong>TOTAL</strong></th>
        <td> <script type="text/javascript"> document.write((500*f)+(cost)); </script> </td>
      </tr>
    </tbody>
  </table>
</div><br><br>

			<div class="container">
				<h3>Choose your payment method</h3><br><br>
						<a class="btn btn-primary" role="button" onclick="showCreditDebitUpi('CreditCard')">Credit Card</a>
						<a class="btn btn-primary" role="button" onclick="showCreditDebitUpi('DebitCard')">Debit Card</a>
						<a class="btn btn-primary" role="button" onclick="showCreditDebitUpi('upi')" hidden>UPI</a>

			</div>
		<br><br>
		<div class="container">
			<form id="CreditCard" method="post" >
				  <h3>Enter your credit card details:</h3>
				  <div class="form-group col-md-6">
					<label for="cardnumber">Credit Card number:</label>
					<input type="text" class="form-control" id="ccnumber" placeholder="XXXXXXXXXXXXXXXX" onKeyUp="checkNumber('ccnumber')" maxlength="16">
				  </div>
				  <div class="form-group col-md-6">
					<label for="holdername">Card Holder Name:</label>
					<input type="text" class="form-control" id="ccname" placeholder="ABCD EFGH" onKeyUp="checkName('ccname')">
				  </div>
				  <div class="form-group col-md-2">
					<label for="cvv">Enter CVV:</label>
					<input type="password" class="form-control" id="cvv" onKeyUp="checkCvv('cvv')" maxlength="3">
				  </div>
				  <div class="form-row">
			         <div class="form-group col-md-2">
					   <label for="expmonth">Expiry Month:</label>
					   <select id="expmoth" class="form-control">
						 <option>01</option>
						 <option>02</option>
						 <option>03</option>
						 <option>04</option>
						 <option>05</option>
						 <option>06</option>
						 <option>07</option>
						 <option>08</option>
						 <option>09</option>
						 <option>10</option>
						 <option>11</option>
						 <option>12</option>
					   </select>
					 </div>
					 <div class="form-group col-md-2">
					   <label for="expyear">Expiry Year:</label>
					   <select id="expyear" class="form-control">
						 <option>2022</option>
						 <option>2021</option>
						 <option>2022</option>
						 <option>2023</option>
						 <option>2024</option>
						 <option>2025</option>
						 <option>2026</option>
						 <option>2027</option>
						 <option>2028</option>
						 <option>2029</option>
						 <option>2030</option>
					   </select>
				     </div>
				  </div>

          	<input type="submit" name="payment_submit" id="ccb" class="btn btn-primary my-2" onclick="event.preventDefault;return submitForm('credit');" value="Submit">

			</form>

		</div>

		<div class="container">
			<form id="DebitCard" method="post">
				  <h3>Enter your debit card details:</h3>
				  <div class="form-group col-md-6">
					<label for="dcardnumber">Debit Card number:</label>
					<input type="text" class="form-control" id="dcnumber" placeholder="XXXXXXXXXXXXXXXX" onKeyUp="checkNumber('dcnumber')" maxlength="16">
				  </div>
				  <div class="form-group col-md-6">
					<label for="dholdername">Card Holder Name:</label>
					<input type="text" class="form-control" id="dcname" placeholder="ABCD EFGH" onKeyUp="checkName('dcname')">
				  </div>
				  <div class="form-group col-md-2">
					<label for="cvv">Enter CVV:</label>
					<input type="password" class="form-control" id="dcvv" onKeyUp="checkCvv('dcvv')" maxlength="3">
				  </div>
				  <div class="form-row">
			         <div class="form-group col-md-2">
					   <label for="expmonth">Expiry Month:</label>
					   <select id="expmoth" class="form-control">
						 <option>01</option>
						 <option>02</option>
						 <option>03</option>
						 <option>04</option>
						 <option>05</option>
						 <option>06</option>
						 <option>07</option>
						 <option>08</option>
						 <option>09</option>
						 <option>10</option>
						 <option>11</option>
						 <option>12</option>
					   </select>
					 </div>
					 <div class="form-group col-md-2">
					   <label for="expyear">Expiry Year:</label>
					   <select id="expyear" class="form-control">
						 <option>2022</option>
						 <option>2021</option>
						 <option>2022</option>
						 <option>2023</option>
						 <option>2024</option>
						 <option>2025</option>
						 <option>2026</option>
						 <option>2027</option>
						 <option>2028</option>
						 <option>2029</option>
						 <option>2030</option>
					   </select>
				     </div>
				  </div>


          <input type="submit" name="payment_submit" id="dcb" class="btn btn-primary my-2" onclick="event.preventDefault; return submitForm('debit');" value="Submit">
			</form>

		</div>
<!--
		<div id="upi" class="container" >
			<h3>Choose UPI App:</h3><br>
			<img class="mx-2"src="../images/gpay.png" class="card-img-top" alt="Google Pay" onclick="UpiIdText()" ></img>
			<img class="mx-2"src="../images/paytm.png" class="card-img-top" alt="Paytm" onclick="UpiIdText()"></img>
			<img class="mx-2"src="../images/phonepe.png" class="card-img-top" alt="PhonePe" onclick="UpiIdText()"></img>
			<img class="mx-2"src="../images/bhim.png" class="card-img-top" alt="BHIM" onclick="UpiIdText()"></img>
		</div>

		<div id="UpiId" style="display:none">
			<form id="UpiId" method="post">
				<div class="form-group col-md-6">
				<label for="upiid">Enter UPI ID:</label>
				<input type="text" class="form-control" id="upiid" placeholder="abcde@okxyz">
				</div>
			</form>
		<input name="payment_submit" type="submit" class="btn btn-primary my-2 mx-2" onclick="return upiApp();" value="Submit">
		</div>
<br><br><br>
-->
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
  --><script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<script src="check.js"></script>



  </body>
</html>
