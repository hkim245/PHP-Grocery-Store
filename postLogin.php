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
<?php
	session_start();
?>
<?php require_once("headerT.html");?>               <!-- Table header file -->
		<?php
			include('./dbconn.php');
			db_connect();
			
			$cquery = "SELECT Email, CustomerID, Passwd FROM Customers WHERE Email = \"{$_POST['userEmail']}\"";
			$result = mysqli_query($connection,$cquery);
			$row = mysqli_fetch_array($result);
			
			if($row['Passwd'] == $_POST['userPassword'])
			{
				$_SESSION['email'] = $_POST['userEmail'];
				$_SESSION['ID'] = $row['CustomerID'];
				print"<tr><td colspan = \"5\"><p class = \"orange\">Welcome to the Generic Grocery Store!</p></td></tr>";			
			}
			else
			{
				print"<tr><td colspan = \"5\"><p class = \"orange\">Error: must provide valid email address and password</p></td></tr>";
			}
			db_close();
		?>	
<?php require_once("footerT.html");?>					<!-- Table footer file -->		