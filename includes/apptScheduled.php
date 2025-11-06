<?php
// Student name: Charlyn Woodruff
# File document: apptScheduled.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>
        <?php
        // This declares the variable page_title and stores the the title for the webpage
        $page_title = "Customer Pets Form ~ Tiny Paws";
        ?>
           <!--This is the h3 heading  and paragraph for the process page after the customer signs up for an account  with a pawprint to the right-->
        <h3>Your Pet appointment has been added successfully!<i style="font-size:25px" class="fa">&#xf1b0;</i></h3>    
        <p> 
            
        </p>

                
        <?php
           // This line calls the function apptSchedule with the variable names as parameters
	   apptSchedule($_POST);
                
        ?>
