<!DOCTYPE html>
<html>
<head>
 <?php 
     // This declares the variable page_title and stores the the title for the webpage
     $page_title = "Customer Pay Invoice ~ Tiny Paws"; 
 ?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

input[type=text] {
  font-family: Oswald, Helvetica, sans-serif;
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 2px solid #115AC1;
  border-radius: 3px;
}

label {
  font-family: Oswald, Helvetica, sans-serif;
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  font-family: Oswald, Helvetica, sans-serif;
  background-color: #115AC1;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 40%;
  border-radius: 15px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  font-family: Oswald, Helvetica, sans-serif;
  background-color: white;
  color:#115AC1;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

</style>
</head>
<body>

<!--This is the h3 heading with a pawprint to the right for the customer pay Invoice webpage in the side bar navigation--> 

<h3>Pay Invoice Form</h3>

<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="index.php?name=paidInvoice" method="POST">
      <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="user_id">
        <div class="row">
          <div class="col-50">
            <h4>Billing Address</h4>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="First Name">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="youremail@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="Ocean City">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="MD">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="26758">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h4>Payment</h4>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="Name on Card">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>

        <?php
        // this line sets the custId to the customers session user id and then calls the function getInoice with the parameter of the customer id
          $custId = $_SESSION['user_id'];
          getInvoice($custId);
        ?>
	      <input type="text" style="width:50%" inputmode="decimal"  id="float-input" name="amtPaid" placeholder="Amount to pay example ~ 30" pattern="[0-9]*[.,]?[0-9]*"><br>
        <input type="submit"  value="Submit Payment" class="btn">
      </form>
    </div>
  </div>
  <div class="col-25">
   </div>
</div>