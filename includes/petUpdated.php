<?php
// Student name: Charlyn Woodruff
# File document: petUpDated.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>

<?php
// This declares the variable page_title and stores the the title for the webpage
$page_title = "Pet Information Updated";
?>
    <!--This is the h3 heading  for pet information updated webpage with a pawprint to the right-->
    <h3>Pet Information Updated! <i style="font-size:25px" class="fa">&#xf1b0;</i></h3>   
	  <p></p> 

      <?php
	// This line declares the variables for each form input as an empty string
          $customerid = $petName = $bday = $weight = $animalType = $gender = $specNeeds = " ";

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
              $petName = test_input($_POST["petName"]);
              $bday = test_input($_POST["birthdate"]);
              $weight= test_input($_POST["weight"]);
              $type = test_input($_POST["animaltype"]);
              $gender = test_input($_POST["gender"]);
              $specNeeds = test_input($_POST["specNeeds"]); 
            }

          //This line calls the function updatePet with the customers pet information and updates i it in the database
          updatePet($bday,$weight,$type,$gender,$specNeeds,$customerid,$petName);            
      ?>