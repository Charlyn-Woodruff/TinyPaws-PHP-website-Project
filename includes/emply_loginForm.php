<?php
// Student name: Charlyn Woodruff
# File document: loginForm_emply.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>
<?php 
// This sends an error message to the page if the employee username or password are incorrect
 if ($login_error){
    echo "<h4 style='color:red'> Login Failed! Check Username or Password</h4>";
 }
?>


<?php 
// This declares the variable page_title and stores the the title for the webpage
$page_title = "Tiny Paws Employee Login"; 
?>

    <!--This is the h3 heading with a pawprint to the right for the employee Login webpage in the side bar navigation--> 
	<h3>Employee Login <i style="font-size:25px" class="fa"> &#xf1b0;</i></h3>

        <!--This is the form for the employee login page -->
        <p>
            <form action="employee.php?name=emply_login" method="POST" style="font-family: Roboto, Helvetica, sans-serif">
                <label style="margin:10px">UserName: </label><input type="text" name="username" style="margin-left:8px; border:2px solid black" placeholder="UserName" title="Enter UserName" required><br>
                <label style="margin:10px">Password: </label><input type="password" name="password" style="margin-left:11px; border:2px solid black" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Enter Password" placeholder="Password" required><br><br>

                <br><br>
                <!-- This is the submit button to submit the information in the form and the reset button to clear all information in the form-->
                <input name="login" type="submit" value="Login" style="margin-left:60px"><input type="reset" value="Reset" style="margin-left:35px">
            </form>

