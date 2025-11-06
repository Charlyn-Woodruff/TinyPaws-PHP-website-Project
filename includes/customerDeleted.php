<?php
// Student name: Charlyn Woodruff
# File document: customerDeleted.php
/* Date: Oct 23, 2024
CIT 253 Web Application PHP
*/
?>
    
<?php 
// This declares the variable page_title and stores the the title for the webpage
$page_title = "Delete Account"; 
?>

    <!--This is the h3 heading for the cudtomer delete confirmation with a pawprint to the right-->
    <h3>User Account Deleted <i style="font-size:25px" class="fa">&#xf1b0;</i></h3>    
    <p> 
      Your customer account has been Deleted!
    </p>
    
	 <?php
	// This line declares the php variables as an empty string
        $customerid = " ";

        // This is the php function which will test the data input and returns sanitized data
        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
          }

        // This line checks the server request is equal to post
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // These lines declare the new variables with the sanitized data value from the function test_input
          $customerid = test_input($_POST["user_id"]); 
          }  

             // this line calls the function deleteCust with the customers id to delete their account 
	      deleteCust($customerid);    
    	?>