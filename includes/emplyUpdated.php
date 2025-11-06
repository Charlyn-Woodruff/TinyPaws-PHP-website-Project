<?php
// Student name: Charlyn Woodruff
# File document: emplyUpdated.php
/* Date: Oct 23, 2024
CIT 253 Web Application PHP
*/
?>
   
<?php 
   // This declares the variable page_title and stores the the title for the webpage
     $page_title = "Employee Account Information Updated"; 
?>
         <!--This is the h3 heading  for the employee accoun updated page with a pawprint to the right-->
        <h3>Employee Account Updated <i style="font-size:25px" class="fa">&#xf1b0;</i></h3>    
            <p> 
                Your employee account has been updated!
            </p>

            <?php
                // This line declares the variables for each form input as an empty string
                $firstname = $lastname = $address = $city = $state = $zip = $email = $phone = $username = $password = " ";

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
                        $fname = test_input($_POST["fname"]);
                        $lname = test_input($_POST["lname"]);
                        $address = test_input($_POST["address"]);
                        $city = test_input($_POST["city"]);
                        $state = test_input($_POST["state"]);
                        $zip = test_input($_POST["zipcode"]);
                        $phone = test_input($_POST["phone"]);
                        $email = test_input($_POST["email"]); 
                        
                        $username = test_input($_POST["username"]);
                        $password = test_input($_POST["password"]);    
                        }  
                         
                     //This line calls the function updateEmply with the varaiable parameters and updates the employee information in the database
                    updateEmply($fname,$lname,$address,$city,$state,$zip,$phone,$email,$username,$password,$emplyid);  
            ?>