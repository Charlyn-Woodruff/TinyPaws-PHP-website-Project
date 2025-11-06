<?php
// Student name: Charlyn Woodruff
# File document: apptSchedule.php
/* Date: Nov 19, 2024
CIT 253 Web Application PHP
*/
?>
<?php
// This declares the variable page_title and stores the the title for the webpage
$page_title = "Pet Appointment Schedule ~ Tiny Paws Customers";
?>
    <!--This is the h3 heading with a pawprint to the right for the pet gallery webpage--> 
    <h3>Customer Pet Appointment Schedule <i style="font-size:25px" class="fa"> &#xf1b0;</i></h3>

	<!--This is the form that gets the user id from the session id-->
	<form action="index.php?name=apptSchedule" method="POST" style="font-family: Roboto, Helvetica, sans-serif">
	   <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="user_id">
	</form>

	<?php 
	// this sets the variable  $customer_id to the session id and then calls the function getCustAppt with the customer id to get the customers appointments by the customer id
 	$customer_id =$_SESSION['user_id'];
	getCustAppt($customer_id);
	?>