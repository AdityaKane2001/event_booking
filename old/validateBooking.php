<?php


function validateDetails(){
  if(strlen($_POST['full_name'])==0){
    $_SESSION['bookingerror']='All fields are mandatory';
    return false;
  }

   else if(strlen($_POST['email'])==0){
    $_SESSION['bookingerror']='All fields are mandatory';
    return false;
  }

  else if(strpos($_POST['email'],'@'==false)){
    $_SESSION['bookingerror']='Enter valid email address';
    return false;

  }

   else if(strlen($_POST['address'])==0){
    $_SESSION['bookingerror']='All fields are mandatory';
    return false;
  }
  else if(strlen($_POST['pincode'])<6){
    $_SESSION['bookingerror']='All fields are mandatory';
    return false;
  }

  else if(strlen($_POST['phone_number'])<10){
    $_SESSION['bookingerror']='All fields are mandatory';
    return false;
  }

  else if(strlen($_POST['numberofseats'])==0 || $_POST['numberofseats']>9){
    $_SESSION['bookingerror']='Please enter valid number of seats';
    return false;
  }

  else if(sizeof($_POST['days'])==0){
    $_SESSION['bookingerror']='Please select atleast one day';
    return false;
  }
  else{
    return true;

  }

}


?>
