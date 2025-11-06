<?php
// Student name: Charlyn Woodruff
# File document: customerDeleteForm.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>

<?php 
// This declares the variable page_title and stores the the title for the webpage
$page_title = "Delete User Account ~ Tiny Paws Accounts"; 
?>
    <!--This is the h3 heading for the database webpages in the side bar navigation--> 
    <h3> Delete User Account </h3>
    <p>

	<!--This is the delete form which uses the session user id in a hidden input and calls the action page customerDeleted  -->
    <form action="index.php?name=customerDeleted" method="POST" style="font-family: Roboto, Helvetica, sans-serif">
        <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="user_id">
        <h4>Are you sure you want to delete your user account with Tiny Paws Pets Services?</h4>

        <!-- This is the submit button to submit the delete-->
        <input type="submit" value="Delete" style="margin-left:60px">
    </form>