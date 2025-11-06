<?php
// Student name: Charlyn Woodruff
# File document: emplyCustomerList.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>

<?php
// This declares the variable page_title and stores the the title for the webpage
$page_title = "Customer Information ~ Tiny Paws Customers";
?>
    <!--This is the h3 heading for the employee customer list with a pawprint to the right for the pet gallery webpage--> 
    <h3>Customer List <i style="font-size:25px" class="fa"> &#xf1b0;</i></h3>
   
    <?php 	
       // These lines echo the table elements to the webpage
       echo "<div class='table-responsive'>";
       echo "<h4>Customer Information</h4>";                      
       echo "<table class='table table-bordered table-hover' style='font-family: Roboto, Helvetica, sans-serif; border: 3px solid black;'>";
       echo "<th>Cust. Id</th>";
       echo "<th>Full Name</th>";
       echo "<th>Address</th>";
       echo "<th>Email</th>";
       echo "<th>Phone</th>";

	    // this line calls the function getAllCustomersInfo to display all the customers information	
       getAllCustomersInfo();
    ?>
<div container>
 <br><h3>Customer Pet List <i style="font-size:25px" class="fa"> &#xf1b0;</i></h3>
    <p>Enter Customer Id to view their Pet List</p>

	<!--This is the form for the employee to enter the customer id to get the pet list--> 
	<form action="employee.php?name=emplyCustomerList" method="POST" style="font-family: Roboto, Helvetica, sans-serif">
	    <label style="margin:5px 5px 8px 0px">Customer Id: </label><input type="text" name="customer_id" style="border:2px solid black" title="Enter valid Customer Id" pattern="[0-9]{1,25}" placeholder="Customer Id" required><br><br>

        <!-- This is the submit button to submit the information in the form and the reset button to clear all information in the form-->
        <input type="submit" value="Submit" style="margin-left: 120px">
    </form><br><br><br>
</div>
    <?php
        $customerId = " ";

        // This is the php function which will test the data input and returns sanitized data
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
            }

        // This line checks the server request is equal to post
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // These lines declare the new variables with the sanitized data value from the function test_input
            $customerId = test_input($_POST['customer_id']);
        }
        // this line calls the function getCustPets by the customer id the employee enters
            getCustPets($customerId);   
    ?>