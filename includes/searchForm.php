<?php
// Student name: Charlyn Woodruff
# File document: searchForm.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>

<?php 
// This declares the variable page_title and stores the the title for the webpage
$page_title = "Admin Login~ Tiny Paws Accounts"; 
?>

	<!--This is the h3 heading for the Search Pets webpages in the side bar navigation--> 
	<h3> Search Pets by Type</h3>
	<p>
	 <!--This is the form for the employee to search for pets by the animal type --> 
	<form action="employee.php?name=searchPets" method="POST" style="font-family: Roboto, Helvetica, sans-serif">
        <label style="margin:5px 35px 8px 0px">Type of pet: </label><input type="text" name="type" style="border:2px solid black" title="Enter valid type" pattern="[A-Za-z ]{1,25}" placeholder="Type of Pet" required><br>
        <br><br>
        <!-- This is the submit button to submit the information in the form and the reset button to clear all information in the form-->
        <input type="submit" value="Submit" style="margin-left:60px"><input type="reset" value="Reset" style="margin-left:35px">
    </form>      
    