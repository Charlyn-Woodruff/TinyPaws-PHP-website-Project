<?php
// Student name: Charlyn Woodruff
# File document: emplyCustApptScheduled.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>
<?php
   // This declares the variable page_title and stores the the title for the webpage
  $page_title = "Employee ~ Customer Appointment Approval";
?>
        <!--This is the h3 heading  and paragraph for the Customer appointment scheduled page with a pawprint to the right-->
<h3>Customer Pet Appointment scheduled! <i style="font-size:25px" class="fa">&#xf1b0;</i></h3>   
	<p></p> 

        <?php
            // This line declares the variables for each form input as an empty string
            $customerid = $emplyid = $date = $petid = $response = $service = " ";

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
		$emplyid = test_input($_POST["user_id"]);
                $customerid = test_input($_POST["customerid"]);
                $petid = test_input($_POST["petid"]);
                $date = test_input($_POST["date"]);
		$response = test_input($_POST["response"]);
		$service = test_input($_POST["service"]);
              }
	        // These 2 lines calls the functions approveAppt and custInvoice with the parameters to display the apporval and customer invoices	
                approveAppt($response,$emplyid,$customerid,$petid,$date);    
	        custInvoice($date,$emplyid,$customerid,$petid,$service);
        ?>
