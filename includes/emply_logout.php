
<?php
// Student name: Charlyn Woodruff
# File document: emply_logout.php
/* Date: Nov.13 , 2024
CIT 253 Web Application PHP
*/
?>
<?php
 // This declares the variable page_title and stores the the title for the webpage
 $page_title = "Employee Logout ~ Tiny Paws Account"; 
?>

<!--This is the h3 heading with a pawprint to the right for the employee logout webpage in the side bar navigation--> 
<h3>Employee Logout <i style="font-size:25px" class="fa"> &#xf1b0;</i></h3>

    <p>
    <form action="employee.php?name=emply_LogoutProcess" method="POST" style="font-family: Roboto, Helvetica, sans-serif">
        <!-- This is the submit button to submit the information in the form and the reset button to clear all information in the form-->
        <input name="logout" type="submit" value="Logout" style="margin-left:60px">
    </form>