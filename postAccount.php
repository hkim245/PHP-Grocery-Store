<!--
************************************************************************
* Author: Harry Kim 												   *
* Major: Information Technology 									   *
* Creation Date: April 25, 2018 									   *
* Due Date: May 4, 2018											       *
* Course: CSC242010 												   *
* Professor: Dr. Carelli											   *
* Assignment: Grocery Store Project									   *
* Filename: postLogin.php											   *
* Purpose: This PHP code displays a successfull login page.			   *								
************************************************************************
--> 
<!DOCTYPE html>
<?php
	session_start();
?>
<?php require_once("headerT.html");?>               <!-- Table header file -->
		<?php 
			include('./dbconn.php');
			db_connect();
			if (isset($_POST))
			{
				$_SESSION['email'] = $_POST['enterEmail'];
				$cquery = "SELECT Email, CustomerID, Passwd FROM Customers WHERE Email = \"{$_POST['enterEmail']}\"";
				$result = mysqli_query($connection,$cquery);
				$row = mysqli_fetch_array($result);
				$_SESSION['ID'] = $row['CustomerID'];
				print"<tr><td colspan = \"5\"><p class = \"orange\">You have successfully created an account on the website!</p></td></tr>";			
			}
			else
			{
				print"<tr><td colspan = \"5\"><p class = \"orange\">Error: Account not created</p></td></tr>";
			}
			$enterEmail = mysqli_real_escape_string($connection,trim(strip_tags($_POST['enterEmail'])));
			$createPassword = mysqli_real_escape_string($connection,trim(strip_tags($_POST['createPassword'])));
			$firstName = mysqli_real_escape_string($connection,trim(strip_tags($_POST['firstName'])));
			$lastName = mysqli_real_escape_string($connection,trim(strip_tags($_POST['lastName'])));
			$streetAddress = mysqli_real_escape_string($connection,trim(strip_tags($_POST['streetAddress'])));
			$streetAddress2 = mysqli_real_escape_string($connection,trim(strip_tags($_POST['streetAddress2'])));
			$zipCode = mysqli_real_escape_string($connection,trim(strip_tags($_POST['zipCode'])));
			$stateAddress = mysqli_real_escape_string($connection,trim(strip_tags($_POST['stateAddress'])));
			$phoneNumber = mysqli_real_escape_string($connection,trim(strip_tags($_POST['phoneNumber'])));
			$cityAddress = mysqli_real_escape_string($connection,trim(strip_tags($_POST['cityAddress'])));

			$cquery = "INSERT INTO Customers (Email,Passwd,FirstName,LastName,Address1,Address2,ZipCode,State,PhoneNumber,City) VALUES ('$enterEmail', '$createPassword', '$firstName', '$lastName', '$streetAddress', '$streetAddress2', '$zipCode', '$stateAddress', '$phoneNumber', '$cityAddress')";
			$result = mysqli_query($connection,$cquery);
			$error = mysqli_error($connection);
			db_close();
		?>
<?php require_once("footerT.html");?>					<!-- Table footer file -->