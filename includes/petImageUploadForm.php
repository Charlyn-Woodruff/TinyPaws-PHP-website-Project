<?php
// Student name: Charlyn Woodruff
# File document: petUploadImageForm.php
/* Date:Nov 19, 2024
CIT 253 Web Application PHP
*/
?>
  
<?php
// This declares the variable page_title and stores the the title for the webpage
$page_title = "Pet Image Upload Form";
?>
    <!--This is the h3 heading the Upload your pets image with a pawprint to the right-->
	<h3>Upload Your Pets Image <i style="font-size:25px" class="fa"> &#xf1b0;</i></h3>
         <p><br>Now that you have already added your pet to your Account, you can upload an image for each pet!<br> Just enter the name of your pet!</p>


         <!--This is the form for the customer to add a photo of the pet using the customers session user id and the petname--> 
        <form action="index.php?name=petImageUpload" method="post" enctype="multipart/form-data" class='h4'>
	        <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="user_id">                  
		    <label style="margin:5px 34px 8px 0px">Pet Name: </label><input type="text" name="petName" style="border:2px solid black" title="Enter valid Name" pattern="[A-Za-z ]{1,25}" placeholder=" Pet Name" required><br>

			Select image to upload:<br><br>			
			<input type="file" name="fileToUpload" id="fileToUpload"><br><br>
			<input type="submit" value="Upload Image" name="submit">
		</form>