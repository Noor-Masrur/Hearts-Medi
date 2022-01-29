function validateForm() {
  var name = document.forms["myForm"]["name"].value;
  if (name == "") {
    alert("Name must be filled out");
    return false;
  }
  var email = document.forms["myForm"]["email"].value;
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if (email == "" || filter.test(email) == false) {
    alert("Email must be valid");
    return false;
  }
  var mobile = document.forms["myForm"]["mobile"].value;
  if (mobile == "" || isNaN(mobile) == true) {
    alert("Mobile must be valid");
    return false;
  }
  var nid = document.forms["myForm"]["nid"].value;
  if (nid == "" || isNaN(nid) == true) {
    alert("NID must be valid");
    return false;
  }
  var dob = document.forms["myForm"]["dob"].value;
  if (dob == "") {
    alert("Date of birth must be filled out");
    return false;
  }
  var mname = document.forms["myForm"]["mname"].value;
  if (mname == "") {
    alert("Medical name must be filled out");
    return false;
  }
  var session = document.forms["myForm"]["session"].value;
  if (session == "") {
    alert("Session must be filled out");
    return false;
  }
  var pass = document.forms["myForm"]["pass"].value;
  if (pass == "") {
    alert("Password must be filled out");
    return false;
  }
  var cpass = document.forms["myForm"]["cpass"].value;
  if (cpass == "") {
    alert("Confirm Password must be filled out");
    return false;
  }
  if (pass != cpass) {
    alert("Password not match");
    return false;
  }
}