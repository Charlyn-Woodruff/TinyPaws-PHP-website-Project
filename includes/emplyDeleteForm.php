<?php
// Student name: Charlyn Woodruff
# File document: emplyDeleteForm.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>

<?php 
// This declares the variable page_title and stores the the title for the webpage
$page_title = "Delete Employee Account ~ Tiny Paws Accounts"; 
?>
    <!--This is the h3 heading for the delete employee account page in the side bar navigation--> 
    <h3> Delete Employee Account </h3>
    <p>
			
	<!--This is the form for the employee to enter the customer id to get the pet list--> 
	<form action="employee.php?name=emplyDeleted" method="POST" style="font-family: Roboto, Helvetica, sans-serif">
	    <label style="margin:5px 5px 8px 0px">Employee Id: </label><input type="text" name="user_id" style="border:2px solid black" title="Enter Employee Id" pattern="[0-9]{1,25}" placeholder="Enter Employee Id" required><br><br>

        <!-- This is the submit button to submit the information in the form and the reset button to clear all information in the form-->
        <input type="submit" value="Submit" style="margin-left: 120px"><br><br>
    </form>

	<?php
	    getAllEmplyInfoDelete();
	?>
