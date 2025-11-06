<?php
session_start();
// Student name: Charlyn Woodruff
# File document: emply_side_nav.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>

<!--This is the beginning of the bootstrap div containers and column for the employee side navigation--> 
<div class="container side_menu">
   <div class="container">   
      <div class="row">
        <div class="col-sm-2">

          <!--This is section the side navigation for the webpages with rounded border radius of 15px with javascript close and open button function calls in the index page --> 
          <div id="mySidebar" class="sidebar" style="border-radius:15px;">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

            <!--This is the beginning of the first unordered list with a border color of 2px solid blue, a rounded border radius
             of 15px , width of 85% , margin set to to auto to center the content text align set to left 
             and the links to the php webpages in the side bar menu navigation for if the employee session id is not set -->

            <?php if(!isset($_SESSION['user_id'])){
                      echo "<ul style='border: 2px solid blue; border-radius:15px; width:85%; margin:auto;'>";
                      echo "<a href='employee.php?name=emply_loginForm'> Employee Login</a>";
                      echo "</ul>";
                  }
            ?>
             <!--This is the beginning of the second unordered list with a border color of 2px solid blue, a rounded border radius
             of 15px , width of 85% , margin set to to auto to center the content text align set to left 
             and the links to the php webpages in the side bar menu navigation for  if the empoyee user id is set-->

            <?php if(isset($_SESSION['user_id'])){ 
		    if($_SESSION['username'] == 'ADMIN'){
		      
		     echo "<br><h4 style='margin-left:10px;'>Admin Dashboard</h4>";
		     echo "<hr style='margin: 25px; width:85%;border-top:10px solid #115ac1;border-radius: 5px;'>";
  		     echo "<ul style='border: 2px solid blue; border-radius:15px; width:85%; margin:auto;'>";
            	     echo "<a href='employee.php?name=emply_logout'> Logout</a>";
            	     echo "<a href='employee.php?name=emplyUpdateForm'> Update Account</a>";
            	     echo "</ul>";

		     echo "<br><h4 style='margin-left:10px;'>Employee Accounts</h4>";
              	     echo "<hr style='margin: 25px; width:85%;border-top:10px solid #115ac1;border-radius: 5px;'>";
		     echo "<ul style='border: 2px solid blue; border-radius:15px; width:85%; margin:auto; text-align:left'>";
		
		     echo "<a href='employee.php?name=emplyList'>Employee Information</a>";
                     echo "<a href='employee.php?name=emplyApptList'>Appointments</a>";
		     echo "<a href='employee.php?name=emplyInvoice'>Invoices</a>";
		     echo "<a href='employee.php?name=emplyDeleteForm'> Delete Account</a>";
                     echo "</ul>";


		     echo "<br><h4 style='margin-left:10px;'>Customer Accounts</h4>";
              	     echo "<hr style='margin: 25px; width:85%;border-top:10px solid #115ac1;border-radius: 5px;'>";
		     echo "<ul style='border: 2px solid blue; border-radius:15px; width:85%; margin:auto; text-align:left'>";
		
		     echo "<a href='employee.php?name=emplyCustomerList'>Customer Information</a>";
                     echo "<a href='employee.php?name=searchForm'>Search Pets</a>";
                     echo "</ul><br>";

		
	       	 }
		
		if($_SESSION['username'] != 'ADMIN'){			
		     echo "<br><h4 style='margin-left:10px;'>Employee Dashboard</h4>";
		     echo "<hr style='margin: 25px; width:85%;border-top:10px solid #115ac1;border-radius: 5px;'>";
  		     echo "<ul style='border: 2px solid blue; border-radius:15px; width:85%; margin:auto;'>";
            	     echo "<a href='employee.php?name=emply_logout'> Logout</a>";
		     echo "<a href='employee.php?name=emplyProfile'> Account Info</a>";
            	     echo "<a href='employee.php?name=emplyUpdateForm'> Update Account</a>";
            	     echo "</ul>";

		     echo "<br><h4 style='margin-left:10px;'>Customer Accounts</h4>";
              	     echo "<hr style='margin: 25px; width:85%;border-top:10px solid #115ac1;border-radius: 5px;'>";
		     echo "<ul style='border: 2px solid blue; border-radius:15px; width:85%; margin:auto; text-align:left'>";
		
		     echo "<a href='employee.php?name=emplyCustomerList'>Customer Information</a>";
                     echo "<a href='employee.php?name=emplyCustApptView'>Appointments</a>";
		     echo "<a href='employee.php?name=emplyCustInvoice'>Customer Invoice</a>";
                     echo "<a href='employee.php?name=searchForm'>Search Pets</a>";
                     echo "</ul><br><br>";
		  }
		
	       }

            ?>
                      
          </div>
           <!--This is the beginning of the main for the side bar menu with the open button, a call to the openNav function in the index php file
            for the side bar menu navigation and an unordered element to allow the background image to fill the inside of the ul element -->
          <div id="main">
            <button class="openbtn" style="border-radius:15px;border: 3px solid black; margin-left:10px;font-size:.9em" onclick="openNav()">&#9776; Open Side Menu</button>
            <br><br>
            <ul style="background-image:url('images/pets.jpg');  background-size: 14.5em;
            background-repeat:repeat; border-radius:15px; border: 3px solid black; height: 610px"></ul>
          </div>                     
        </div>