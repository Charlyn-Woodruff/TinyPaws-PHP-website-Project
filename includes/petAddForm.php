<?php
// Student name: Charlyn Woodruff
# File document: petAddForm.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>
  
<?php
// This declares the variable page_title and stores the the title for the webpage
$page_title = "Pet Information";
?>
    <!--This is the h3 heading for the add pet information webpage with a pawprint to the right-->
	<h3>Add Pet Information<i style="font-size:25px" class="fa"> &#xf1b0;</i></h3>

      <!--This is the form for the customer to add the pet information using the hidden value customers session id with the label and input boxes with pattern, title and required validation -->
      <p>
        <form action="index.php?name=petAdded" method="POST" style="font-family: Roboto, Helvetica, sans-serif">
	  <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="user_id">                 
          <label style="margin:5px 34px 8px 0px">Pet Name: </label><input type="text" name="petName" style="border:2px solid black" title="Enter valid Name" pattern="[A-Za-z ]{1,25}" placeholder=" Pet Name" required><br>
          <label style="margin:5px 34px 8px 0px">BirthDate: </label><input type="date" name="birthdate" style=" border:2px solid black" placeholder=" Birth Date"  required><br>
          <label style="margin:5px 58px 8px 0px">Weight:</label><input type="text" name="weight"  style=" border:2px solid black"  placeholder="Weight" pattern="[0-9 ]{1,25}"required><br>
          <label style="margin:5px 77px 8px 0px">Type:</label><input type="text" name="animaltype" style=" border:2px solid black" placeholder="Animal Type" pattern="[A-Za-z]{1,25}" required><br>
          <label style="margin:5px 58px 8px 0px">Gender:</label><input type="text" name="gender" placeholder="Gender"style=" border:2px solid black" required><br><br>
          <label style="margin:5px 25px 8px 0px">Special needs: </label><textarea  name="specNeeds" cols=35 rows=5></textarea><br><br>
  
            <!-- This is the submit button to submit the information in the form and the reset button to clear all information in the form-->
          <input type="submit" value="Submit" style="margin-left:60px"><input type="reset" value="Reset" style="margin-left:35px">
        </form>
	
