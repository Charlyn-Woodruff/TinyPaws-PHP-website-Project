<?php
// Student name: Charlyn Woodruff
# File document: emply_LogoutProcess.php
/* Date: Nov.15 , 2024
CIT 253 Web Application PHP
*/
?>
<?php
   // these 2 lines unset and destroy the employee users session when they log out
   session_unset();
   session_destroy();
?>
<!-- this javascript redirects the employee to the employee welcome page if the logout is successful -->
<script type="text/javascript">
    window.location.href = "http://cit.wvncc.edu/~cpwoodruff/TinyPaws/employee.php?name=emply_welcome"
</script>