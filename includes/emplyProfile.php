<?php
// Student name: Charlyn Woodruff
# File document: emplyProfile.php
/* Date: Nov 19, 2024
CIT 253 Web Application PHP
*/
?>
<?php
// This declares the variable page_title and stores the the title for the webpage
$page_title = "Account Information ~ Tiny Paws Customers";
?>
    <!--This is the h3 heading with a pawprint to the right for the pet gallery webpage--> 
    <h3>Employee Account Information <i style="font-size:25px" class="fa"> &#xf1b0;</i></h3>

	<!--This is the form that uses the session user id in a hidden input--> 
	<form action="employee.php?name=emplyProfile" method="POST" style="font-family: Roboto, Helvetica, sans-serif">
	   <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="user_id">
	</form>

	<?php 
	    // this sets the variable to the users session id and then calls the functions getCustById and getCustPets with the customers id to display the customers information and pet information
	    $emply_id =$_SESSION['user_id'];
	    getEmplyById($emply_id);
		
	?>