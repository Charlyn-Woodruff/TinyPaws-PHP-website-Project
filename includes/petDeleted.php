<?php
// Student name: Charlyn Woodruff
# File document: petDeleted.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>

<?php
// This declares the variable page_title and stores the the title for the webpage
$page_title = "Pet Information Deleted";
?>

  <!--This is the h3 heading  and paragraph for the process page after the customer signs up for an account  with a pawprint to the right-->
  <h3>Pet Information Updated! <i style="font-size:25px" class="fa">&#xf1b0;</i></h3>   
	<p></p> 

    <?php
       $petName = $customerId = " ";

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
          $customerId = test_input($_POST['user_id']);
          $petName = test_input($_POST["petname"]);       
        }
      //This line calls the function deletePet with the parameters customer id and pet name to delete that pet from the database
      deletePet($customerId,$petName);    
    ?>