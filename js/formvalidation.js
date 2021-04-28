function duplicate(value)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		if(xmlhttp.responseText!="") {
			document.getElementById("err-email").innerHTML=xmlhttp.responseText;
			return false;
		}
		else
			return true;
    }
  }
xmlhttp.open("POST","php/duplicate.php",true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("value="+value);
 }
 
 
 function validate(value)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		if(xmlhttp.responseText!="") {
			document.getElementById("err-email").innerHTML=xmlhttp.responseText;
			return false;
		}
		else
			return true;
    }
  }
xmlhttp.open("POST","php/email_valid.php",true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("value="+value);
 }

//name
function jsname() {
        var x=document.getElementById("name").value;
	var regex = /^[A-Za-z][A-Za-z0-9. ]+$/;
	if(!regex.test(x)) {
		document.getElementById("err-name").innerHTML="Invalid Name";
		return false;
	}
	else {
		document.getElementById("err-name").innerHTML="";
		return true;
	}
}
// org name
function jsorgname() {
        var x=document.getElementById("orgname").value;
	var regex = /^[A-Za-z0-9][A-Za-z0-9\_\-. ]+$/;
	if(!regex.test(x)) {
		document.getElementById("err-orgname").innerHTML="Invalid Organisation Name";
		return false;
	}
	else {
		document.getElementById("err-orgname").innerHTML="";
		return true;
	}
}

//contact name
function jscontactname() {
        var x=document.getElementById("contactname-1").value;
	var regex = /^[A-Za-z0-9][A-Za-z0-9\_\-. ]+$/;
	if(!regex.test(x)) {
		document.getElementById("err-name-1").innerHTML="Invalid Name";
		return false;
	}
	else {
		document.getElementById("err-name-1").innerHTML="";
		return true;
	}
}

//e-mail
function jsemail() {
        var x=document.getElementById("email").value;
	var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if(!regex.test(x)) {
		document.getElementById("err-email").innerHTML="Invalid Email";
		return false;
	}
	else {
		document.getElementById("err-email").innerHTML="";
		return true;
	}
}


//contact-email
function jscontactemail() {
        var x=document.getElementById("contactemail-1").value;
	var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z]+)*$/;
	if(!regex.test(x)) {
		document.getElementById("err-email-1").innerHTML="Invalid Email";
		return false;
	}
	else {
		document.getElementById("err-email-1").innerHTML="";
		return true;
	}
}


//website
function jswebsite() {
        var x=document.getElementById("website").value;
	var regex = /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)[A-Za-z0-9]+([\-\.]{1}[A-Za-z0-9]+)*\.[A-Za-z]{2,5}(:[0-9]{1,5})?(\/.*)?/;
	//var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z]+)*$/;
	if(!regex.test(x)) {
		document.getElementById("err-website").innerHTML="Invalid URL";
		return false;
	}
	else {
		document.getElementById("err-website").innerHTML="";
		return true;
	}
}

//url
function jsurl() {
        var x=document.getElementById("url").value;
	var regex = /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)[A-Za-z0-9]+([\-\.]{1}[A-Za-z0-9]+)*\.[A-Za-z]{2,5}(:[0-9]{1,5})?(\/.*)?/;
	//var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z]+)*$/;
	if(!regex.test(x)) {
		document.getElementById("err-url").innerHTML="Invalid URL";
		return false;
	}
	else {
		document.getElementById("err-url").innerHTML="";
		return true;
	}
}


//password
function jspassword() {
	var x=document.getElementById("password").value;
	var regex = /^.{5,20}$/;
	if(!regex.test(x)) {
		document.getElementById("err-password").innerHTML="Password too short or too long";
		return false;
	}
	else {
		document.getElementById("err-password").innerHTML="";
		return true;
	}
}

//repassword
function jsrepassword() {
        var x=document.getElementById("repassword").value;
        var y=document.getElementById("password").value;
	if(x!=y) {
		document.getElementById("err-repassword").innerHTML="Passwords don't match";
		return false;
	}
	else {
		document.getElementById("err-password").innerHTML="";
		return true;
	}
}

//mobile number
function jsmobile() {
	var x=document.getElementById("mobile").value;
	var regex = /^[789]\d{9}$/;
	if(!regex.test(x)) {
		document.getElementById("err-mobile").innerHTML="Invalid Mobile Number";
		return false;
	}
	else {
		document.getElementById("err-mobile").innerHTML="";
		return true;
	}
        
}

//contact mobile number
function jscontactmobile() {
        var x=document.getElementById("contactmobile-1").value;
	var regex = /^[789]\d{9}$/;
	if(!regex.test(x)) {
		document.getElementById("err-mobile-1").innerHTML="Invalid Mobile Number";
		return false;
	}
	else {
		document.getElementById("err-mobile-1").innerHTML="";
		return true;
	}
}

//availability
function jsavailability() {
	var x=document.getElementById("availability").value;
	if(x<1 || x>21) {
		document.getElementById("err-availability").innerHTML="Range 1-21";
		return false;
	}
	else {
		document.getElementById("err-availability").innerHTML="";
		return true;
	}
}

//pincode
function jspincode() {
        var x=document.getElementById("pincode").value;
	var regex = /^\d{6}$/;
	if(!regex.test(x)) {
		document.getElementById("err-pincode").innerHTML="Invalid Pincode";
		return false;
	}
	else {
		document.getElementById("err-pincode").innerHTML="";
		return true;
	}
}

//checked
function jschecked() {
	if(!document.getElementById('checked').checked) {
		document.getElementById("err-checked").innerHTML="You have to check it!";
		return false;
	}
	else {
		document.getElementById("err-checked").innerHTML="";
		return true;
	}
}

//char
function jschar(field) {
	var x=document.forms["form"][field].value;
	var regex = /^[A-Za-z]{4,}$/;
	if(!regex.test(x)) {
		document.getElementById("err-"+field).innerHTML="Invalid";
		return false;
	}
	else {
		document.getElementById("err-"+field).innerHTML="";
                alert("jschar");
		return true;
	}
}
// sector
function jssector() {
        var x=document.getElementById("sector").value;
	var regex = /^[A-Za-z0-9][A-Za-z0-9\_\-.,:; ]+$/;
	if(!regex.test(x)) {
		document.getElementById("err-sector").innerHTML="Sector Name Invalid";
		return false;
	}
	else {
		document.getElementById("err-sector").innerHTML="";
		return true;
	}
}

//title
function jstitle() {
        var x=document.getElementById("title").value;
	var regex = /^[A-Za-z0-9][A-Za-z0-9\_\-.,:; ]+$/;
	if(!regex.test(x)) {
		document.getElementById("err-title").innerHTML="Title Invalid";
		return false;
	}
	else {
		document.getElementById("err-title").innerHTML="";
		return true;
	}
}

//venue

function jsvenue() {
        var x=document.getElementById("venue").value;
	if (x==null || x=="")
	{
		document.getElementById("err-venue").innerHTML="Venue Invalid";
		return false;
	}
	else {
		document.getElementById("err-venue").innerHTML="";
		return true;
	}
}

//area
function jsarea() {
	if (document.getElementById("area").value == 0)
	{
		document.getElementById("err-area").innerHTML="Select an Area";
		return false;
	}
	else {
		document.getElementById("err-area").innerHTML="";
		return true;
	}
}

//category
function jscategory() {
	if (document.getElementById("Area").value == "others")
	{
		var x = document.getElementById("category-other").value;
		if (x==null || x=="")
  		{
  			document.getElementById("err-category").innerHTML="Category must be filled out";
  			return false;
  		}
  		else{
  			document.getElementById("err-category").innerHTML="";
  			return true;
  		}
  	}
        else 
        {
             return true;
        }
}


function jsfromdate() {
	var from = document.getElementById("from").value;
	var today = new Date();
	var yy = today.getYear();
	var year = (yy < 1000) ? yy + 1900 : yy;
	var date_month=	(today.getMonth()+1)+"";
	if(date_month.length ==1){
		date_month="0"+date_month;
	}
	var date_day=(today.getDate())+"";
	if(date_day.length ==1){
		date_day="0"+date_day;
	}
	var date = year + "-" + date_month + "-" +  date_day;
	var temp = from.lastIndexOf("-")+1;
	var fromyear = from.substr(temp, 4);
	
	var temp1 = from.indexOf("-");
	var fromday = from.substr(0, temp1);
	if ( fromday.length == 1)
	{
		fromday = "0" + fromday;
	}

	var frommonth = from.substring(temp1+1, temp-1);
	if ( frommonth.length == 1)
	{
		frommonth = "0" + frommonth;
	}
	
	var fromdate = fromyear + "-" + frommonth + "-" + fromday ; 
	if( from == null || from=="")
	{
		document.getElementById("err-from").innerHTML="Enter a valid Date";
  		return false;
  	}	
	else if( fromdate < date)
	{
		document.getElementById("err-from").innerHTML="Enter a valid Date and not a past date";
  		return false;
  	}
  	else{
  		document.getElementById("err-from").innerHTML="";
                return true;
  	}	
	
}


function jstodate() {
	var to = document.getElementById("to").value;
	var from = document.getElementById("from").value;
	if( to == null || to == "")
	{
		return true;
	}
	else
	{
		var temp = from.lastIndexOf("-")+1;
		var fromyear = from.substr(temp, 4);
		var temp1 = from.indexOf("-");
		var fromday = from.substr(0, temp1);
		if ( fromday.length == 1)
		{
			fromday = "0" + fromday;
		}
		var frommonth = from.substring(temp1+1, temp-1);
		if ( frommonth.length == 1)
		{
			frommonth = "0" + frommonth;
		}
		
		var fromdate = fromyear + "-" + frommonth + "-" + fromday ;

		// to 
		var temp = to.lastIndexOf("-")+1;
		var fromyear = to.substr(temp, 4);
		var temp1 = to.indexOf("-");
		var fromday = to.substr(0, temp1);
		if ( fromday.length == 1)
		{
			fromday = "0" + fromday;
		}
		var frommonth = to.substring(temp1+1, temp-1);
		if ( fromday.length == 1)
		{
			fromday = "0" + fromday;
		}
		var todate = fromyear + "-" + frommonth + "-" + fromday ;

		if( todate < fromdate)
		{
			document.getElementById("err-to").innerHTML="To Date should be greater than From date";
  			return false;
  		}
  		else{
  			document.getElementById("err-to").innerHTML="";
                        return true;
  		}	
		
	}

}

function categoryfn(){

	var selectedCategory = document.getElementById("Area");
	var selectedValue = selectedCategory.options[selectedCategory.selectedIndex].value;
	
	if(selectedValue == "others")
	{
		document.getElementById("category-other").removeAttribute('style');
	}
	else
	{
	 	document.getElementById("category-other").setAttribute('style', 'display:None');
	}
}

var idIncrement = 1;

$(function () {

	function removeDiv(){
	$(this).closest('div').remove(); 
	}
	
    $('input.addMore').on('click', function () {
        idIncrement++;
        var $table = $('#contactSpan');
        var $tr = $table.find('div').eq(0).clone();
        $tr.appendTo($table).find('input').val('');
        $tr.appendTo($table).find(".contactname").attr("name", "contactname-"+idIncrement);
        $tr.appendTo($table).find(".contactname").attr("id", "contactname-"+idIncrement);
        $tr.appendTo($table).find(".contactname").attr("placeholder", "Contact Name");
         $tr.appendTo($table).find(".errcontactname").attr("id", "err-name-"+idIncrement);
         
        $tr.appendTo($table).find(".contactemail").attr("name", "contactemail-"+idIncrement);
        $tr.appendTo($table).find(".contactemail").attr("id", "contactemail-"+idIncrement);
        $tr.appendTo($table).find(".contactemail").attr("placeholder", "Contact Email Address");
        $tr.appendTo($table).find(".errcontactemail").attr("id", "err-email-"+idIncrement);
        
        $tr.appendTo($table).find(".contactmobile").attr("name", "contactmobile-"+idIncrement);
        $tr.appendTo($table).find(".contactmobile").attr("id", "contactmobile-"+idIncrement);
        $tr.appendTo($table).find(".contactmobile").attr("placeholder", "Contact Mobile Number");
        $tr.appendTo($table).find(".errcontactmobile").attr("id", "err-mobile-"+idIncrement);
        
        $tr.appendTo($table).find(".remove-this-button").removeAttr("style");
        $tr.appendTo($table).find(".remove-this-button").attr("value", "Remove Contact").on("click", removeDiv);
        $tr.appendTo($table).find(".remove-this-button").css('background-color', '#CD9575');
        $tr.appendTo($table).find(".remove-this-button").attr("name","remove-this-button-"+idIncrement);        
        $tr.appendTo($table).find(".remove-this-button").attr("id","remove-this-button-"+idIncrement);
    });
    
});



//validation of signupform on submit
function jssignup() {
	var b = jsemail();
	var x=document.forms["form"]["email"].value;
	duplicate(x);
	var c = jspassword();
	var d = jsname();
	var e = jsmobile();
	var check = (b && c && d && e);
	return check;
}

//profile
function jsprofile() {
	var a = jsmobile();
	var b = jsavailability();
	var check = (a && b);
	return check;
}

//validation of login form on submit
function jslogin() {
	var b = jsemail();
	return b;
}

//validation of addevent form
function jsaddevent() {
	// var a = jsname();
	// var b = jsemail();
	// var c = jspassword();
	// var d = jsmobile();
	var e = jsorgname();
	//var g = jssector();
	var h = jstitle();
	var i = jswebsite();
	var j = jsarea();
	var l = jscategory();
	var m = jsfromdate();
	var n = jstodate();
	var o = jscontactname();
	var p = jscontactemail();
	var q = jscontactmobile();
	//var check = (a && b);
	var check = (e && h && i && j && l && m && n && o && p && q);
	return check;
}

function jschangepassword() {

   var a = jspassword();
   var b = jsrepassword();
   var check = (a && b);
   return check;
}