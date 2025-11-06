<?php
// Student name: Charlyn Woodruff
# File document: read.php
/* Date: Sept 25, 2024
CIT 253 Web Application PHP
*/
?>
<DOCTYPE HTML>
<html lang="en">
	<head>
		<?php
		// This declares the variable page_title and stores the the title for the webpage
		$page_title = "Tiny Paws Customer List";
		?>
	</head>
	<body>
		<!--This is the h3 heading  and paragraph for the process page after the customer signs up for an account  with a pawprint to the right-->
		<h3>Thank you for signing up! <i style="font-size:25px" class="fa">&#xf1b0;</i></h3>    
		<p> 
			You may now login to your Tiny Paws Account in the side Bar menu!
		</p>

		<?php
		// These lines declare the php variables and values for the server, username, and password
		$db_serverName = "maria";
		$db_userName = "cpwoodruff";
		$db_passWord = "Char67";
		$db_Name = "cpwoodruff_project";

		//This line creates the server database connection to the MySQL using MySQLi with a username, password and the existing database name

		$connect_db = mysqli_connect($db_serverName, $db_userName, $db_passWord, $db_Name);

		// This line catches the error if is not connected and prints the connection has failed to the webpage
		if (mysqli_connect_errno()){
			echo "Failed to connect:". mysqli_connect_error();
			exit();
		}else{
			echo "<h3> Database Connection Successful! </h3>";

			$sql = "SELECT Customer_id, FirstName, LastName, Phone,Email, UserName, PassWord FROM customers";
			$result = mysqli_query($connect_db, $sql);

			if (mysqli_num_rows($result) > 0) {
				echo "<br><h3>Tiny Paws ~ Customer List</h3>";
				while($row = mysqli_fetch_assoc($result)) {
					echo "<li>Customer id: " . $row["Customer_id"]. " - Name: " . $row["FirstName"]. " " . $row["LastName"]. " Phone: ". $row["Phone"]." Email: ". $row["Email"]." Username: ". $row["UserName"]." Password: ". $row["PassWord"]."</li><br>";
				}
			} else {
				echo "<h4>No results found</h4>";
			}
		}
		// This line closes the server and database connection
		mysqli_close($connect_db);
		?>
	</body>
</html>