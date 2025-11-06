<?php
// Student name: Charlyn Woodruff
# File document: paidInvoice.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>


<?php
    // This declares the variable page_title and stores the the title for the webpage
    $page_title = "Customer Paid Invoice ~ Tiny Paws";
 ?>
          <!--This is the h3 heading  for the customer paid invoice webpage with a pawprint to the right-->
        <h3>Your Pet Invoice has been paid!<i style="font-size:25px" class="fa">&#xf1b0;</i></h3>    
        <p></p>
                
        <?php
            // This line declares the variables for each form input as an empty string
            $custId = $amtPaid = " ";

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
		$custId = test_input($_POST['user_id']);
                $amtPaid = test_input($_POST["amtPaid"]);             

              }	
	        //This line calls the function paidInvoice with the parameters of amount paid and the customer id	
	        paidInvoice($amtPaid,$custId);    
        ?>
