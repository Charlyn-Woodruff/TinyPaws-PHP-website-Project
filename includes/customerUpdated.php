<?php
// Student name: Charlyn Woodruff
# File document: customerUpdated.php
/* Date: Oct 23, 2024
CIT 253 Web Application PHP
*/
?>
     
<?php 
// This declares the variable page_title and stores the the title for the webpage
$page_title = "Update Account Information"; 
?>

        <!--This is the h3 heading for the customer updated page with a pawprint to the right-->
        <h3>User Account Updated <i style="font-size:25px" class="fa">&#xf1b0;</i></h3>    
        <p> 
          Your user account has been updated!
        </p>


	<?php
          // This line calls the function updateCust in the db.php page with the variables as parameters to update the customer information
	   updateCust($_POST);  
        ?>
