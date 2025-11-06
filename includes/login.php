
<?php
// Student name: Charlyn Woodruff
# File document: login.php
/* Date: Nov 13, 2024
CIT 253 Web Application PHP
*/
?>

<?php
    // This sets the variable $user to the function authenicateUser post and then authenicate the customer user for the session
    $user = authenticateUser($_POST);
     if($user){
        $_SESSION['user_id']= $user['Customer_id'];
        $_SESSION['name'] = $user['FirstName'];
        $_SESSION['username'] = $user['UserName'];
	$_SESSION['password'] = $user['PassWord'];
        include("loginSuccess.php");
     }else{
        $login_error = true;
        include("loginForm.php");
     }
?>