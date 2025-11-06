<?php
// Student name: Charlyn Woodruff
# File document: registration.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>
    
<?php
// This declares the variable page_title and stores the the title for the webpage
$page_title = "Registration ~ Tiny Paws Account";
?>
<head>
<style>
/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}


/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "?";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "?";
}

</style>
</head>
    <!--This is the h3 heading the registration page for the customer to sign up for an account  with the registration link with a pawprint to the right-->
	<h3>Signup for a Tiny Paws Account <i style="font-size:25px" class="fa"> &#xf1b0;</i></h3>

    <!--This is the form for the registration signup page which calls the action page registrationComplete inside of a paragraph with the label and input boxes with pattern, title and 
    required validation -->
    <p>
        <form action="index.php?name=registrationComplete" method="POST" style="font-family: Roboto, Helvetica, sans-serif">
            <label style="margin:5px 5px 8px 0px">First Name: </label><input type="text" name="firstname" style="border:2px solid black" title="Enter valid First Name" pattern="[A-Za-z ]{1,25}" placeholder="First Name" required><br>
            <label style="margin:5px 9px 8px 0px">Last Name: </label><input type="text" name="lastname" style="border:2px solid black" title="Enter valid Last Name" pattern="[A-Za-z ]{1,25}" placeholder="Last Name" required><br>
            <label style="margin:5px 30px 8px 0px">Address: </label><input type="text" name="address" style="border:2px solid black" title="Enter valid Address"  placeholder="Address" pattern="[A-Za-z0-9 ]+" required><br>
            <label style="margin:5px 66px 8px 0px">City:</label><input type="text" name="city"  style="border:2px solid black" placeholder="City" title="Enter valid City" pattern="[A-Za-z ]{1,25}"required><br>
            <label style="margin:5px 56px 8px 0px">State:</label><input type="text" name="state" style="border:2px solid black" placeholder="State" title="Enter State abbreviation" pattern="[A-Za-z]{2}" required><br>
            <label style="margin:5px 25px 8px 0px">Zip Code:</label><input type="text" name="zipcode" style="border:2px solid black" placeholder="Zip Code" title="Enter 5 digit Zip code" pattern="[0-9]{5}" required><br>
            <label style="margin:5px 48px 8px 0px">Phone: </label><input type="tel" name="phone" style="border:2px solid black" placeholder="Phone" title="Enter a valid 10 digit phone number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required><br>            
            <label style="margin:5px 45px 8px 0px" >E-mail: </label><input type="text" name="email" style="border:2px solid black" placeholder="Email" title="Enter valid Email" pattern="[A-Za-z0-9._%+\-]+@[A-Za-z0-9.\-]+\.[a-z]{2,}$" required><br> 		
            <label style="margin:5px 18px 8px 0px">Username: </label><input type="text" name="username" style="border:2px solid black" title="Enter valid Userame" pattern="[A-Za-z0-9]{1,25}" placeholder="Username" required><br>
            <label style="margin:5px 20px 8px 0px">Password: </label><input type="password" name="password" id="password" style="border:2px solid black" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password" required><br>
	          <label style="margin:5px 20px 8px 0px">Confirm <br>Password: </label><input type="password" name="confirm_password" id="confirm_password" onchange="myFunction()" style="border:2px solid black" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password" required>
            <div id="message">
              <p>Password must contain the following:</hp>
              <li id="letter" class="invalid">A <b>lowercase</b> letter</li>
              <li id="capital" class="invalid">A <b>capital (uppercase)</b> letter</li>
              <li id="number" class="invalid">A <b>number</b></li>
              <li id="length" class="invalid">Minimum <b>8 characters</b></li>
            </div><br><br>
            <div class="g-recaptcha" data-sitekey="6LdocX0UAAAAALCiQ4nvROQtgRhV5mI1kS-8LNaR"></div><br> 

	    <!-- This is the submit button to submit the information in the form and the reset button to clear all information in the form-->
            <input type="submit" value="Submit" name="register_Submit" style="margin-left:60px"><input type="reset" value="Reset" name="reset" style="margin-left:35px">
        </form>

<script>
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}

document.getElementById("confirm_password").addEventListener("onchange", myFunction);
function myFunction() {
  
   password = document.getElementById("password");
   password2 = document.getElementById("confirm_password");

            
            
            // If Not same return False.    
            if (password.value != password2.value) {
	
                alert("\nPassword did not match: Please try again...")
		document.getElementById("confirm_password").style.borderColor = "red";		
                return false;
            }

            // If same return True.
            else {
		
		document.getElementById("confirm_password").style.borderColor = "green";
		document.getElementById("password").style.borderColor = "green";
		alert("\nPasswords match!")
                return true;
            }

}

</script>

