var flagNumber=0;
var flagCvv=0;
var flagName=0;
//var cardNumber = document.getElementById('ccnumber');
//var cvvNumber = document.getElementById('cvv');

var upiId = document.getElementById('upiId');

function checkNumber(id){
var cardNumber = document.getElementById(id);
var cardValue=cardNumber.value;
if(!cardValue || isNaN(cardValue) || cardValue.length!=16 ){
cardNumber.style.border = '6px solid red';
flagNumber=1;
  } else {
    cardNumber.style.border = '6px solid green';
	flagNumber=0;
  }
}

function checkCvv(id){
var cvvNumber = document.getElementById(id);
var cvvValue=cvvNumber.value;
if(!cvvValue || isNaN(cvvValue) || cvvValue.length!=3 ){
cvvNumber.style.border = '6px solid red';
flagCvv=1;
  } else {
    cvvNumber.style.border = '6px solid green';
	flagCvv=0;
  }
}

function checkName(id) {
//var letters = /^[A-Za-z]+$/;
//alert(id);
var name = document.getElementById(id);
var nameValue=name.value;
if(nameValue.length==0){
name.style.border = '6px solid red';
flagName=1;
  } else {
    name.style.border = '6px solid green';
	flagName=0;
  }
}

function checkUpi() {
var upiIdValue=upiId.value;
if(!upiIdValue ){
upiId.style.border = '6px solid red';
flag=1;
  } else {
    upiId.style.border = '6px solid green';
    flag=0;

  }
}

function submitForm(id) {
	if(id=='credit'){
		var cardNumber = document.getElementById('ccnumber');
		var cvvNumber = document.getElementById('cvv');
		var cardName = document.getElementById('ccname');
		if(cardNumber.value == "" || cardNumber.value.length<16|| isNaN(cardNumber.value.length) ){
		cardNumber.style.border = '6px solid red';
    var cflagNumber=1;

		//alert('aaa');
  }else if( cardName.value == "" || cardName.value.length==0 ){
		cardName.style.border = '6px solid red';
    var cflagName=1;

  }else if(cvvNumber.value == "" || cvvNumber.value.length<3|| isNaN(cvvNumber.value.length) ){
		cvvNumber.style.border = '6px solid red';

    var cflagCvv=1;
		}

    if(cflagCvv==1 || cflagNumber==1 || cflagName==1){
		alert("Please enter valid details");
    ('hi');
    return false;
		}else{
		alert("OK");
    return true;
	}
	}else if(id=='debit'){
		var cardNumber = document.getElementById('dcnumber');
		var cvvNumber = document.getElementById('dcvv');
		var cardName = document.getElementById('dcname');
		if(cardNumber.value == "" || cardNumber.value.length<16 || isNaN(cardNumber.value.length)){
		cardNumber.style.border = '6px solid red';
    var dflagNumber=1;
  }else if( cardName.value == "" || cardName.value.length==0 ){
		cardName.style.border = '6px solid red';
    var dflagName=1;
  }else if(cvvNumber.value == "" || cvvNumber.value.length<3|| isNaN(cvvNumber.value.length)){
		cvvNumber.style.border = '6px solid red';
    var dflagCvv=1;
		}
		if(dflagCvv==1 || dflagNumber==1 || dflagName==1){
		alert("Please enter valid details");
		return false;
		}else{
		alert("OK");
    return true;

		}
	}
}

function showCreditDebitUpi(id){
	var CreditCard=document.getElementById("CreditCard");
	var DebitCard=document.getElementById("DebitCard");
	var upi=document.getElementById("upi");
	var UpiId=document.getElementById("UpiId");
	var ccb=document.getElementById("ccb");
	var dcb=document.getElementById("dcb");
	if(id=="CreditCard"){
		//var DebitCard=document.getElementById("DebitCard");
		CreditCard.style.display = "block";
		DebitCard.style.display = "none";
		upi.style.display="none";
		UpiId.style.display="none";
		dcb.style.display="none";
		ccb.style.display="block";
	}else if(id=="DebitCard"){
		//var DebitCard=document.getElementById("DebitCard");
		CreditCard.style.display = "none";
		DebitCard.style.display = "block";
		upi.style.display="none";
		UpiId.style.display="none";
		ccb.style.display="none";
		dcb.style.display="block";
	}else if(id=="upi"){
		//var DebitCard=document.getElementById("DebitCard");
		CreditCard.style.display = "none";
		DebitCard.style.display="none";
		upi.style.display="block";
		UpiId.style.display="none";
		ccb.style.display="none";
		dcb.style.display="none";
	}
	//var hideAndShow=document.getElementById(id);
	//if (hideAndShow.style.display === "none") {
   // hideAndShow.style.display = "block";
 // } else {
  //  hideAndShow.style.display = "none";
 // }
}



//$('#DebitCard').submit(function () {
	//return submitForm('debit');

//});

function upiApp(){
	var upiText=document.getElementById("upiid");
	if(upiText.value==""){
		alert("Please Enter valid UPI ID");
    return false;
	}else{
	alert("Please open your UPI App and Approve the transaction");
  return true;
	}
}

function myOnloadFunction(){
	var CreditCard=document.getElementById("CreditCard");
	var DebitCard=document.getElementById("DebitCard");
	var upi=document.getElementById("upi");
	var ccb=document.getElementById("ccb");
	var dcb=document.getElementById("dcb");
	CreditCard.style.display = "block";
	DebitCard.style.display = "none";
	upi.style.display="none";
	ccb.style.display="block";
	dcb.style.display="none";


}
function UpiIdText(){
	var UpiId=document.getElementById("UpiId");
	UpiId.style.display="block";
}
