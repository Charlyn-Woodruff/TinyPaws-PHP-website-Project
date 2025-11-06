<?php
// Student name: Charlyn Woodruff
# File document: emplyUpdateForm.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>

<?php 
// This declares the variable page_title and stores the the title for the webpage
$page_title = "Update Employee Information ~ Tiny Paws Accounts"; 
?>
    <!--This is the h3 heading for the database webpages in the side bar navigation--> 
    <h3> Update Employee Account</h3>
    <p>
	<!--This is the form for the employee to update thier information using the employees session employee id--> 
        <form action="employee.php?name=emplyUpdated" method="POST" style="font-family: Roboto, Helvetica, sans-serif">
	    <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="user_id">

            <label style="margin:5px 5px 8px 0px">First Name: </label><input type="text" name="fname" style="border:2px solid black" title="Enter valid Name" pattern="[A-Za-z ]{1,25}" placeholder="First Name" required><br>
	        <label style="margin:5px 9px 8px 0px">Last Name: </label><input type="text" name="lname" style="border:2px solid black" title="Enter valid Name" pattern="[A-Za-z ]{1,25}" placeholder="Last Name" required><br>
            <label style="margin:5px 30px 8px 0px">Address: </label><input type="text" name="address" style="border:2px solid black" title="Enter valid Address"  placeholder="Address" pattern="[A-Za-z0-9 ]+" required><br>
            <label style="margin:5px 66px 8px 0px">City:</label><input type="text" name="city"  style="border:2px solid black" placeholder="City" title="Enter valid City" pattern="[A-Za-z ]{1,25}"required><br>
            <label style="margin:5px 56px 8px 0px">State:</label><input type="text" name="state" style="border:2px solid black" placeholder="State" title="Enter State abbreviation" pattern="[A-Za-z]{2}" required><br>
            <label style="margin:5px 25px 8px 0px">Zip Code:</label><input type="text" name="zipcode" style="border:2px solid black" placeholder="Zip Code" title="Enter 5 digit Zip code" pattern="[0-9]{5}" required><br>
	        <label style="margin:5px 48px 8px 0px">Phone: </label><input type="tel" name="phone" style="border:2px solid black" placeholder="Phone" title="Enter a valid 10 digit phone number" "[0-9]{3}-[0-9]{3}-[0-9]{4}" required><br>
            <label style="margin:5px 45px 8px 0px" >E-mail: </label><input type="text" name="email" style="border:2px solid black" placeholder="Email" title="Enter valid Email" pattern="[A-Za-z0-9._%+\-]+@[A-Za-z0-9.\-]+\.[a-z]{2,}$" required><br> 		
	        <label style="margin:5px 18px 8px 0px">Username: </label><input type="text" name="username" style="border:2px solid black" title="Enter valid Userame" pattern="[A-Za-z0-9]{1,25}" placeholder="Username" required><br>
            <label style="margin:5px 20px 8px 0px">Password: </label><input type="text" name="password" style="border:2px solid black" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password" required><br><br>
	    <br><br>

            <!-- This is the submit button to submit the information in the form and the reset button to clear all information in the form-->
            <input type="submit" value="Submit" style="margin-left:60px"><input type="reset" value="Reset" style="margin-left:35px">
        </form>