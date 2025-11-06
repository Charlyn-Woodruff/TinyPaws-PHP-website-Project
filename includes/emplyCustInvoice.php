<?php
// Student name: Charlyn Woodruff
# File document: emplyCustInvoice.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>
<?php
// This declares the variable page_title and stores the the title for the webpage
$page_title = "Customer Invoices ~ Tiny Paws";
?>
    <!--This is the h3 heading and the hidden form for the Customer pet Invoices using the session id-->
    <h3>Customer Pet Invoices<i style="font-size:25px" class="fa">&#xf1b0;</i></h3>    
	<form action="employee.php?name=emplyCustInvoice" method="POST" style="font-family: Roboto, Helvetica, sans-serif">
	    <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="user_id">
	</form>
    <?php
    // this sets the variable $emply_id to session id of the employee and then calls the function getCustInvoiceEmply with the employee id to diasplay the invocies of the customers with that employee
        $emply_id =$_SESSION['user_id'];
        getCustInvoiceEmply($emply_id);
    ?>