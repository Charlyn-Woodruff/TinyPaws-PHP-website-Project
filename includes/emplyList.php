<?php
// Student name: Charlyn Woodruff
# File document: emplyList.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>

<?php
// This declares the variable page_title and stores the the title for the webpage
$page_title = "Employee List ~ Tiny Paws";
?>
    <!--This is the h3 heading for the employee customer list with a pawprint to the right for the pet gallery webpage--> 
    <h3>Employee List <i style="font-size:25px" class="fa"> &#xf1b0;</i></h3>
   
    <?php 	

       // this line calls the function getAllCustomersInfo to display all the customers information	
       getAllEmplyInfo();
    ?>
