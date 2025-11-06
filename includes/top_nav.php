<?php
// Student name: Charlyn Woodruff
# File document: top_nav.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>

	<!--This is the beginning of the body section of each webpage as bootstrap container with an h1 heading title text is white padding on all sides of 4 the top margin is 3 and the text is center with white pawprints on each side the website name-->
	<body class="container" style="border: 3px solid black; border-radius:25px; margin-top: 80px; margin-bottom: 50px;">
	   <div class="container top_h1" style="border-top-right-radius:15px;border-top-left-radius:15px;">
    	     <h1  class="text-white p-4 mt-3 text-center"><i style="font-size:28px;" class="fa"> &#xf1b0;</i> Tiny Paws Pet Services <i style="font-size:28px" class="fa">&#xf1b0;</i></h1>
	   </div>

		<!--This line is the h1 heading for the top nav to add a break area of blue between the title and the navigation section below -->
	   <div>
    	    <h1 style="color:#115ac1">&nbsp &nbsp </h1>
	   </div>
	
		<!--This is the top navigation php for if the user sessio is set and foe when the user session is not set-->
		<?php 
			if(!isset($_SESSION['user_id'])){
			echo "<div class='container text-center my-2 top_menu '><a href='index.php?name=welcome'>Home</a> | <a href='index.php?name=about'>About</a> | <a href='index.php?name=gallery'>Pet Photo Gallery</a> | <a href='index.php?name=contact'>Contact Us</a>  | <a href='index.php?name=registration'> Customer Registration</a> | &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;<a href='employee.php?name=emply_welcome'>Employees</a>";
			}
		?>
		<?php 
			if(isset($_SESSION['user_id'])){
			echo "<div class='container text-center my-2 top_menu '><a href='index.php?name=welcome'>Home</a> | <a href='index.php?name=about'>About</a> | <a href='index.php?name=gallery'>Pet Photo Gallery</a> | <a href='index.php?name=contact'>Contact Us</a>";
			}
		?>
	</div>   