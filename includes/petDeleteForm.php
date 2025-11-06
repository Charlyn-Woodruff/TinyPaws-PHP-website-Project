<?php
// Student name: Charlyn Woodruff
# File document: deletePetForm.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>

<?php 
// This declares the variable page_title and stores the the title for the webpage
$page_title = "Delete Pet Information ~ Tiny Paws Accounts"; 
?>
    <!--This is the h3 heading for the delete pet webpage in the side bar navigation--> 
    <h3> Delete Pet Information </h3>
    <p>
	 <!--This is the form for the cutomser to enter the pet name they would like to delete using the hidden value of the customers session id--> 
        <form action="index.php?name=petDeleted" method="POST" style="font-family: Roboto, Helvetica, sans-serif">
            <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="user_id">
 	        <label style="margin:5px 35px 8px 0px">Enter Pet's Name: </label><input type="text" name="petname" style="border:2px solid black" title="Enter valid Name" pattern="[A-Za-z ]{1,25}" placeholder=" Pet Name" required><br><br>
	        <p>Are you sure you want to delete your pet's information?</p>

            <!-- This is the submit button to submit the information in the form and the reset button to clear all information in the form-->
            <input type="submit" value="Submit" style="margin-left:60px"><input type="reset" value="Reset" style="margin-left:35px">
        </form>

