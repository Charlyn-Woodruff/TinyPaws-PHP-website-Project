<?php
// Student name: Charlyn Woodruff
# File document: custInvoice.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>

<?php
    // This declares the variable page_title and stores the the title for the webpage
$page_title = "Customer Pet Invoice ~ Tiny Paws";
?>
    <!--This is the h3 heading  for the customer invoice page  with a pawprint to the right-->
    <h3>Customer Invoice <i style="font-size:25px" class="fa">&#xf1b0;</i></h3> 

   	<!--This is the form fro the customer invoice page which uses the hidden input to get the session id after the customer has logged in-->
	<form action="index.php?name=custInvoice" method="POST" style="font-family: Roboto, Helvetica, sans-serif; margin-left:10%;">
	    <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="user_id">
	</form>
           
    <?php
        // This line declares the variable $custId and sest it to the users session id input and then calls the function getInvoice with the users id to display the users invoices
        $custId = $_SESSION['user_id'];     		
    	getCustInvoice($custId);
            
    ?>
