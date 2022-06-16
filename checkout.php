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
* Purpose: This PHP code displays a successful login page.			   *								
************************************************************************
--> 
<?php
	session_start();
?>
<?php require_once("headerT.html");?>               <!-- Table header file -->
	<tr>
		<td colspan = 5>
		<?php
				include('./dbconn.php');
				db_connect();
				
				
				
				
				
				if (!isset($_SESSION['email']))
				{
					echo "<p class = \"orange\">You have not logged into your account.</p><br>";
					return;
				}
				else if (!isset($_POST))
				{
				    echo "<p class = \"orange\">Your shopping cart is currently empty.</p><br>";
					return;
				}
				else if (isset($_SESSION['email']) && (isset($_SESSION['sN'])) || (isset($_SESSION['productName'])))
				{

				print"<table style = \"border-color: green;\">";
				print"<h2 class = \"left\">Checkout Order </h2>";
				print'<tr><td><strong>Name</strong></td><td><strong>Product ID</strong></td><td><strong>Quantity</strong></td><td><strong>Line Total</strong></td></tr>';
				
				print'<form action = "finalOrder.php" method = "post">';
					if (isset($_SESSION['sN']))
					{
						for ($x=0; $x<sizeof($_SESSION['sN']); $x++)
						{
							print"<tr><p class = \"fontcolor\"><td>{$_SESSION['sN'][$x]}</td>
							<td>{$_SESSION['sID'][$x]}</td><td>{$_SESSION['sQ'][$x]}</td><td>\${$_SESSION['sP'][$x]}
							</td>";
						}
					}
					
					if (isset($_SESSION['productName']))
					{
							
							for ($x=0; $x<sizeof($_SESSION['productName']); $x++)
							{
								print"<tr><p class = \"fontcolor\"><td>{$_SESSION['productName'][$x]}</td>
								<td>{$_SESSION['productID'][$x]}</td><td>{$_SESSION['quantity'][$x]}</td><td>\${$_SESSION['price'][$x]}
								</td>";
							}	
					}
					if ($_SESSION['subTotal'] > 0)
					{
					print'</form>';	
					print"<tr><td colspan = \"4\">Order Sub-Total: \${$_SESSION['subTotal']}<br>Tax: \${$_SESSION['tax']}<br>Shipping + Handling: \${$_SESSION['shipping']}
					<br>Order Total: \${$_SESSION['total']}</td></tr>";
					print'<form action = "finalOrder.php" method = "post">
					<tr><td colspan = "5"><input type = "submit" name = "submit" value = "Confirm Order"></form><br><br>
					<form action = "browse.php" method = "post">
					<input type = "submit" name = "browse" value = "Browse"></td></tr></form>';
					print'</table>';
					}
				}
				else
				{
					echo "<p class = \"orange\">Your shopping cart is currently empty.</p><br>";
				}
				db_close();
		
		?>
		</td>
	</tr>
<?php require_once("footerT.html");?>					<!-- Table footer file -->