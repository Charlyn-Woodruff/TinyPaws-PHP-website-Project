<?php
// Student name: Charlyn Woodruff
# File document: petAdded.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>

<?php
// This declares the variable page_title and stores the the title for the webpage
$page_title = "Customer Pets Form ~ Tiny Paws";
?>

    <!--This is the h3 heading  for the pet addded webpage with a pawprint to the right-->
    <h3>Add your Pet Information<i style="font-size:25px" class="fa">&#xf1b0;</i></h3>    
    <p></p>
    
        <?php
            //This line calls the function addPet with the varaible parameters to add the customers pet information to the database
            addPet($_POST);                
        ?>