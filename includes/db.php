
<?php
// Student name: Charlyn Woodruff
# File document: db.php
/* Date: Nov 5, 2024
CIT 253 Web Application PHP
*/
?>

<?php  
include("db_conf.php");

// function to connect to the database
function connectDatabase(){
    global $db_serverName, $db_userName, $db_passWord, $db_Name;
    $db = mysqli_connect($db_serverName, $db_userName, $db_passWord, $db_Name);
    return($db);
 }

//function to check the password of the user returns true if they match
function checkPassWord($actual, $attempted){

    return($actual == $attempted);
}

// gets username of customer from the login form
function getUserByUserName($username){
    $connect = connectDatabase();
    if (!$connect) {
       die("Connection failed: " . $connect->connect_error);
    }

      $query ="SELECT * FROM customers WHERE UserName= ?";
      $stmt = mysqli_prepare($connect, $query);
      mysqli_stmt_bind_param($stmt,"s", $username);
      $result = mysqli_stmt_execute($stmt);
      $result = $stmt->get_result();
      $userData= mysqli_fetch_assoc($result);

      mysqli_close($connect);
   	return($userData);    
 }

 // gets customer by email
 function getUserByEmail($email){
  $connect = connectDatabase();
  if (!$connect) {
     die("Connection failed: " . $connect->connect_error);
  }

    $query ="SELECT * FROM customers WHERE Email= ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt,"s", $email);
    $result = mysqli_stmt_execute($stmt);
    $result = $stmt->get_result();
    $userData= mysqli_fetch_assoc($result);

    mysqli_close($connect);
   return($userData);    
}



//function to authenticate the user for login from the login data form
function authenticateUser($login_data){

    $user = getUserByUserName($login_data['username']);
    if (!$user){
        return false;
    }else{
        if (checkPassWord($user['PassWord'],hashPassword($login_data['password']))){

            return($user);
        }else{
            return(false);
        }
    }
 }
  
// function to hash users password
function hashPassword($password) {
    return hash("sha224", $password);
}

// gets information of the employee  by the username from the login form
function getEmplyByUserName($username){
    $connect = connectDatabase();
    if (!$connect) {
       die("Connection failed: " . $connect->connect_error);
    }

    $query ="SELECT * FROM employees WHERE Emply_UserName = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt,"s", $username);
    $result = mysqli_stmt_execute($stmt);
    $result = $stmt->get_result();
    $userData = mysqli_fetch_assoc($result);
    mysqli_close($connect);
   	return($userData);    
 }

 // gets employee by email
 function getEmplyByEmail($email){
  $connect = connectDatabase();
  if (!$connect) {
     die("Connection failed: " . $connect->connect_error);
  }

    $query ="SELECT * FROM employees WHERE Email= ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt,"s", $email);
    $result = mysqli_stmt_execute($stmt);
    $result = $stmt->get_result();
    $userData = mysqli_fetch_assoc($result);

    mysqli_close($connect);
   return($userData);    
}


//function to authenticate the user for login from the login data form
function authenticateEmplyUser($login_data){

    $user = getEmplyByUserName($login_data['username']);
    if (!$user){
        return false;
    }else{
        if (checkPassWord($user['Emply_Password'],hashPassword($login_data['password']))){

            return($user);
        }else{
            return(false);
        }
    }
 }

// function to register new customer account- WORKS
function registerCust(){

    //This line creates the server database connection to the MySQL usingth function connectDatabase()
    $connect = connectDatabase();

   // This line declares the variables for each form input as an empty string
   $firstname = $lastname = $address = $city = $state = $zip = $email = $phone = $username = $password  = " ";

   // This is the php function which will test the data input and returns sanitized data
   function test_input($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
       }

   // This line checks the server request is equal to post
   if ($_SERVER["REQUEST_METHOD"] == "POST") {

       // These lines declare the new variables with the sanitized data value from the function test_input
       $firstname = test_input($_POST["firstname"]);
       $lastname = test_input($_POST["lastname"]);
       $address = test_input($_POST["address"]);
       $city = test_input($_POST["city"]);
       $state = test_input($_POST["state"]);
       $zip = test_input($_POST["zipcode"]);
       $email = test_input($_POST["email"]); 
       $phone = test_input($_POST["phone"]);
       $username = test_input($_POST["username"]);
       $password = test_input($_POST["password"]);   
       } 


  // hash password
    $hashed_password = hashPassword($password,PASSWORD_DEFAULT);

    // This line catches the error if is not connected and prints the connection has failed 
    if (mysqli_connect_errno()){
        echo "Failed to connect:". mysqli_connect_error();
        exit();
    }
    // query the data base and insert the user information from the user form
      $query= "INSERT INTO customers(FirstName,LastName,Address,City,State,ZipCode,Phone,Email,UserName,PassWord) VALUES(?,?,?,?,?,?,?,?,?,?)";    
      $stmt = mysqli_prepare($connect,$query); 
      mysqli_stmt_bind_param($stmt,"ssssssssss",$firstname,$lastname,$address,$city,$state,$zip,$phone,$email,$username,$hashed_password);
      mysqli_stmt_execute($stmt);

    // This line closes the server and database connection
    mysqli_close($connect);
}


// function to update customer account - WORKS
function updateCust(){

    //This line creates the server database connection to the MySQL usingth function connectDatabase()
    $connect = connectDatabase();
    
    // This line catches the error if is not connected and prints the connection has failed 
    if (mysqli_connect_errno()){
        echo "Failed to connect:". mysqli_connect_error();
        exit();
    }
	 // This line declares the variables for each form input as an empty string
            $firstname = $lastname = $address = $city = $state = $zip = $email = $phone = $username = $password = " ";

            // This is the php function which will test the data input and returns sanitized data
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
                }

            // This line checks the server request is equal to post
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                // These lines declare the new variables with the sanitized data value from the function test_input
		$customerid = test_input($_POST["user_id"]);
                $fname = test_input($_POST["fname"]);
                $lname = test_input($_POST["lname"]);
                $address = test_input($_POST["address"]);
                $city = test_input($_POST["city"]);
                $state = test_input($_POST["state"]);
                $zip = test_input($_POST["zipcode"]);
		$phone = test_input($_POST["phone"]);
                $email = test_input($_POST["email"]); 
                
                $username = test_input($_POST["username"]);
                $password = test_input($_POST["password"]);    
           }   

    // hashes password to update, query database to update customer information in the database
    $hashed_password = hashPassword($password);
    // query the customer table to update the customer information from the form
    $query ="UPDATE customers SET FirstName=?, LastName=?, Address=?, City =?, State=?, ZipCode=?, Phone=?, Email=?, UserName=?,PassWord=? WHERE Customer_id=?";
    $stmt = mysqli_prepare($connect,$query);
    mysqli_stmt_bind_param($stmt,"sssssssssss",$fname,$lname,$address,$city,$state,$zip,$phone,$email,$username,$hashed_password,$customerid);
    mysqli_stmt_execute($stmt);

    // if successful will echo and display the message to webpage
    if ($stmt){
        echo "<h4>Customer Account updated successfully </h4>";
      }else{
      echo "<h4> Account has not been updated</h4>";
    }
    // This line closes the server and database connection
    mysqli_close($connect);
}

// function to delete customer account -WORKS
function deleteCust($customerid){

    //This line creates the server database connection to the MySQL using the function connectDatabase()
    $connect = connectDatabase();

      // This line catches the error if is not connected and prints the connection has failed 
        if (mysqli_connect_errno()){
            echo "Failed to connect:". mysqli_connect_error();
            exit();
        }

        // query database to delete the customer by their customer id number
          $query ="DELETE FROM customers WHERE Customer_id=?";
          $stmt = mysqli_prepare($connect,$query);
          mysqli_stmt_bind_param($stmt,"s",$customerid);
          mysqli_stmt_execute($stmt);

        // This if statement checks to see if the user account has been deleted from the database
        if ($stmt) {
            echo "<h4>Customer Account deleted successfully </h4>";
          }else{ 
          echo "<h4> Customer Account not deleted! </h4>";
        }     
	    
    // This line closes the server and database connection
    mysqli_close($connect);
}


// function to get customer by id - WORKS
function getCustById($customer_id){

    //This line creates the server database connection to the MySQL using the function connectDatabase()
    $connect = connectDatabase();

    // This line catches the error if is not connected and prints the connection has failed
      if (!$connect) {
       die("Connection failed: " . $connect->connect_error);
      }
      // query the database to select all information from the customers table where the customer_id matches the customer id in the database
       $query ="SELECT * FROM customers WHERE Customer_id = ?";
       $stmt = mysqli_prepare($connect, $query);
       mysqli_stmt_bind_param($stmt,"s",$customer_id);
       $result = mysqli_stmt_execute($stmt);
       $result = $stmt->get_result();
    
      if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        echo "<h4><li style='list-style-type: none;'>Customer Id: ".$row["Customer_id"]."</li><li style='list-style-type: none;'>Name: ".$row["FirstName"]." ".$row["LastName"]."</li><li style='list-style-type: none;'>Address:  ". $row["Address"]." ". $row['City'].",".$row['State']." ".$row['ZipCode']."</li><li style='list-style-type: none;'>Phone: ". $row["Phone"]."</li><li style='list-style-type: none;'>Email: ". $row["Email"]."</li></h4>";	
      } else {
        echo "<h4>No results found</h4>";
      } 
      // This line closes the server and database connection 
      mysqli_close($connect);        
  }

// function to get all customers information 
function getAllCustomersInfo(){

    //This line creates the server database connection to the MySQL using the function connectDatabase()
    $connect = connectDatabase();

    // This line catches the error if is not connected and prints the connection has failed
    if (!$connect) {
       die("Connection failed: " . $connect->connect_error);
    }
      //query the database to select all information from the customers table
      $query ="SELECT * FROM customers";
      $stmt = mysqli_prepare($connect, $query);
      mysqli_stmt_execute($stmt);
      $result = $stmt->get_result();
	
    if (mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row["Customer_id"]."</td><td>".$row["FirstName"]." ".$row["LastName"]."</td><td> ". $row["Address"] ."<br>".$row["City"].",".$row["State"]."</td><td> ". $row["Email"]."</td><td> ". $row["Phone"]."</td></tr>";
        }
	    echo "</table></div>";
    } else {
    	echo "<h1>No results found</h1>";
    }
    // This line closes the server and database connection   
    mysqli_close($connect);        
 }

// function to get all employees information 
function getAllEmplyInfo(){

    //This line creates the server database connection to the MySQL using the function connectDatabase()
    $connect = connectDatabase();

    // This line catches the error if is not connected and prints the connection has failed
    if (!$connect) {
       die("Connection failed: " . $connect->connect_error);
    }
      //query the database to select all information from the employees table
      $query ="SELECT * FROM employees";
      $stmt = mysqli_prepare($connect, $query);
      mysqli_stmt_execute($stmt);
      $result = $stmt->get_result();
	
    if (mysqli_num_rows($result) > 0){

       echo "<div class='table-responsive'>";
       echo "<h4>Employee Information</h4>";                      
       echo "<table class='table table-bordered table-hover' style='font-family: Roboto, Helvetica, sans-serif; border: 3px solid black;'>";
       echo "<th>Employee Id</th>";
       echo "<th>Full Name</th>";
       echo "<th>Address</th>";
       echo "<th>Email</th>";
       echo "<th>Phone</th>";

        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row["Employee_id"]."</td><td>".$row["FirstName"]." ".$row["LastName"]."</td><td> ". $row["Address"] ."<br>".$row["City"].",".$row["State"]."</td><td> ". $row["Email"]."</td><td> ". $row["Phone"]."</td></tr>";
        }
	    echo "</table></div>";
    } else {
    	echo "<h1>No results found</h1>";
    }
    // This line closes the server and database connection   
    mysqli_close($connect);        
 }

// function to get all employees information 
function getAllEmplyInfoDelete(){

    //This line creates the server database connection to the MySQL using the function connectDatabase()
    $connect = connectDatabase();

    // This line catches the error if is not connected and prints the connection has failed
    if (!$connect) {
       die("Connection failed: " . $connect->connect_error);
    }
      //query the database to select all information from the employees table
      $query ="SELECT * FROM employees";
      $stmt = mysqli_prepare($connect, $query);
      mysqli_stmt_execute($stmt);
      $result = $stmt->get_result();
	
    if (mysqli_num_rows($result) > 0){

       echo "<div class='table-responsive'>";
       echo "<h4>Employee List</h4>";                      
       echo "<table class='table table-bordered table-hover' style='font-family: Roboto, Helvetica, sans-serif; border: 3px solid black;'>";
       echo "<th>Employee Id</th>";
       echo "<th>Full Name</th>";
       echo "<th>Email</th>";
   

        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row["Employee_id"]."</td><td>".$row["FirstName"]." ".$row["LastName"]."</td><td>". $row["Email"]."</td></tr>";
        }
	    echo "</table></div>";
    } else {
    	echo "<h1>No results found</h1>";
    }
    // This line closes the server and database connection   
    mysqli_close($connect);        
 }

// function to get all employees information 
function getAllCustInfoDelete(){

    //This line creates the server database connection to the MySQL using the function connectDatabase()
    $connect = connectDatabase();

    // This line catches the error if is not connected and prints the connection has failed
    if (!$connect) {
       die("Connection failed: " . $connect->connect_error);
    }
      //query the database to select all information from the employees table
      $query ="SELECT * FROM customers";
      $stmt = mysqli_prepare($connect, $query);
      mysqli_stmt_execute($stmt);
      $result = $stmt->get_result();
	
    if (mysqli_num_rows($result) > 0){

       echo "<div class='table-responsive'>";
       echo "<h4>Customer List</h4>";                      
       echo "<table class='table table-bordered table-hover' style='font-family: Roboto, Helvetica, sans-serif; border: 3px solid black;'>";
       echo "<th>Customer Id</th>";
       echo "<th>Full Name</th>";
       echo "<th>Email</th>";
   

        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row["Customer_id"]."</td><td>".$row["FirstName"]." ".$row["LastName"]."</td><td>". $row["Email"]."</td></tr>";
        }
	    echo "</table></div>";
    } else {
    	echo "<h1>No results found</h1>";
    }
    // This line closes the server and database connection   
    mysqli_close($connect);        
 }


// function to add pet information by customer id - WORKS
function addPet(){

    //This line creates the server database connection to the MySQL using the function connectDatabase()
    $connect = connectDatabase();

       // This line catches the error if is not connected and prints the connection has failed
      if (!$connect) {
         die("Connection failed: " . $connect->connect_error);
      }

	 // This line declares the variables for each form input as an empty string
            $petName = $birthdate = $weight = $animalType = $gender = $specNeeds = " ";

            // This is the php function which will test the data input and returns sanitized data
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
                }

            // This line checks the server request is equal to post
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                // These lines declare the new variables with the sanitized data value from the function test_input
		$customerid = test_input($_SESSION['user_id']);
                $petName = test_input($_POST["petName"]);
                $bday = test_input($_POST["birthdate"]);
                $weight= test_input($_POST["weight"]);
                $type = test_input($_POST["animaltype"]);
                $gender = test_input($_POST["gender"]);
                $specNeeds = test_input($_POST["specNeeds"]); 
              }

        //query the database to insert information into the pets table  in the database
         $query= "INSERT INTO pets(Customer_id,PetName,BirthDate,Weight,AnimalType,Gender,SpecialNeeds) VALUES(?,?,?,?,?,?,?)";
         $stmt = mysqli_prepare($connect,$query); 
         mysqli_stmt_bind_param($stmt,"sssssss",$customerid,$petName,$bday,$weight,$type,$gender,$specNeeds);
         mysqli_stmt_execute($stmt);

      // if successful it will echo and display the message in the h4 element to the webpage
      if ($stmt) {
        echo "<h4>Pet Information added successfully <br> Don't forget to upload your pet's photo in the side menu!</h4>";
      }else{ 
	      echo "<h4> Pet Information not added! </h4>";
      }
    // This line closes the server and database connection  
    mysqli_close($connect);
}


// function to update pet information by customer id and pet name 
function updatePet($bday,$weight,$type,$gender,$specNeeds,$customerid,$petName){
    
  //This line creates the server database connection to the MySQL using the function connectDatabase()
    $connect = connectDatabase();

      // This line catches the error if is not connected and prints the connection has failed
      if (!$connect) {
         die("Connection failed: " . $connect->connect_error);
      }

        //query the database to update all the pets table and set the pet udpated information where the petname and customerid  matches in the database
        $query = "UPDATE pets SET BirthDate=?, Weight=?, AnimalType=?, Gender=?,SpecialNeeds=? WHERE Customer_id=? AND PetName=?";
        $stmt = mysqli_prepare($connect,$query); 
        mysqli_stmt_bind_param($stmt,"sssssss",$bday,$weight,$type,$gender,$specNeeds,$customerid,$petName);
        mysqli_stmt_execute($stmt);

      if ($stmt) {
         echo "<h4>Pet Information updated successfully </h4>";
      }else{ 
	 echo "<h4> Pet Information not updated! </h4>";
      } 
    // This line closes the server and database connection
    mysqli_close($connect);
}



// function to delete pet information by customer id and pet name -WORKS
function deletePet($customerId,$petName){
    
  //This line creates the server database connection to the MySQL using the function connectDatabase()
    $connect = connectDatabase();

     // This line catches the error if is not connected and prints the connection has failed
      if (!$connect) {
          die("Connection failed: " . $connect->connect_error);
      }
	
        $query = "DELETE FROM pets WHERE Customer_id= ? AND PetName= ?";
        $stmt = mysqli_prepare($connect,$query); 
        mysqli_stmt_bind_param($stmt,"ss",$customerId,$petName);
        mysqli_stmt_execute($stmt);    

      if ($stmt) {
          echo "<h4>Pet Information deleted successfully </h4>";
      }else{ 
        echo "<h4> Pet Information not deleted! </h4>";
      } 
    // This line closes the server and database connection
    mysqli_close($connect);
}


// function to get pets list by customer id - WORKS
function getCustPets($customerId){ 
    
  //This line creates the server database connection to the MySQL using the function connectDatabase()
    $connect = connectDatabase(); 

     // This line catches the error if is not connected and prints the connection has failed
      if (!$connect) {
         die("Connection failed: " . $connect->connect_error);
      } 
        // query database to select all information from the pets table with inner join on the customers table where the customer_id is the id in the database
        $query = "SELECT * FROM pets INNER JOIN customers ON customers.Customer_id = pets.Customer_id WHERE pets.Customer_id = ?";
        $stmt = mysqli_prepare($connect, $query);
        mysqli_stmt_bind_param($stmt,"s",$customerId);
        $result = mysqli_stmt_execute($stmt);
        $result = $stmt->get_result();

     if (mysqli_num_rows($result) > 0){
        echo "<div class='table-responsive'>";                           
        echo "<table class='table table-bordered table-hover' style='font-family: Roboto, Helvetica, sans-serif; border: 3px solid black;'>";	
        echo "<th>Customer Id</th>";
        echo "<th>Customer Name</th>";
        echo "<th>Pet Id</th>";
        echo "<th>Pet Name</th>";
        echo "<th>BirthDate</th>";
        echo "<th >Weight in lbs.</th>";
        echo "<th>Animal Type</th>";
        echo "<th>Gender</th>";
        echo "<th>Special Needs</th>";

        while($row = mysqli_fetch_assoc($result)) {
	        $petname = $row['PetName'];
          //this  function gets the image of the pet by custmer id and petname	
	        getPetImage($customerId,$petname);
          echo "<tr style='border:3px solid black'><td>".$row['Customer_id']."</td><td>".$row['FirstName']." ".$row['LastName']."</td><td> ".$row['Pet_id']."</td><td> ". $row['PetName']."</td><td>". $row['BirthDate']."</td><td>". $row['Weight']."</td><td> ". $row['AnimalType']."</td><td> ". $row['Gender']."</td><td> ". $row['SpecialNeeds']."</td></tr>";
        }

	    echo "</table></div>";
    } 
    // This line closes the server and database connection
    mysqli_close($connect);
}

// function to get pets by type -WORKS
function getPetsByType($type){
    
    //This line creates the server database connection to the MySQL using the function connectDatabase()
    $connect = connectDatabase();

      // This line catches the error if is not connected and prints the connection has failed
      if (!$connect) {
          die("Connection failed: " . $connect->connect_error);
      }
        // query database to select all information from the pets table with inner join on the customers table where pets animal type is the $type in the database
        $query = "SELECT * FROM pets INNER JOIN customers ON customers.Customer_id = pets.Customer_id WHERE pets.AnimalType = ?";
        $stmt = mysqli_prepare($connect,$query); 
        mysqli_stmt_bind_param($stmt,"s",$type);
        $result = mysqli_stmt_execute($stmt);
        $result = $stmt->get_result();
   
      if (mysqli_num_rows($result) > 0){
        echo "<div class='table-responsive'>";
        echo "<h4>Pets by Type</h4>";                      
        echo "<table class='table table-bordered table-hover' style='font-family: Roboto, Helvetica, sans-serif; border: 3px solid black;'>";
        echo "<th>Customer Id</th>";
        echo "<th>Full Name</th>";
        echo "<th>Pet Id</th>";
        echo "<th>Pet Name</th>";
        echo "<th>BirthDate</th>";
        echo "<th >Weight in lbs.</th>";
        echo "<th>Animal Type</th>";
        echo "<th>Gender</th>";
        echo "<th>Special Needs</th>";

          while($row = mysqli_fetch_assoc($result)) {
            echo "<tr style='border:3px solid black'><td>".$row['Customer_id']."</td><td>".$row['FirstName']." ".$row['LastName']."</td><td> ".$row['Pet_id']."</td><td> ". $row['PetName']."</td><td>". $row['BirthDate'] ."</td><td>". $row['Weight']."</td><td> ". $row['AnimalType']."</td><td> ". $row['Gender']."</td><td> ". $row['SpecialNeeds']."</td></tr>";
          }
	      echo "</table></div>";
      } else {
        echo "<h4>No results found!</h4>";
        }
    // This line closes the server and database connection
    mysqli_close($connect);
}


// function to register new employee account- WORKS
function registerEmply(){

      //This line creates the server database connection to the MySQL using the function connectDatabase()
      $connect = connectDatabase();
	
	 // This line declares the variables for each form input as an empty string
            $firstname = $lastname = $address = $city = $state = $zip = $email = $phone = $username = $password = " ";

            // This is the php function which will test the data input and returns sanitized data
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
                }

            // This line checks the server request is equal to post
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                // These lines declare the new variables with the sanitized data value from the function test_input
                $firstname = test_input($_POST["firstname"]);
                $lastname = test_input($_POST["lastname"]);
                $address = test_input($_POST["address"]);
                $city = test_input($_POST["city"]);
                $state = test_input($_POST["state"]);
                $zip = test_input($_POST["zipcode"]);
                $email = test_input($_POST["email"]); 
                $phone = test_input($_POST["phone"]);
                $username = test_input($_POST["username"]);
                $password = test_input($_POST["password"]);   
	        } 


      // This line catches the error if is not connected and prints the connection has failed 
      if (mysqli_connect_errno()){
          echo "Failed to connect:". mysqli_connect_error();
          exit();
      }
        // hashes employee password
        $hashed_password = hashPassword($password,PASSWORD_DEFAULT);
        // query database to insert all information to the employees table in the database
        $query= "INSERT INTO employees(FirstName,LastName,Address,City,State,ZipCode,Phone,Email,Emply_UserName,Emply_PassWord) VALUES(?,?,?,?,?,?,?,?,?,?)";    
        $stmt = mysqli_prepare($connect,$query); 
        mysqli_stmt_bind_param($stmt,"ssssssssss",$firstname,$lastname,$address,$city,$state,$zip,$phone,$email,$username,$hashed_password);
        mysqli_stmt_execute($stmt);

    // This line closes the server and database connection
    mysqli_close($connect);
}

// function to update employee account - WORKS
function updateEmply($fname,$lname,$address,$city,$state,$zip,$phone,$email,$username,$password,$emplyid){

      //This line creates the server database connection to the MySQL using the function connectDatabase()
      $connect = connectDatabase();

      // This line catches the error if is not connected and prints the connection has failed
      if (!$connect) {
          die("Connection failed: " . $connect->connect_error);
      }

        // hashes employee password
        $hashed_password = hashPassword($password);
        // query database to update all information to the employees table in the database
        $query ="UPDATE employees SET FirstName=?, LastName=?, Address=?, City=?, State=?, ZipCode=?, Phone=?, Email=?, Emply_UserName=?,Emply_PassWord=? WHERE Employee_id=?";
        $stmt = mysqli_prepare($connect,$query);
        mysqli_stmt_bind_param($stmt,"sssssssssss",$fname,$lname,$address,$city,$state,$zip,$phone,$email,$username,$hashed_password,$emplyid);
        mysqli_stmt_execute($stmt);	

      if ($stmt){
        echo "<h4>Employee Account updated successfully </h4>";
      }else{
	      echo "<h4> Employee Account has not been updated</h4>";
	    }
    // This line closes the server and database connection
    mysqli_close($connect);	
}


// function to delete employee account -WORKS
function deleteEmply($emplyid){

 //This line creates the server database connection to the MySQL using the function connectDatabase()
    $connect = connectDatabase();
    
    // This line catches the error if is not connected and prints the connection has failed
    if (!$connect) {
      die("Connection failed: " . $connect->connect_error);
    }
	
	
    // query database to delete all information where the employee id matches in the  employees table in the database
      $query ="DELETE FROM employees WHERE Employee_id = ?";
      $stmt = mysqli_prepare($connect,$query);
      mysqli_stmt_bind_param($stmt,"s",$emplyid);
      mysqli_stmt_execute($stmt);

    // This if statement checks to see if the user account has been deleted from the database
    if ($stmt) {
      echo "<h4>Employee Account deleted successfully </h4>";
    }else{ 
      echo "<h4> Employee Account not deleted! </h4>";
    }               
    // This line closes the server and database connection
    mysqli_close($connect);
}

// Function to update pet table with with image
function uploadImage($customerid,$petname){
$target_dir = 'images/';
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$filename = basename($_FILES["fileToUpload"]["name"]);
$connect = connectDatabase();

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "<h4>File is an image - " . $check["mime"] . ".</h4>";
    $uploadOk = 1;
  } else {
    echo "<h4>File is not an image.</h4>";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "<h4>Sorry, this file name already exists.</h4>";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "<h4>Sorry, your file is too large.</h4>";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "<h4>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</h4>";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "<h4>Sorry, your file was not uploaded.</h4>";
// if everything is ok, try to upload file
} else {
  // query database to update pets where the customer id and pet name matches in the pets table
	  $query ="UPDATE pets SET Filename=?  WHERE Customer_id=? AND PetName=?";
	  $stmt = mysqli_prepare($connect,$query);
	  mysqli_stmt_bind_param($stmt,"sss",$filename,$customerid,$petname);
    mysqli_stmt_execute($stmt);
	  // This line closes the server and database connection
    mysqli_close($connect);
    // moves file to folder
  	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {	
    	    echo "<h4>The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.</h4>";
  	} else {
   	     echo "<h4>Sorry, there was an error uploading your file.</h4>";
 	  }
  }
}


// function to get pet images - WORKS
function getPetImage($customerid,$petname){

      //This line creates the server database connection to the MySQL using the function connectDatabase()
      $connect =  connectDatabase();

      // This line catches the error if is not connected and prints the connection has failed 
      if (!$connect) {
          die("Connection failed: " . $connect->connect_error);
      }
        // query database to select pets information where the customer id and pet name matches in the pets table
        $query ="SELECT * FROM pets WHERE Customer_id=? AND PetName=?";
        $stmt = mysqli_prepare($connect,$query);
        mysqli_stmt_bind_param($stmt,"ss",$customerid,$petname);
        $result = mysqli_stmt_execute($stmt);
        $result = $stmt->get_result();

     if (mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)) {
              if($row['Filename']== NULL){
                      echo "<h4>You have not uploaded and image for your pet yet. </h4>";
              }else{
                // this displays the per image
                $image = "images/".$row['Filename'];
                echo "<figure><img src='$image' class='img-thumbnail image' alt='$petname' style='width:25%'/><figcaption class='h4'>$petname</figcaption><figure>";
              }	         
          }
      }
    // This line closes the server and database connection
    mysqli_close($connect);
}


// function to get employee id by employee first name and last name returns employee id -WORKS
function getEmplyId($emplyFname,$emplyLname){

    //This line creates the server database connection to the MySQL using the function connectDatabase()
    $connect =  connectDatabase();

    // This line catches the error if is not connected and prints the connection has failed 
    if (!$connect) {
        die("Connection failed: " . $connect->connect_error);
    }
      // query database to select all information from the employee table where the employee firstname and lastname matches in the database
      $query = "SELECT * FROM employees WHERE Firstname=? AND LastName=?";
      $stmt = mysqli_prepare($connect,$query);
      mysqli_stmt_bind_param($stmt,"ss",$emplyFname,$emplyLname);
      $result = mysqli_stmt_execute($stmt);
      $result = $stmt->get_result();

    if (mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)) {
          $emply_id = $row['Employee_id'];
        return($emply_id);		
        }
    }
	  // This line closes the server and database connection
    mysqli_close($connect);
}

// function to get pet id for customer  by customer id and petname returns pet id - WORKS
 function getPetId($customerid,$petname){

    //This line creates the server database connection to the MySQL using the function connectDatabase()
    $connect =  connectDatabase();

    // This line catches the error if is not connected and prints the connection has failed 
    if (!$connect) {
        die("Connection failed: " . $connect->connect_error);
    }
      // query database to select all information from the pets  table where the customer id and pet name matches in the pets table
      $query = "SELECT * FROM pets WHERE Customer_id=? AND PetName=?";
      $stmt = mysqli_prepare($connect,$query);
      mysqli_stmt_bind_param($stmt,"ss",$customerid,$petname);
      $result = mysqli_stmt_execute($stmt);
      $result = $stmt->get_result();

    if (mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)) {
          $Pet_id = $row['Pet_id'];
          // this line returns the pet id
          return($Pet_id);		
        }
    }
	 // This line closes the server and database connection
    mysqli_close($connect);
}

// function to add appointments for customer pets - WORKS
function apptSchedule(){
	
    //This line creates the server database connection to the MySQL using the function connectDatabase()
    $connect =  connectDatabase();

	 // This line declares the variables for each form input as an empty string
            $customerid = $emplyFname = $emplyLname = $petName = $apptDate = $apptTime = $reqServ = $service = " ";

            // This is the php function which will test the data input and returns sanitized data
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
                }

            // This line checks the server request is equal to post
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                // These lines take the information entered by the user with the sanitized data value from the function test_input and stores it in the variables
		$customerid = test_input($_POST['user_id']);
                $emplyFname = test_input($_POST["emplyfirstname"]);
                $emplyLname = test_input($_POST["emplylastname"]);
                $petName = test_input($_POST["petName"]);
                $apptDate = test_input($_POST["apptDate"]);
		$apptTime = test_input($_POST["apptTime"]);
                $reqServ= test_input($_POST["reqServices"]);
		$service = test_input($_POST["service"]);	

              }

    // This line catches the error if is not connected and prints the connection has failed 
    if (!$connect) {
      die("Connection failed: " . $connect->connect_error);
    }
      // functions to get emply id and pet id
      $emply_id = getEmplyId($emplyFname,$emplyLname);
      $pet_id = getPetId($customerid,$petName);

      // query database to insert all information into the appointments table in the database
      $query ="INSERT INTO appointments(Employ_id,Customer_id,Pet_id,DateofService,TimeRequested,ServicesRequested,Service) VALUES(?,?,?,?,?,?,?)";
      $stmt = mysqli_prepare($connect,$query);
      mysqli_stmt_bind_param($stmt,"sssssss",$emply_id,$customerid,$pet_id,$apptDate,$apptTime,$reqServ,$service);
      mysqli_stmt_execute($stmt);
        
    if($stmt){
      echo "<h4> Your pet appointment has been submitted, check your pet schedule for updates</h4>";
      }	
    // This line closes the server and database connection
    mysqli_close($connect);
}

// function to get customer appointments by customer id - WORKS
function getCustAppt($customer_id){

    //This line creates the server database connection to the MySQL using the function connectDatabase()
    $connect = connectDatabase();

    // This line catches the error if is not connected and prints the connection has failed 
    if (!$connect) {
       die("Connection failed: " . $connect->connect_error);
    }	
      // query database to select all information from the customer table inner joined with the appointments table 
      //where the appointsments customerid matches the customerid in the database 
      $query ="SELECT * FROM customers INNER JOIN appointments ON customers.Customer_id = appointments.Customer_id WHERE appointments.Customer_id = ?";
      $stmt = mysqli_prepare($connect, $query);
      mysqli_stmt_bind_param($stmt,"s",$customer_id);
      $result = mysqli_stmt_execute($stmt);
      $result = $stmt->get_result();	

    if (mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)) {
          $emplyid = $row['Employ_id']; 
          $emplyName = getEmplyByName($emplyid);    	
          $pet_id = $row['Pet_id'];
          $customerid = $row['Customer_id'];
          $pet_info =  getPetByName($customerid,$pet_id);
          echo "<h4><br>$pet_info<br><li style='list-style-type: none;' >Appointments: </li><li style='list-style-type: none;'>Date of Service: ".$row['DateofService']."</li><li style='list-style-type: none;'>Time Requested: ".$row['TimeRequested']."</li><li style='list-style-type: none;'>Services Requested: ".$row['ServicesRequested']."</li><li style='list-style-type: none;'>Service Amount: ".$row['Service']."</li>";
            
          if($row['Scheduled'] == NULL){
            echo "<br><li>Employee: ". $emplyName." ~ has not confirmed this appointment.</li></ul></h4><hr style= 'border-top: 8px solid #115AC1;border-radius: 5px;'>";
          }else{
            echo "<br><li>Employee: ". $emplyName." ~ confirmed this appointment. </li></ul></h4><hr style= 'border-top: 8px solid #115AC1;border-radius: 5px;'>";
          }	
      }
    } else {
    	echo "<h4>No results found</h4>";
    } 
    // This line closes the server and database connection 
    mysqli_close($connect);        
  }

// function to get pet id for customer returns pet information
 function getPetbyName($customerid,$pet_id){

      //This line creates the server database connection to the MySQL using the function connectDatabase()
      $connect =  connectDatabase();

      // This line catches the error if is not connected and prints the connection has failed
      if (!$connect) {
       die("Connection failed: " . $connect->connect_error);
    	}
        // query database to select all information from the pets table where the customer id and pet idmatches in the pets table
        $query = "SELECT * FROM pets WHERE Customer_id=? AND Pet_id=?";
        $stmt = mysqli_prepare($connect,$query);
        mysqli_stmt_bind_param($stmt,"ss",$customerid,$pet_id);
        $result = mysqli_stmt_execute($stmt);
      	$result = $stmt->get_result();

      if (mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)) {
        $petInfo = "<li style='list-style-type: none;' >Pet Name: ".$row['PetName']."</li><li style='list-style-type: none;'>Animal Type: ".$row['AnimalType']."</li><li style='list-style-type: none;'>Gender: ".$row['Gender']."</li><li style='list-style-type: none;'>Special Needs: ".$row['SpecialNeeds']."</li>";
        return($petInfo);		
        }
      }
	  // This line closes the server and database connection
    mysqli_close($connect);
}

// function to get the customer appointments for an employee
function getEmplyAppt($emply_id){

    //This line creates the server database connection to the MySQL using the function connectDatabase()
    $connect = connectDatabase();

    // This line catches the error if is not connected and prints the connection has failed
    if (!$connect) {
       die("Connection failed: " . $connect->connect_error);
    }	
      // query database to select all information from the employee table inner joined with the appointments table 
      //where the appointsments employee id matches the employee id in the database 
      $query ="SELECT * FROM employees INNER JOIN appointments ON employees.Employee_id = appointments.Employ_id WHERE appointments.Employ_id = ?";
      $stmt = mysqli_prepare($connect, $query);
      mysqli_stmt_bind_param($stmt,"s",$emply_id);
      $result = mysqli_stmt_execute($stmt);
      $result = $stmt->get_result();
   	
    if (mysqli_num_rows($result) > 0){
	    while($row = mysqli_fetch_assoc($result)) {
          $emplyName = getEmplyByName($emply_id);
          $pet_id = $row['Pet_id'];
          $customerid = $row['Customer_id'];
          $pet_info =  getPetByName($customerid,$pet_id);
          $cust = getCustById($customerid);
          echo "<h4><br>Pet Id:  $pet_id <br>  $pet_info<br><li style='list-style-type: none;'>$cust Appointments: </li><li style='list-style-type: none;'>Date of Service: ".$row['DateofService'] ."</li><li style='list-style-type: none;'>Time Requested: ".$row['TimeRequested']."</li><li style='list-style-type: none;'>Services Requested: ".$row['ServicesRequested']."</li><li style='list-style-type: none;'>Service Amount: ".$row['Service']."</li>";
	   
          if($row['Scheduled'] == NULL){
              echo "<br><li style='list-style-type: none;'>". $emplyName." ~ this appointment has not been comfirmed.</li></ul></h4><hr style= 'border-top: 8px solid #115AC1;border-radius: 5px;'>";
          }else{
              echo "<br><li style='list-style-type: none;'>". $emplyName." ~ confirmed this appointment. </li></ul></h4><hr style= 'border-top: 8px solid #115AC1;border-radius: 5px;'>";
          }	
      }
	
    } else {
    echo "<h4>No appointments found</h4>";
    }  
    // This line closes the server and database connection
    mysqli_close($connect);        
  }


// function to get the customer appointments for an employee
function getAllEmplyAppt(){

    //This line creates the server database connection to the MySQL using the function connectDatabase()
    $connect = connectDatabase();

    // This line catches the error if is not connected and prints the connection has failed
    if (!$connect) {
       die("Connection failed: " . $connect->connect_error);
    }	
      // query database to select all information from the employee table inner joined with the appointments table 
      //where the appointsments employee id matches the employee id in the database 
      $query ="SELECT * FROM employees INNER JOIN appointments ON employees.Employee_id = appointments.Employ_id ";
      $stmt = mysqli_prepare($connect, $query);
      //mysqli_stmt_bind_param($stmt,"s",$emply_id);
      $result = mysqli_stmt_execute($stmt);
      $result = $stmt->get_result();
   	
    if (mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)) {
	  $emply_id = $row['Employee_id'];
          $emplyName = getEmplyByName($emply_id);

          $pet_id = $row['Pet_id'];
          $customerid = $row['Customer_id'];
          $pet_info =  getPetByName($customerid,$pet_id);
          $cust = getCustById($customerid);
          echo "<h4><br>Pet Id:  $pet_id <br>  $pet_info<br><li style='list-style-type: none;'>$cust Appointments: </li><li style='list-style-type: none;'>Date of Service: ".$row['DateofService'] ."</li><li style='list-style-type: none;'>Time Requested: ".$row['TimeRequested']."</li><li style='list-style-type: none;'>Services Requested: ".$row['ServicesRequested']."</li><li style='list-style-type: none;'>Service Amount: ".$row['Service']."</li>";
	   
          if($row['Scheduled'] == NULL){
              echo "<br><li style='list-style-type: none; color:red'>Employee: ". $emplyName." ~ this appointment has not been comfirmed.</li></ul><br></h4><hr style= 'border-top: 8px solid #115AC1; border-radius: 5px;'>";
          }else{
              echo "<br><li style='list-style-type: none;'>Employee: ". $emplyName." ~ confirmed this appointment. </li></ul><br></h4><hr style= 'border-top: 8px solid #115AC1;border-radius: 5px;'>";
          }	
      }
	
    } else {
    echo "<h4>No appointments found</h4>";
    }  
    // This line closes the server and database connection
    mysqli_close($connect);        
  }




function approveAppt($response,$emplyid,$customerid,$petid,$date){
    //This line creates the server database connection to the MySQL using the function connectDatabase()
  $connect = connectDatabase();

    // This line catches the error if is not connected and prints the connection has failed
    if (!$connect) {
        die("Connection failed: " . $connect->connect_error);
    }
      //query the database to update all the appointments table and set the schedule where the variable data matches in the database
      $query ="UPDATE appointments SET Scheduled=? WHERE Employ_id = ? AND Customer_id =? AND Pet_id=? AND DateofService=?";
      $stmt = mysqli_prepare($connect, $query);
      mysqli_stmt_bind_param($stmt,"sssss",$response,$emplyid,$customerid,$petid,$date);
      mysqli_stmt_execute($stmt);

      // This if statement checks to see if the user account has been deleted from the database
      if ($stmt) {
          echo "<h4>Appointment approval successful! </h4>";
      }else{ 
        echo "<h4> Appointment approval not successful! </h4>";
      }               
    // This line closes the server and database connection
    mysqli_close($connect);
}

function custInvoice($date,$emplyid,$customerid,$petid,$service){
  //This line creates the server database connection to the MySQL using the function connectDatabase()
  $connect = connectDatabase();

    // This line catches the error if is not connected and prints the connection has failed
    if (!$connect) {
        die("Connection failed: " . $connect->connect_error);
    }
      //query the database to insert all the information for the invoice into the services table in the database
      $query ="INSERT INTO services (Date,Emply_id,Customer_id,Pet_id,Service) VALUES(?,?,?,?,?) ";
      $stmt = mysqli_prepare($connect, $query);
      mysqli_stmt_bind_param($stmt,"siiis",$date,$emplyid,$customerid,$petid,$service);
      mysqli_stmt_execute($stmt);

      // This if statement checks to see if the user account has been deleted from the database
      if ($stmt) {
        echo "<h4>Customer invoice sent successfully! </h4>";
      }else{ 
        echo "<h4>Error ~ Customer invoice not sent! </h4>";
      }               
    // This line closes the server and database connection
    mysqli_close($connect);
}

function getCustInvoice($custId){
    //This line creates the server database connection to the MySQL using the function connectDatabase()
    $connect = connectDatabase();
    $emplyid = $emplyName = $petid = $petName =" ";
	
    // This line catches the error if is not connected and prints the connection has failed
    if (!$connect) {
        die("Connection failed: " . $connect->connect_error);
    }
      //query the database to select all information from the services table where the custId is the customer id in the database
      $query ="SELECT * FROM services WHERE Customer_id =? ";
      $stmt = mysqli_prepare($connect, $query);
      mysqli_stmt_bind_param($stmt,"s",$custId);
      $result = mysqli_stmt_execute($stmt);
      $result = $stmt->get_result();
  
    if (mysqli_num_rows($result) > 0){		
      while($row = mysqli_fetch_assoc($result)) {
        $emplyid = $row['Emply_id'];
        $emplyName = getEmplyByName($emplyid);
        $petid = $row['Pet_id'];
        $petName = getPetByName($custId, $petid);
        echo "<h4><br><li style='list-style-type: none;'>Pet Id: ". $row['Pet_id']. "<li style='list-style-type: none;' > $petName </li><li style='list-style-type: none;'>Employee Name: ".$emplyName ."</li><li style='list-style-type: none;'>Service Date: ".$row['Date']."</li><li style='list-style-type: none;'>Service Amounts: ".$row['Service']."</li>";
        
	// this if statement checks to see if the service amount equals 0 in the database
        if($row['Service'] == 0.00){
             echo "<h4>This invoice has been paid</h4><hr style= 'border-top: 8px solid #115AC1;border-radius: 5px;'>";
         }else{       
	     echo "<h4 style='color:red'>This invoice has not been paid</h4><hr style= 'border-top: 8px solid #115AC1;border-radius: 5px;'>";
           }
      }
      
               
   }else{ 
      echo"<h4> No Invoice Results found</h4>";
    }           
    // This line closes the server and database connection
    mysqli_close($connect);
}

function getCustInvoiceEmply($emply_Id){
    //This line creates the server database connection to the MySQL using the function connectDatabase()
    $connect = connectDatabase();
    $emplyid = $emplyName = $petid = $petName =" ";
	
    // This line catches the error if is not connected and prints the connection has failed
    if (!$connect) {
        die("Connection failed: " . $connect->connect_error);
    }
    //query the database to select all information where the emply_id is the employee id in the database
      $query ="SELECT * FROM services WHERE Emply_id =? ";
      $stmt = mysqli_prepare($connect, $query);
      mysqli_stmt_bind_param($stmt,"s",$emply_Id);
      $result = mysqli_stmt_execute($stmt);
      $result = $stmt->get_result();
   	 
    if (mysqli_num_rows($result) > 0){		
      while($row = mysqli_fetch_assoc($result)) {
        $custId = $row['Customer_id'];
        $emplyid = $row['Emply_id'];
        // sets emplyName to the function getEmplyByName by the employee id
        $emplyName = getEmplyByName($emplyid);
        $petid = $row['Pet_id'];
        // sets petName to the function getPetByName by the customer id and the pet id
        $petName = getPetByName($custId,$petid);
        // sets cust to the function getcustById by the customer id
        $cust = getCustById($custId);
        echo "<h4><br><li style='list-style-type: none;'>Pet Id: ". $row['Pet_id']. "<li style='list-style-type: none;' >$cust $petName</li><li style='list-style-type: none;'><br>Employee Name: ".$emplyName ."</li><li style='list-style-type: none;'>Service Date: ".$row['Date']."</li><li style='list-style-type: none;'>Service Amounts: ".$row['Service']."</li>";
        
        // this if statement checks to see if the service amount equals 0 in the database
        if($row['Service'] != 0.00){
          echo "<h4 style='color:red'>This invoice has not been paid $".$row['Service']."</h4><hr style= 'border-top: 8px solid #115AC1;border-radius: 5px;'></h4>";	
        }else{
          echo "<h4>This invoice has been paid</h4><hr style= 'border-top: 8px solid #115AC1;border-radius: 5px;'>";
        }
      }
             
    }else{ 
	    echo"<h4> No Invoice Results found</h4>";
    }           
    // This line closes the server and database connection
    mysqli_close($connect);
}



function getAllEmplyInvoices(){
    //This line creates the server database connection to the MySQL using the function connectDatabase()
    $connect = connectDatabase();
    $emplyid = $emplyName = $petid = $petName =" ";
	
    // This line catches the error if is not connected and prints the connection has failed
    if (!$connect) {
        die("Connection failed: " . $connect->connect_error);
    }
    //query the database to select all information where the emply_id is the employee id in the database
      $query ="SELECT * FROM services";
      $stmt = mysqli_prepare($connect, $query);
     
      $result = mysqli_stmt_execute($stmt);
      $result = $stmt->get_result();
   	 
    if (mysqli_num_rows($result) > 0){		
      while($row = mysqli_fetch_assoc($result)) {
        $custId = $row['Customer_id'];
        $emplyid = $row['Emply_id'];
        // sets emplyName to the function getEmplyByName by the employee id
        $emplyName = getEmplyByName($emplyid);
        $petid = $row['Pet_id'];
        // sets petName to the function getPetByName by the customer id and the pet id
        $petName = getPetByName($custId,$petid);
        // sets cust to the function getcustById by the customer id
        $cust = getCustById($custId);
        echo "<h4><br><li style='list-style-type: none;'>Pet Id: ". $row['Pet_id']. "<li style='list-style-type: none;' >$cust $petName</li><li style='list-style-type: none;'><br>Employee Name: ".$emplyName ."</li><li style='list-style-type: none;'>Service Date: ".$row['Date']."</li><li style='list-style-type: none;'>Service Amount: ".$row['Service']."</li>";
        
        // this if statement checks to see if the service amount equals 0 in the database
        if($row['Service'] != 0.00){
          echo "<h4 style='color:red'>This invoice has not been paid ~ Service Amount: $". $row['Service'] ."</h4><hr style= 'border-top: 8px solid #115AC1;border-radius: 5px;'></h4>";	
        }else{
          echo "<h4>This invoice has been paid</h4><hr style= 'border-top: 8px solid #115AC1;border-radius: 5px;'>";
        }
      }
             
    }else{ 
	    echo"<h4> No Invoice Results found</h4>";
    }           
    // This line closes the server and database connection
    mysqli_close($connect);
}



function getEmplyByName($emplyid){
//This line creates the server database connection to the MySQL using the function connectDatabase()
  $connect = connectDatabase();
	$emplyFname = " ";
  // This line catches the error if is not connected and prints the connection has failed
  if (!$connect) {
      die("Connection failed: " . $connect->connect_error);
  }
    //query the database to select all information where the emplyid is the cemployee id in the database
    $query ="SELECT * FROM employees WHERE Employee_id = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt,"s",$emplyid);
    $result = mysqli_stmt_execute($stmt);
    $result = $stmt->get_result();

 	if (mysqli_num_rows($result) > 0){
	    while($row = mysqli_fetch_assoc($result)) {   
	       $emplyFname = $row['FirstName'] ." ".$row['LastName'] ;	
	    }
	 // This line closes the server and database connection
    mysqli_close($connect);
	}
  // this returns the employee full name
	return($emplyFname);   
}

// function to get employee by id 
function getEmplyById($emply_id){

    //This line creates the server database connection to the MySQL using the function connectDatabase()
    $connect = connectDatabase();

    // This line catches the error if is not connected and prints the connection has failed
      if (!$connect) {
       die("Connection failed: " . $connect->connect_error);
      }
      // query the database to select all information from the customers table where the customer_id matches the customer id in the database
       $query ="SELECT * FROM employees WHERE Employee_id = ?";
       $stmt = mysqli_prepare($connect, $query);
       mysqli_stmt_bind_param($stmt,"s",$emply_id);
       $result = mysqli_stmt_execute($stmt);
       $result = $stmt->get_result();
    
      if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        echo "<h4><li style='list-style-type: none;'>Emply Id: ".$row["Employee_id"]."</li><li style='list-style-type: none;'>Name: ".$row["FirstName"]." ".$row["LastName"]."</li><li style='list-style-type: none;'>Address:  ". $row["Address"]." ". $row['City'].",".$row['State']." ".$row['ZipCode']."</li><li style='list-style-type: none;'>Phone: ". $row["Phone"]."</li><li style='list-style-type: none;'>Email: ". $row["Email"]."</li></h4>";	
      } else {
        echo "<h4>No results found</h4>";
      } 
      // This line closes the server and database connection 
      mysqli_close($connect);        
  }


//function to get the invoices for the customer by id
function getInvoice($custId){
//This line creates the server database connection to the MySQL using the function connectDatabase()
  $connect = connectDatabase();
	
  // This line catches the error if is not connected and prints the connection has failed
  if (!$connect) {
      die("Connection failed: " . $connect->connect_error);
  }
  //query the database to select all information where the customerid is the customer id in the database
    $query ="SELECT * FROM services WHERE Customer_id = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt,"s",$custId);
    $result = mysqli_stmt_execute($stmt);
    $result = $stmt->get_result();
    $serviceId = " ";
    $totalAmt = " ";
    $total = " ";

 	if (mysqli_num_rows($result) > 0){
    // this while loop fetches the result of the query and returns the invoice amounts which are added and stored in the variable $total 
	    while($row = mysqli_fetch_assoc($result)) { 
	      $totalAmt = $row['Service'];
	      $total = $totalAmt + $row['Service'];	
	    }
      // this line echo the total amount to the form for the customer
    echo "<h4>Total for account is $ $total</h4>";
	
	}
	  // This line closes the server and database connection
    mysqli_close($connect);
    // this returns the total amount of the invoices
	return($total);   
}

//function to get the number of invoices for the customer by id
function getInvoiceCount($custId){
//This line creates the server database connection to the MySQL using the function connectDatabase()
  $connect = connectDatabase();
	
  // This line catches the error if is not connected and prints the connection has failed
  if (!$connect) {
      die("Connection failed: " . $connect->connect_error);
  }
  //query the database to select all information where the customerid is the customer id in the database
    $query ="SELECT * FROM services WHERE Customer_id = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt,"s",$custId);
    $result = mysqli_stmt_execute($stmt);
    $result = $stmt->get_result();
    $numRows = mysqli_num_rows($result) ;	
	
	  // This line closes the server and database connection
    mysqli_close($connect);
    // this returns the total amount of the invoices
	return($numRows);   
}


// function to get the amount a customer pays on their invoice by their customer id from the session id
function paidInvoice($amtPaid,$custId){

    //This line gets the invoice total by the customer id and stores it in the variable $total
    $total = getInvoice($custId);
    // This line gets the number of customer invoices  
    $numRows = getInvoiceCount($custId);
    //This line gets the amount paid by the customer from the form and converts it to a string 
    $amtDue = strval($total);
    $amtDue = (int)$amtDue;

  //this if statement checks to see if the amounts are the same, if the are it echo the message total has been paid and calls the function updateInvoice
  //with the customerid to update the database, if the amount due is greater tan the amt paid, it will minus the amt paid divide it by the number of invocies and uodate the invoice
	if($amtDue == $amtPaid){
	    $totalDue = $amtDue - $amtPaid;
	    echo "<h4>Your Invoice Total has been paid in full</h4>";	
	    updateInvoice($custId,$totalDue);           
 	}elseif($amtDue > $amtPaid){
		$totalDue = ($amtDue - $amtPaid); 
    		echo "<h4>Your invoice total has not been paid in full, remaining amount: $ $totalDue </h4>";
		$totalDues = $totalDue / $numRows;
		updateInvoice($custId, $totalDues); 
		return($totalDue);
  	}
}



// Function to update the invoice paid status when a customer pays their invoice
function updateInvoice($custId,$totalDue){
//This line creates the server database connection to the MySQL using the function connectDatabase()
  $connect = connectDatabase();
  $paidStatus = "Yes";

	// This line catches the error if is not connected and prints the connection has failed
  if (!$connect){
      die("Connection failed: " . $connect->connect_error);
  }
    // query the database to update the service amount and the paid status to yes
    $query ="UPDATE services SET Service=?, PaidStatus=? WHERE Customer_id=?";
    $stmt = mysqli_prepare($connect,$query);
    mysqli_stmt_bind_param($stmt,'sss', $totalDue,$paidStatus,$custId);
    mysqli_stmt_execute($stmt);

	// This line closes the server and database connection
  mysqli_close($connect);
}

  # our SiteKey (needed to display the captcha div element) is:
  # 6LdocX0UAAAAALCiQ4nvROQtgRhV5mI1kS-8LNaR
  # our secret is below

  function captchaCheck($response){
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
      'secret' => '6LdocX0UAAAAAJB3HG_IfjjXdI2y-18uR7y_LHB4',
      'response' => $response
    );
    $options = array(
      'http' => array(
        'method' => 'POST',
        'content' => http_build_query($data)
      )
    );
    $context = stream_context_create($options);

    $verify = file_get_contents($url, false, $context);

    $captcha_response = json_decode($verify);
    return($captcha_response->success);
  }

?>