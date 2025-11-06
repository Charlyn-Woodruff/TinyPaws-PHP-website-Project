<?php
// Student name: Charlyn Woodruff
# File document: emply_top_nav.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>
<!--This is the beginning of the body section of each webpage as bootstrap container with an h1 heading title text is white
padding on all sides of 4 the top margin is 3 and the text is center with white pawprints on each side the website name-->
<body class="container" style="border: 3px solid black; border-radius:25px; margin-top: 80px; margin-bottom: 50px;">
    <div class="container top_h1" style="border-top-right-radius:15px;border-top-left-radius:15px;">
        <h1  class="text-white p-4 mt-3 text-center"><i style="font-size:28px;" class="fa"> &#xf1b0;</i> Tiny Paws Pet Services <i style="font-size:28px" class="fa">&#xf1b0;</i></h1>
    </div>

    <!--This line is the h1 heading for the top nav to add a break area of blue between the title and the navigation section below -->
    <div>
        <h1 style="color:#115ac1">&nbsp &nbsp </h1>
    </div>	

    <!--This is the top navigation links for the website webpages inside a bootstrap div text centered and css style top_menu and the php code for if the employee session id is and is not set-->
    <div class="container text-left  my-2 top_menu ">

        <?php if(isset($_SESSION['user_id'])){
            echo"&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;<a href='employee.php?name=emply_welcome'>Home</a>";
           } 
        ?>

        <?php if(!isset($_SESSION['user_id'])){ 
            echo "&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;<a href='employee.php?name=emply_welcome'>Home</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;<a href='employee.php?name=emply_registration'> Employee Registration</a>";
            }
        ?>
</div>   