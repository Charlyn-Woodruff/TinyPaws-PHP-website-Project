<?php
// Student name: Charlyn Woodruff
# File document: gallery.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>
    
<?php
// This declares the variable page_title and stores the the title for the webpage
$page_title = "Pet Photo Gallery ~ Tiny Paws Customers";
?>
    <!--This is the h3 heading for the photo gallery webpage with a pawprint to the right for the pet gallery webpage--> 
    <h3>Tiny Paws Photo Gallery <i style="font-size:25px" class="fa"> &#xf1b0;</i></h3>
        
        <!--This section is the bootstrap row and first column small size of 3 --> 
		<div class="row">
    		<div class="col-sm-4">
                <!--This section contains the opening and closing figure elements which contain the images 
                along with the figcaption elements for each image-->
                <figure style="margin:auto;">
                    <!--This is the images for inside the figure elements for the pet gallery webpage--> 
                    <img src = "images/oreo.jpg" alt = "Oreo" class="img-thumbnail image" />
                    <!--This is the figcaption for inside the figure elements for the pet gallery webpage-->
                    <figcaption class="h4">Oreo </figcaption>
                </figure>
                <figure>
                    <!--This is the images for inside the figure elements for the pet gallery webpage--> 
                    <img src = "images/smudge1.jpg" alt = "Smudge" class="img-thumbnail image" />
                    <!--This is the figcaption for inside the figure elements for the pet gallery webpage-->
                    <figcaption class="h4">Smudge</figcaption>
                </figure>
                <figure>
                    <!--This is the images for inside the figure elements for the pet gallery webpage--> 
                    <img src = "images/twinkie.jpg" alt = "Twinkie" class="img-thumbnail image"  />
                    <!--This is the figcaption for inside the figure elements for the pet gallery webpage-->
                    <figcaption class="h4">Twinkie</figcaption>
                </figure> 
			</div>
 			
            <!--This section is the  bootstrap second column small size of 3 --> 
		    <div class="col-sm-4" style="margin-left:10px;" >

                <figure>
                    <!--This is the images for inside the figure elements for the pet gallery webpage--> 
                    <img src = "images/misty.jpg" alt = "Misty" class="img-thumbnail image"   />
                    <!--This is the figcaption for inside the figure elements for the pet gallery webpage-->
                    <figcaption class="h4" >Misty</figcaption>
                </figure>    
                <figure>
                    <!--This is the images for inside the figure elements for the pet gallery webpage--> 
                    <img src = "images/cinder1.jpg" alt = "Cinder" class="img-thumbnail image"  />
                    <!--This is the figcaption for inside the figure elements for the pet gallery webpage-->
                    <figcaption class="h4">Cinder</figcaption>
                </figure>
                <figure>
                    <!--This is the images for inside the figure elements for the pet gallery webpage--> 
                    <img src = "images/travis.jpg" alt = "Travis" class="img-thumbnail image" />
                    <!--This is the figcaption for inside the figure elements for the pet gallery webpage-->
                    <figcaption class="h4">Travis</figcaption>
                </figure>
                    
                <?php
                    //$filename = 'Christmas.jpg';
                    //echo getImage($filename);
                ?>
                    
                <?php
                    //$customerid = 4;
                    //$petname='Sugar';
                    //echo getPetImage($customerid,$petname);
                ?>
            </div>
        </div>	