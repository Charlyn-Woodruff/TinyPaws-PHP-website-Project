<?php
// Student name: Charlyn Woodruff
# File document: contact.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>
    
<?php
// This declares the variable page_title and stores the the title for the webpage
$page_title = "Contact Us ~ Tiny Paws Pet Services";
?>

    <!--This is the h3 heading with a pawprint to the right for the contact us webpage --> 
	<h3>Send an Email to Tiny Paws <i style="font-size:25px" class="fa"> &#xf1b0;</i></h3>

        <!--This is the form for the contact page inside of a paragraph with the label and input boxes with pattern, title and required validation -->
            <p>
            <form action="index.php?name=process" method="POST" style="font-family: Roboto, Helvetica, sans-serif">
                <label style="margin:5px 35px 8px 0px">Name: </label><input type="text" name="name" style="border:2px solid black" title="Enter valid Name" pattern="[A-Za-z ]{1,25}" placeholder="Name" required><br>
                <label style="margin:5px 13px 8px 0px">Address: </label><input type="text" name="address" style="border:2px solid black" title="Enter valid Address" " placeholder="Address" pattern="[A-Za-z0-9 ]+" required><br>
                <label style="margin:5px 48px 8px 0px">City:</label><input type="text" name="city"  style="border:2px solid black" placeholder="City" title="Enter valid City"pattern="[A-Za-z ]{1,25}"required><br>
                <label style="margin:5px 38px 8px 0px">State:</label><input type="text" name="state" style="border:2px solid black" placeholder="State" title="Enter State abbreviation"pattern="[A-Za-z]{2}" required><br>
                <label style="margin:5px 9px 8px 0px">Zip Code:</label><input type="text" name="zipcode" style="border:2px solid black" placeholder="Zip Code" title="Enter 5 digit Zip code"pattern="[0-9]{5}" required><br>
                <label style="margin:5px 30px 8px 0px" >E-mail: </label><input type="text" name="email" style="border:2px solid black" placeholder="Email" title="Enter valid Email"pattern="[A-Za-z0-9._%+\-]+@[A-Za-z0-9.\-]+\.[a-z]{2,}$" required><br>
                
                <!-- This is the comment section for the user to add their comment on their email to contact us-->
                <h4>Comment: </h4><textarea name="comment"   style="border:2px solid black; min-width:55%; min-height:95px"></textarea>
                <br><br>
        
                <!-- This is the submit button to submit the information in the form and the reset button to clear all information in the form-->
                <input type="submit" value="Submit" style="margin-left:60px"><input type="reset" value="Reset" style="margin-left:35px">
            </form>