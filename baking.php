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
				
				$cquery = "SELECT CategoryID, CategoryName FROM Categories";
				$cresult = mysqli_query($connection,$cquery);
				
				$numCat = mysqli_num_rows($cresult);
				
				if ($numCat == 0)
				{
					echo "<p>There are no categories of products in the database!</p><br>";
				}
				else
				{
					print"<table style = \"border-color: green;\">";
					print'<form action = "showCart.php" method = "post">';
					print'<h2 class = "center">Baking Products</h2><br>';
					print'<tr><td><strong>Product</strong></td><td><strong>Product ID</strong></td><td><strong>Price</strong></td><td><strong>Quantity</strong></td></tr>';
					for ($i=4; $i<5; $i++)
					{
						$catName = get_mysqli_result($cresult, $i, "CategoryName");
						$catID = get_mysqli_result($cresult, $i, "CategoryID");
						
						$pquery = "SELECT Name, ProductID, Price FROM Products WHERE CategoryID = $catID";
						$presult = mysqli_query($connection,$pquery);
						
						$numProds = mysqli_num_rows($presult);
						
						for ($x=0; $x<$numProds; $x++)
						{
							$productName = get_mysqli_result($presult, $x, "Name");
							$productID = get_mysqli_result($presult,$x,"ProductID");
							$price = number_format(round(get_mysqli_result($presult,$x,"Price"),2),2);
						
							
							print"<tr><p class = \"fontcolor\"><td>$productName</td>
							<td>$productID</td><td>$$price</td><td><input type = \"text\" name = \"4[]\" size = \"5\"/></p></td></tr>";
						}
						print"<tr><td colspan = \"4\"><input type = \"submit\" name = \"submit\" value = \"Submit\"/></td></tr>";
						print'</table>';
						print'</form>';
					}
				}
				
				
				
				
				
				db_close();
			?>
		</td>
	</tr>
<?php require_once("footerT.html");?>					<!-- Table footer file -->