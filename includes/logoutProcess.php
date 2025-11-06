<?php
// Student name: Charlyn Woodruff
# File document: logoutProcess.php
/* Date: Nov.15 , 2024
CIT 253 Web Application PHP
*/
?>
<?php
   // these 2 lines unset and destroy the customer users session when they log out
   session_unset();
   session_destroy();
?>

<!-- this javascript redirects the customer to the customer welcome page if the logout is successful -->
<script type="text/javascript">
    window.location.href = "http://cit.wvncc.edu/~cpwoodruff/TinyPaws/index.php?name=welcome"
</script>