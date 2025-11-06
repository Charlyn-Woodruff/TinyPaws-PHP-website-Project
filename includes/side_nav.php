<?php
session_start();
// Student name: Charlyn Woodruff
# File document: side_nav.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>

<!--This is the beginning of the bootstrap div containers and column--> 
<div class="container side_menu">
   <div class="container-fluid">   
      <div class="row">
        <div class="col-sm-2">

          <!--This is section the side navigation for the webpages with rounded border radius of 15px with javascript close and open button function calls in the index page --> 
          <div id="mySidebar" class="sidebar" style="border-radius:15px;">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

            <!--This is the beginning of the first unordered list with a border color of 2px solid blue, a rounded border radius
             of 15px , width of 85% , margin set to to auto to center the content text align set to left 
             and the links to the php webpages in the side bar menu navigation -->

                <?php if(!isset($_SESSION['user_id'])){
                    echo "<ul style='border: 2px solid blue; border-radius:15px; width:85%; margin:auto;'>";
                    echo "<a href='index.php?name=loginForm'> Login</a>";
                    echo "<a href='index.php?name=appointments'> Appointments</a>";
                    echo "<a href='index.php?name=services'> Services</a>";
                    echo "<a href='index.php?name=groomers'> Groomers & Pets Sitters</a>";
                    echo "</ul>";
                  }
                ?>
                <!--This is the beginning of the second unordered list with a border color of 2px solid blue, a rounded border radius
                of 15px , width of 85% , margin set to to auto to center the content text align set to left 
                and the links to the php webpages in the side bar menu navigation -->

                <?php if(isset($_SESSION['user_id'])){ 

                    echo "<br><h4 style='margin-left:10px;'>Customer Dashboard</h4>";
                    echo "<hr style='margin: 25px; width:85%;border-top:10px solid #115ac1;border-radius: 5px;'>";
                    echo "<ul style='border: 2px solid blue; border-radius:15px; width:85%; margin:auto;'>";
                    echo "<a href='index.php?name=logout'> Logout</a>";
                    echo "<a href='index.php?name=appointments'> Appointments</a>";
                    echo "<a href='index.php?name=services'> Services</a>";
                    echo "<a href='index.php?name=groomers'> Groomers & Pet Sitters</a>";
                    echo "</ul>";

                    echo"<hr style='margin: 25px; width:85%;border-top:10px solid #115ac1;border-radius: 5px;'>";
                    echo "<ul style='border: 2px solid blue; border-radius:15px; width:85%; margin:auto; text-align:left'>";
                    echo "<a href='index.php?name=customerProfile'>Account Info</a>";
                    echo "<a href='index.php?name=customerUpdateForm'>Update Account</a>";
                    echo "<a href='index.php?name=customerDeleteForm'>Delete Account</a>";
                    echo "</ul>";
                
                    echo "<hr  style='margin: 25px; width:85%;border-top:10px solid #115ac1;border-radius: 5px;'>";
                    echo "<ul style='border: 2px solid blue; border-radius:15px; width:85%; margin:auto; text-align:left'>";
                    echo "<a href='index.php?name=petAddForm'>Add Pets</a>";
                    echo "<a href='index.php?name=petImageUploadForm'>Pet Image</a>";
                    echo "<a href='index.php?name=petUpdateForm'>Update Pet</a>";
                    echo "<a href='index.php?name=petDeleteForm'>Delete Pet</a>";
                    echo "</ul>";

                    echo "<hr  style='margin: 25px; width:85%;border-top:10px solid #115ac1;border-radius: 5px;'>";
                    echo "<ul style='border: 2px solid blue; border-radius:15px; width:85%; margin:auto; text-align:left'>";
                    echo "<a href='index.php?name=apptScheduleForm'>Schedule Appts</a>";
                    echo "<a href='index.php?name=apptSchedule'>Pet Appt Schedule</a>";
                    echo "<a href='index.php?name=custInvoice'>Service Invoice</a>";
                    echo "<a href='index.php?name=payInvoice'>Pay Invoice</a>";
                    echo "</ul><br><br>";
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