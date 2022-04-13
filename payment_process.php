<?php
session_start();
require_once 'pdo.php';
require_once 'validateBooking.php';

$check=$pdo->prepare('SELECT * from user_info where id=:id');
$check->execute(array(':id'=>$_SESSION['id']));
$row=$check->fetch(PDO::FETCH_ASSOC);

//Personal Details
if($row!=false){
  $full_name=$row['name'];
  $email=$row['email'];
  $address=$row['address'];
  $pincode=$row['pincode'];
  $phone=$row['phone'];

  if(isset($_POST['booking_submit'])){
    $seats=$_POST['numberofseats'];
    $days='';
    foreach ($_POST['days'] as $day) {
        $days=$days.$day.",";
    }
    $type=$_POST['seat'];
    if($_POST['food']==0){$foodpass=0;}
    else{$foodpass=1;}
    $money=0;
    if($type=='standard'){
      $money=$seats*strlen($days)*900 + $foodpass*500;

    }
    else{
      $money=$seats*strlen($days)*1200 + $foodpass*500;

    }

    $_SESSION['info']=array($seats,$days,$type,$foodpass,$money);

  if(!validateDetails()){
    header('Location:booking.php');
    return;
  }
  else{

    $details=$pdo->prepare('UPDATE user_info set name=:name,email=:email,
                          address=:address,pincode=:pincode,phone=:phone
                            where id=:id  ');
    $details->execute(array(':id'=>$_SESSION['id'],
                            ':name'=>$_POST['full_name'],
                            ':email'=>$_POST['email'],
                            ':address'=>$_POST['address'],
                            ':pincode'=>$_POST['pincode'],
                            ':phone'=>$_POST['phone_number']));

      echo("submitted");
      unset($_POST['booking_submit']);
      header('Location:payment.php');
      return;

}}}
 if($row==false){

if(isset($_POST['booking_submit'])){

if(!validateDetails()){
  header('Location:booking.php');
  return;
}
else{

  $seats=$_POST['numberofseats'];
  $days=',';
  foreach ($_POST['days'] as $day) {
      $days=$days.",".$day;
  }
  $type=$_POST['seat'];
  if($_POST['food']==0){$foodpass=0;}
  else{$foodpass=1;}
  $money=0;

  if($type=='standard'){
    $money=$seats*strlen($days)*900 + $foodpass*500;

  }
  else{
    $money=$seats*strlen($days)*1200 + $foodpass*500;

  }

  $_SESSION['info']=array($seats,$days,$type,$foodpass,$money,$randno);

  $details=$pdo->prepare('INSERT INTO user_info (id,name,email,address,pincode,phone)
                          values (:id,:name,:email,:address,:pincode,:phone)');
  $details->execute(array(':id'=>$_SESSION['id'],
                          ':name'=>$_POST['full_name'],
                          ':email'=>$_POST['email'],
                          ':address'=>$_POST['address'],
                          ':pincode'=>$_POST['pincode'],
                          ':phone'=>$_POST['phone_number']));

    echo("submitted");
    unset($_POST['booking_submit']);
    header('Location:payment.php');
    return;


}
}
}

//Preference details


//money calculation




//final append

if(isset($_POST['payment_submit'])){
  $trans=$pdo->prepare('INSERT INTO transactions (tid,uid,seats,type,days,foodpass,uniqueid)
                          VALUES (DEFAULT,:uid,:seats,:type,:days,:foodpass,:unid)');
  $trans->execute(array(':uid'=>$_SESSION['id'],
                        ':seats'=>$_SESSION['info'][0],
                        ':days'=>$_SESSION['info'][1],
                        ':type'=>$_SESSION['info'][2],
                        ':foodpass'=>$_SESSION['info'][3],
                        ':unid'=>$_SESSION['uniqueid']
  ));

  $fortid=$pdo->prepare('SELECT max(tid) as max FROM transactions where uid=:uid');
  $fortid->execute(array(':uid'=>$_SESSION['id']));
  $row=$fortid->fetch(PDO::FETCH_ASSOC);
  $tid=$row['max'];

  $monstmt=$pdo->prepare('INSERT INTO money (uid,tid,total) values (:uid,:tid,:mon)');
  $monstmt->execute(array(':uid'=>$_SESSION['id'],':tid'=>$tid,':mon'=>$_SESSION['info'][4]));


  header('Location: ticket.php');
  return;



}
?>
