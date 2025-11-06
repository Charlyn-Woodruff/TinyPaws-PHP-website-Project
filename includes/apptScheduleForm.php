<?php
// Student name: Charlyn Woodruff
# File document: apptScheduleForm.php
/* Date: Nov 23, 2024
CIT 253 Web Application PHP
*/
?>
 <?php
// This declares the variable page_title and stores the the title for the webpage
$page_title = "Customer ~ Schedule Appts Tiny Paws Pet Services";
?>
    <!--This is the h3 heading the appointment schedule page with a pawprint to the right-->
	<h3>Schedule Appointments<i style="font-size:25px" class="fa"> &#xf1b0;</i></h3>
	
            <!--This is the form for the pet scheduling for the user the enter information needed to schedule an appinmet with the employee of their choice, services requested and service amount -->
	<div Class="container">
	    <div class="row">
	        <div class="col-sm">
				<ul style="font-family: Roboto, Helvetica, sans-serif">
				<li><b>Pet Sitters</b></li>
				<li>Alyssa McKnight</li>
				<li>Christine Taylor</li>
				<li>Alex Johnson</li>
				<li>Megan Smith</li>
				</ul>
	        </div>
	    	<div class="col-sm">
				<ul style="font-family: Roboto, Helvetica, sans-serif">
				<li><b>Pet Groomers</b></li>
				<li>Krysta Bennett</li>
				<li>Alex Johnson</li>
				<li>Grant Matthews</li>
				<li>Michelle Harrington</li>
				<li>Christine Taylor</li>
				<li>Matt McBride</li>
				</ul>
	        </div>
	  </div>
     </div>
	   <p><br>
		Enter the name of the employee you would like for your pet services.
        <form action="index.php?name=apptScheduled" method="POST" style="font-family: Roboto, Helvetica, sans-serif; margin-left:10%;">
			<input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="user_id">
			<label style="margin:5px 20px 8px 0px">First Name: </label><input type="text" name="emplyfirstname" style="border:2px solid black" title="Enter valid Name" pattern="[A-Za-z ]{1,25}" placeholder=" Employee First Name" required><br>
			<label style="margin:5px 25px 8px 0px">Last Name: </label><input type="text" name="emplylastname" style="border:2px solid black" title="Enter valid Name" pattern="[A-Za-z ]{1,25}" placeholder=" Employee Last Name" required><br>
			<label style="margin:5px 34px 8px 0px">Pet Name: </label><input type="text" name="petName" style="border:2px solid black" title="Enter valid Name" pattern="[A-Za-z ]{1,25}" placeholder=" Pet Name" required><br>
			<label style="margin:5px 30px 8px 0px">Appt Date: </label><input type="date" name="apptDate" style=" border:2px solid black" placeholder=" Date Requested"  required><br>
			<label for="appt">Time Requested:</label>
			<input type="text" id="appt" name="apptTime" placeholder="hrs:mins" pattern="[A-Za-z 0-9 :]{1,25}"  required /><br>
			<label style="margin:5px 25px 8px 0px">Requested Services: </label><br><textarea  name="reqServices"  style="width:50%;height:100px;" placeholder="Brushing & Grooming etc"></textarea><br><br>

			<label for="service">Choose customer pet services:</label><br><br>
			<select name="service" id="service">
			<option value="Intro Package">Intro Package ~ $19.00</option>
			<option value="Basic Package">Basic Package ~ $29.00</option>
			<option value="Plus Package">Plus Package ~ $49.00</option>
			<option value="Pet Service 1 hr">Pet Service 1 hr ~ $15.00</option>
			<option value="Pet Service 2 hr">Pet Service 2 hr ~ $25.00</option>
			<option value="Pet Service 3 hr">Pet Service 3 hr ~ $35.00</option>
			<option value="Pet Service 4 hr">Pet Service 4 hr ~ $45.00</option>
			<option value="Pet Service 5 hr">Pet Service 5 hr ~ $60.00</option>
			<option value="Single Services">Single Services ~ $10.00</option>
			</select>
			<br><br>		   			
				<!-- This is the submit button to submit the information in the form and the reset button to clear all information in the form-->
			<input type="submit" value="Submit" style="margin-left:60px"><input type="reset" value="Reset" style="margin-left:35px">
        </form>