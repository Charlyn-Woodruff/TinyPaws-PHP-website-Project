<?php
// Student name: Charlyn Woodruff
# File document: services.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>
    
<?php
// This declares the variable page_title and stores the the title for the webpage
$page_title = "Tiny Paws Pet Services";
?>

  <!--This is the h3 heading with a pawprint to the right for the services webpage in the side bar navigation--> 
  <h3>Welcome to Tiny Paws Pet Services <i style="font-size:25px" class="fa"> &#xf1b0;</i></h3>

    <!--This section is the  bootstrap div containers text center with h2 and h4 headings for the services webpage--> 
    <div class="container-fluid">
      <div class="text-center">
       
        <P>Choose a payment plan that works for you or choose single options when you schedule an appointment for your pet</p>
      </div>

      <!--This section is the bootstrap row and first column small  with a column size of 4--> 
      <div class="row">
        <div class="col-sm-4">
          <div class="panel panel-default text-center">
            <div class="panel-heading">
                <h3>Intro </h3>
            </div>

            <!--This section is the first panel body for the Intro plan-->
            <div class="panel-body">
              <p><strong>Ear & Eye cleaning</strong></p>
              <p><strong>Teeth Brushing</strong></p>
              <p><strong>Nail Trimming</strong></p>
              <p><strong>Hair Brushing</strong></p>
            </div>

            <!--This section is the first panel footer for the Intro plan with the price and a button to signup -->
            <div class="panel-footer">
              <h3>$19</h3>
            
            </div><br>
          </div>
        </div>
          <!--This section is the  second bootstrap column small with a column size of 4--> 
          <div class="col-sm-4">
            <div class="panel panel-default text-center">
              <div class="panel-heading">
                <h3>Basic</h3>
              </div>
              <!--This section is the second panel body for the Basic plan-->
              <div class="panel-body">
                <p><strong>Ear & Eye cleaning</strong></p>
                <p><strong>Teeth Brushing</strong></p>
                <p><strong>Nail Trimming</strong></p>
                <p><strong>Hair Brushing</strong></p>
                <p><strong>Hair Trimming</strong></p>
              </div>

              <!--This section is the second panel footer for the Basic plan with the price and a button to signup -->
              <div class="panel-footer">
                <h3>$29</h3>
               
              </div><br>
            </div>
          </div>

          <!--This section is the third bootstrap column small with a column size of 4-->
          <div class="col-sm-4">
            <div class="panel panel-default text-center">
              <div class="panel-heading">
                <h3>Plus </h3>
              </div>

               <!--This section is the third panel body for the Plus plan-->
              <div class="panel-body">
                <p><strong>Ear & Eye cleaning</strong></p>
                <p><strong>Teeth Brushing</strong></p>
                <p><strong>Nail & Hair Trimming</strong></p>
                <p><strong>Bath & Brushing</strong></p>
                <p><strong>Flea & Tick Treatment</strong></p>
                <p><strong>De-shedding & Dematting Treatments</strong></p>
              </div>

              <!--This section is the third panel footer for the Plus plan with the price and a button to signup -->
              <div class="panel-footer">
                <h3>$49</h3>
		          </div>
            </div>
          </div>
        </div>
      </div>