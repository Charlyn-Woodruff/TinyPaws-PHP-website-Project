<?php
session_start();
// Student name: Charlyn Woodruff
# File document: employee.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>
    
<?php
	
// These 3 lines are the include function that includes the html in the php head, top_nav and side_nav page
include("includes/head.php");
include("includes/emply_top_nav.php");
include("includes/emply_side_nav.php");

?>

<!-- This is the beginning of the main content section of the webpage which is bootstrap small column, container with border-radius to round the container and padding of 3 -->
<div class="col-sm">
   <div class="container-fluid welcome my-3 ms-5" style="border-radius:15px; width:85%; height:98%;">
        <div class="container-fluid p-4 my-2">
          <?php
          // This declares the variable page_name and stores the value of GET name from the page link and then includes the html for that webpage
          $page_name = $_GET['name'];
          include("includes/$page_name.php");
          ?>
          
          <?php
          // This line is the include for the pawprint php file that displays the pawprints at the bottom of the main content section
          include("includes/pawprint.php");
          ?>
        </div>
    </div>
</div>

<?php
// This is the include function that includes the html in the php footer page
include("includes/footer.php");
?>  

<script>
  /*  This sets the document title to the the value in the php $page_title for each webpage*/
  document.title = "<?php echo $page_title; ?>";

  /*  This the function to open the sidebar by setting  the width to 300 px and the main left margin to 300px*/
  function openNav() {
    document.getElementById("mySidebar").style.width = "300px";
    document.getElementById("main").style.marginLeft = "300px";
  }

  /* This is the function to close the side navigation bar by setting the width of the sidebar to 0 and the left margin of the page content to 0 */
  function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
  }
</script>
   
</body>
</html>