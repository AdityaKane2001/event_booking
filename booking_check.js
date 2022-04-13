var nameFlag=0;
var phoneFlag=0;
var dayFlag=0;
var seatFlag=0;

var daysstr=" ";


//var nameobj=document.getElementById('full_name');
//var name=nameobj.value;
//var phobj=document.getElementById('phone_number');
//var phno=phobj.value;
//var checkobj2=document.getElementById('Nov2');
//var checkobj3=document.getElementById('Nov3');
//var checkobj4=document.getElementById('Nov4');
//var checkobj5=document.getElementById('Nov5');

//var objpin=document.getElementById('pincode');
//var pin=objpin.value;




  //var nameobj=document.getElementById('full_name');
  //var name=nameobj.value;
  //var phobj=document.getElementById('phone_number');
  //var phno=phobj.value;
  //var checkobj2=document.getElementById('Nov2');
  //var checkobj3=document.getElementById('Nov3');
  //var checkobj4=document.getElementById('Nov4');
  //var checkobj5=document.getElementById('Nov5');

function emailcheck(){

var emailobj=document.getElementById('email');
var email_id=emailobj.value;

if(email_id.length==0 || email_id.indexOf('@')==-1){
  emailobj.style.border = '6px solid red';
}else {
    emailobj.style.border = '6px solid green';
}


}



function name_check() {

  var nameobj=document.getElementById('full_name');
  var name=nameobj.value;


    if (name.length == 0){
    nameobj.style.border = '6px solid red';
    nameFlag=1;
      } else {
        nameobj.style.border = '6px solid green';
    	nameFlag=0;
      }
    }

function phnocheck(){

    var phobj=document.getElementById('phone_number');
    var phno=phobj.value;

    if (phno.length != 10 || isNaN(phno)==true){
    phobj.style.border = '6px solid red';
    phoneFlag=1;
      } else {
        phobj.style.border = '6px solid green';
    	phoneFlag=0;
      }
  }

function pincheck(){
  var objpin=document.getElementById('pincode');
  var pin=objpin.value;
  if(isNaN(pin)||pin.length<6||pin.length==0){
    objpin.style.border = '6px solid red';

  }
  else{
  objpin.style.border = '6px solid green';

  }

}

function daycheck(){

var checkobj2=document.getElementById('Nov2');
var checkobj3=document.getElementById('Nov3');
var checkobj4=document.getElementById('Nov4');
var checkobj5=document.getElementById('Nov5');

if (checkobj2.checked==true || checkobj3.checked==true || checkobj4.checked==true || checkobj5.checked==true){

dayFlag=0;
}else{
  dayFlag=1;
  alert("Please select atleast one day");
}


  }

function seatcheck(){

var objseat=document.getElementById('numberofseats');
var seats=objseat.value;

if (seats==0 || seats=="" || seats>9){
  objseat.style.border = '6px solid red';
  seatFlag=1;
    } else {
      objseat.style.border = '6px solid green';
    seatFlag=0;
}

}




function submitfunction(){
  var objseat=document.getElementById('numberofseats');
  var seats=objseat.value;

  if (seats==0 || seats==""){
    objseat.style.border = '6px solid red';
    seatFlag=1;
      } else {
        objseat.style.border = '6px solid green';
      seatFlag=0;
  }

var days=0;
var objaddr=document.getElementById('address');
var addr=objaddr.value;

var objfood=document.getElementById('yesfood');
var food;

var objpin=document.getElementById('pincode');
var pin=objpin.value;
if(isNaN(pin)||pin.length==0){
  objpin.style.border = '6px solid red';
  alert('Please enter valid details');
  return false;
}
else{
objpin.style.border = '6px solid green';

}


if (objfood.checked==true){

 food=1;
}else{

 food=0;
}


  var checkobj2=document.getElementById('Nov2');
  var checkobj3=document.getElementById('Nov3');
  var checkobj4=document.getElementById('Nov4');
  var checkobj5=document.getElementById('Nov5');

  if (checkobj2.checked==true){
    days+=1;
    daysstr+=" 2 November <br>";
  }
  if (checkobj3.checked==true){
    days+=1;
    daysstr+=" 3 November <br>";
  }
  if (checkobj4.checked==true){
    days+=1;
    daysstr+=" 4 November <br>";
  }
  if (checkobj5.checked==true){
    days+=1;
    daysstr+=" 5 November <br>";
  }

  if (checkobj2.checked==true || checkobj3.checked==true || checkobj4.checked==true || checkobj5.checked==true){

  dayFlag=0;
  }else{
    dayFlag=1;
    alert("Please select atleast one day");
    return false;
  }

  var emailobj=document.getElementById('email');
  var email_id=emailobj.value;

  if(email_id.length==0 || email_id.indexOf('@')==-1){
    emailobj.style.border = '6px solid red';
    alert("Please enter valid email address");
    return false;
  }else {
      emailobj.style.border = '6px solid green';
  }


  var nameobj=document.getElementById('full_name');
  var name=nameobj.value;


    if (name.length == 0){
    nameobj.style.border = '6px solid red';
    nameFlag=1;
      } else {
        nameobj.style.border = '6px solid green';
    	nameFlag=0;
      }

  var phobj=document.getElementById('phone_number');
  var phno=phobj.value;

  if (phno.length != 10 || isNaN(phno)==true){
  phobj.style.border = '6px solid red';
  phoneFlag=1;
    } else {
      phobj.style.border = '6px solid green';
    phoneFlag=0;
    }


  if (phoneFlag!=0 || nameFlag!=0 || dayFlag!=0 || seatFlag!=0)
  {

    alert("Enter valid details");
  }
  else{


    var objemail=document.getElementById('email');
    var email_id=objemail.value;


  var objvip=document.getElementById('vip');
  if (objvip.checked==true){

    var vip=1;
  }
  else{
    var vip=0;
  }

  if (vip==0){
    var cost=seats*days*900 + food*500;
  }
  else{var cost=seats*days*1200 +food*500;
}



    sessionStorage.setItem("username",name);
    sessionStorage.setItem("useraddr",addr);
    sessionStorage.setItem("userphno",phno);
    sessionStorage.setItem("userseats",seats);
    sessionStorage.setItem("userdays",days);
    sessionStorage.setItem("userfood",food);
    sessionStorage.setItem("uservip",vip);
    sessionStorage.setItem("userpin",pin);
    sessionStorage.setItem("usercost",cost);
    sessionStorage.setItem("userdaysstr",daysstr);
    sessionStorage.setItem("useremail",email_id);




    alert("Form submitted successfully");
    return true;



  }
}
