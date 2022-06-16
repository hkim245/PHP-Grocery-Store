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
		<td class = "left" colspan = 5>
			<?php
				include('./dbconn.php');
				db_connect();
				
				$cquery = "SELECT * FROM Products WHERE Name LIKE \"%{$_POST['search']}%\"";
				$cresult = mysqli_query($connection,$cquery);
				$row = mysqli_fetch_array($cresult);
			
				if ($row == 0)
				{
					echo "<p>No search results were found.<br>";
				}
				else
				{
					print"<table style = \"border-color: green;\">";
					print'<form action = "showCart.php" method = "post">';
					print'<h2 class = "center">Search Results</h2><br>';
					print'<tr><td><strong>Product</strong></td><td><strong>Product ID</strong></td><td><strong>Price</strong></td><td><strong>Quantity</strong></td></tr>';
					$productName = $row['Name'];
					$productID = $row['ProductID']; 
					$price = number_format(round($row['Price'],2),2);
					$_SESSION['searchName1'] = $productName;
					$_SESSION['searchID1'] = $productID;
					$_SESSION['searchPrice1'] = $price;
					print"<tr><p class = \"fontcolor\"><td>$productName</td>
					<td>$productID</td><td>$$price</td><td><input type = \"text\" name = \"browseSearch\" size = \"5\"/></p></td></tr>";
					print"<tr><td colspan = \"4\"><input type = \"submit\" name = \"submit\" value = \"Submit\"/></td></tr>";
					print'</table>';
					print'</form>';
				}
				db_close();
				
			?>
			
		</td>
	</tr>
<?php require_once("footerT.html");?>					<!-- Table footer file -->