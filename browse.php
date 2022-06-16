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
	<tr>	
		<td colspan = 5>
			<h3>Search For A Product or Browse By Product Category</h3>
		</td>
	</tr>
	<tr>
		<td colspan = 2>
			<strong>Product Categories</strong>
		</td>
		<td colspan = 3>
			<strong>Search For A Product</strong>
		</td>
	<tr>
	<tr>
		<td colspan = 2>
			<a class = "orange" href = "http://unixweb.kutztown.edu/~hkim370/dairy.php">Dairy</a><br><br>
			<a class = "orange" href = "http://unixweb.kutztown.edu/~hkim370/produce.php">Produce</a><br><br>
			<a class = "orange" href = "http://unixweb.kutztown.edu/~hkim370/beverages.php">Beverages</a><br><br>
			<a class = "orange" href = "http://unixweb.kutztown.edu/~hkim370/meats.php">Meats</a><br><br>
			<a class = "orange" href = "http://unixweb.kutztown.edu/~hkim370/baking.php">Baking</a><br><br>
			<a class = "orange" href = "http://unixweb.kutztown.edu/~hkim370/packaged.php">Packaged</a><br><br>
		</td>
		<td colspan = 3>
			<form method = "post" action = "browseSearch.php">	
			<p class = "orange"><label>Enter a search string:<br><br>
				<input type = "text" name = "search" id = "search" size = "25"/>       <!-- Asks the user for his zip code -->
			</label></p>
			<p>
				<input type = "submit" value = "Search"/>                <!-- Submit the account creation form -->
				<input type = "reset" value = "Clear"/>                     <!-- Clear the account creation form -->
			</p>
		</td>
	</tr>
<?php require_once("footerT.html");?>					<!-- Table footer file -->


















