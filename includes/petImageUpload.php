<?php
// Student name: Charlyn Woodruff
# File document: petImageUpload.php
/* Date:Nov 19, 2024
CIT 253 Web Application PHP
*/
?>
  
    <?php
 	   // This line declares the variables for each form input as an empty string
            $customerid = $petname = " ";

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
		        $customerid = test_input($_POST['user_id']);
                $petname = test_input($_POST["petName"]);
	           }		
        //This line calls the function uploadImage with the customers id and the pet name to upload an image of their pet
        uploadImage($customerid,$petname);
    ?>


