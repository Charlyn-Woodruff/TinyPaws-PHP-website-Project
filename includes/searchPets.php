<?php
// Student name: Charlyn Woodruff
# File document: searchPets.php
/* Date: Nov 5, 2024
CIT 253 Web Application PHP
*/
?>
<?php
// This declares the variable page_title and stores the the title for the webpage
$page_title = "Pets List ~ Tiny Paws Customers";
?>
    <!--This is the h3 heading  for the searhc pets by type with a pawprint to the right for the pet gallery webpage--> 
    <h3>Search Pet by Type <i style="font-size:25px" class="fa"> &#xf1b0;</i></h3>

      <?php 	
          $type = " ";

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
            $type = test_input($_POST['type']); 
          }
        // This line calls the function getPetsbyType with the animal type in the variable $type and displays the results to the webpage
        getPetsByType($type);  			
      ?>