<?php
// Student name: Charlyn Woodruff
# File document: emply_login.php
/* Date: Nov 13, 2024
CIT 253 Web Application PHP
*/

?>

<?php
    // this sets the variable $emplyuser to the function authenicateEmply post and then authenicate the employee user for the session
    $user = authenticateEmplyUser($_POST);
     if($user){
         $_SESSION['user_id']= $user['Employee_id'];
         $_SESSION['username'] = $user['Emply_UserName'];
	 $_SESSION['password'] = $user['Emply_Password'];
        include("emply_LoginSuccess.php");
     }else{
        $login_error = true;
        include("emply_loginForm.php");
     }
?>