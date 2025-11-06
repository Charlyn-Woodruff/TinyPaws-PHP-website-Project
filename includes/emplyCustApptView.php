<?php
// Student name: Charlyn Woodruff
# File document: emplyCustApptView.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>

<?php 
// This declares the variable page_title and stores the the title for the webpage
$page_title = "Employee ~ Customer Appointments~ Tiny Paws Accounts"; 
?>
    <!--This is the h3 heading for employee View customer appointments page--> 
    <h3>Employee ~ View Customer Appointments</h3>
    <p>
	<!--This is the form with a hidden value to use the session employee id-->
        <form action="employee.php?name=emplyCustApptScheduled" method="POST" style="font-family: Roboto, Helvetica, sans-serif">
	    <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="user_id">
	    </form>
    <?php
    // this sets the variable $emply_id to the session employee id and then calls the cuntion getEmplyAppt to view appontments that have been scheduled with the employee
        $emply_id =$_SESSION['user_id'];
        getEmplyAppt($emply_id);
    ?>

<div class="container m-5 ">

    <!--This is the h3 heading for the employee approval form--> 
    <h3>Appt Approval Form </h3><i style="font-size:25px" class="fa"> &#xf1b0;</i></h3>
    <p>Enter customer information to approve appointments

	<!--This is the employee approval form to approve customer appointments--> 
        <form action="employee.php?name=emplyCustApptScheduled" method="POST" style="font-family: Roboto, Helvetica, sans-serif">
	    <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="user_id">
	    <label style="margin:5px 10px 8px 0px">Cust. Id: </label><input type="text" name="customerid" style="border:2px solid black" title="Enter valid Customer Id" pattern="[0-9]{1,25}" placeholder="Customer Id" required><br>
	    <label style="margin:5px 28px 8px 0px">Pet Id: </label><input type="text" name="petid" style="border:2px solid black" title="Enter valid Pet id" pattern="[0-9]{1,25}" placeholder="Pet Id" required><br>
	    <label style="margin:5px 15px 8px 0px">Date of <br>Service: </label><input type="date" name="date" style="border:2px solid black" title="Enter Date" placeholder="Date" required><br>
	    <label style="margin:5px 5px 8px 0px">Approval: </label><input type="text" name="response" style="border:2px solid black" title="Enter yes or no" pattern="[A-Za-z ]{1,25}" placeholder="Yes or No" required><br><br>
	
	    <label for="service">Choose customer pet services:</label><br><br>
            <select name="service" id="service">
            <option value="19.00">Intro Package ~ $19.00</option>
            <option value="29.00">Basic Package ~ $29.00</option>
            <option value="49.00">Plus Package ~ $49.00</option>
            <option value="15.00">Pet Service 1 hr ~ $15.00</option>
            <option value="25.00">Pet Service 2 hr ~ $25.00</option>
            <option value="35.00">Pet Service 3 hr ~ $35.00</option>
            <option value="45.00">Pet Service 4 hr ~ $45.00</option>
            <option value="60.00">Pet Service 5 hr ~ $60.00</option>
            <option value="10.00">Single Services ~ $10.00</option>
            </select>
            <br><br>
            <input type="submit" value="Submit">
        </form>
</div>