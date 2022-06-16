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
				
				$cquery = "SELECT CategoryID, CategoryName FROM Categories";
				$cresult = mysqli_query($connection,$cquery);
				
				$numCat = mysqli_num_rows($cresult);
				
				$subTotal = 0;
				$removeSearchCounter = 0;
				$removeCounter = 0;
		
				if (!isset($_SESSION['email']) || !isset($_POST))
				{
					echo "<p class = \"orange\">Your shopping cart is currently empty.</p><br>";
				}
				else if (isset($_SESSION['email']) && (isset($_SESSION['sN']) || isset($_SESSION['productName'])))
				{
					print"<table style = \"border-color: green;\">";
					print'<tr><td><strong>Name</strong></td><td><strong>Product ID</strong></td><td><strong>Quantity</strong></td><td><strong>Line Total</strong></td></tr>';
					print'<form action = "remove.php" method = "post">';
					if (isset($_SESSION['sN'][0]))
					{
						for ($x=0; $x<sizeof($_SESSION['sN']); $x++)
						{
							print"<tr><p class = \"fontcolor\"><td>{$_SESSION['sN'][$x]}</td>
							<td>{$_SESSION['sID'][$x]}</td><td>{$_SESSION['sQ'][$x]}</td><td>\${$_SESSION['sP'][$x]}
							</td><td><input type = \"submit\" name = \"removeSearch[]\" value = '$removeSearchCounter' size = \"5\"/></p></td></tr> Remove Item";
							$subTotal += $_SESSION['sP'][$x]; 
							$removeSearchCounter += 1;
						}
					}
					

					
					
					if (isset($_SESSION['productName']))
					{
							
							for ($x=0; $x<sizeof($_SESSION['productName']); $x++)
							{
								print"<tr><p class = \"fontcolor\"><td>{$_SESSION['productName'][$x]}</td>
								<td>{$_SESSION['productID'][$x]}</td><td>{$_SESSION['quantity'][$x]}</td><td>\${$_SESSION['price'][$x]}
								</td><td><input type = \"submit\" name = \"remove[]\" value = '$removeCounter' size = \"5\"/></p></td></tr> Remove Item";
								$subTotal += $_SESSION['price'][$x];
								$removeCounter += 1;
							}	
					}
					
					print'</form>';	
					if ((isset($_SESSION['sN'])) || (isset($_SESSION['productName'])))
					{
					$tax = number_format(round($subTotal*.06,2),2);
					$items = 0;
					if (isset($_SESSION['sN']))
					{
					for ($x=0; $x<sizeof($_SESSION['sN']); $x++)
					{
							$items++;
					}
					}
					if (isset($_SESSION['productName']))
					{
							for ($x=0; $x<sizeof($_SESSION['productName']); $x++)
							{
								$items++;
							}
					}
					if ($items < 10)
					{
						$shipping = 3.95;
					}
					else if (($items >= 11) && ($items <= 15))
					{
						$shipping = 4.95;
					}
					else if ($items >= 16 && ($items <= 20))
					{
						$shipping = 5.45;
					}
					else
					{
						$shipping = 6.95;
					}

					$_SESSION['total'] = number_format(round($tax + $subTotal + $shipping,2),2);
					$_SESSION['tax'] = $tax;
					$_SESSION['subTotal'] = $subTotal;
					$_SESSION['shipping'] = $shipping;
					if ($_SESSION['subTotal'] > 0)
					{
					print"<tr><td colspan = \"5\">Order Sub-Total: \${$_SESSION['subTotal']}<br>Tax: \${$_SESSION['tax']}<br>Shipping + Handling: \${$_SESSION['shipping']}
					<br>Order Total: \${$_SESSION['total']}</td></tr>";
					print'<form action = "checkout.php" method = "post">
					<tr><td colspan = "5"><input type = "submit" name = "submit" value = "Checkout"/></form><br><br>
					<form action = "browse.php" method = "post">
					<input type = "submit" name = "browse" value = "Browse"/></td></tr></form>';
					print'</table>';
					}
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