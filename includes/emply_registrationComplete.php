<?php
// Student name: Charlyn Woodruff
# File document: emply_registration.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>

<?php
// This declares the variable page_title and stores the the title for the webpage
$page_title = "Employee Registration Complete";
?>

                
<?php  

 if(captchaCheck($_POST['g-recaptcha-response']) === true){ 
//echo "<h4>CAPTCHA PASSED!</h4>"; 

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

if($_POST['password'] != $_POST['confirm_password']){
    $errors .= "Passwords do not match!";

}

if(getEmplyByUserName($_POST['username'])){
    $errors .= "<br>Username is unavailable!";

}

if(getEmplyByEmail($_POST['email'])){
    $errors .= "<br>Email is already in use!";

}


if(!$errors){
	echo "<h3>Thank you for signing up! <i style='font-size:25px' class='fa'>&#xf1b0;</i></h3> ";   
 	echo "<p> You may now login to your Employee Tiny Paws Account in the side Bar menu!</p><br>";
	echo "<h4>Employee account created successfully!</h4>";
    	registerEmply($_POST);
}else{
echo "<h4 style='color:red'>Employee Registration Unsuccessful!</h4>";
echo "<h4 style='color:red'> $errors </h4>";
include("emply_registration.php");
}
}


}else{ 
echo "<h4 style='color:red'>CAPTCHA test FAILED!</h4>";
include("emply_registration.php");

}

?>
     