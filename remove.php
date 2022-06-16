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
			if(isset($_SESSION['productName']) && isset($_POST['remove']))
			{
				for ($x=0; $x<sizeof($_SESSION['productName']); $x++)
				{
					if (($_POST['remove'][$x]) == $x)
					{
						unset($_SESSION['productName'][$x]);
						unset($_SESSION['productID'][$x]);
						unset($_SESSION['quantity'][$x]);
						unset($_SESSION['price'][$x]);
					}
				}
				$_SESSION['productName'] = array_values($_SESSION['productName']);
				$_SESSION['productID'] = array_values($_SESSION['productID']);
				$_SESSION['quantity'] = array_values($_SESSION['quantity']);
				$_SESSION['price'] = array_values($_SESSION['price']);

				print"<tr><td colspan = \"5\"><p class = \"orange\">The selected items have been removed from your shopping cart.</p></td></tr>";	
			}
			if (isset($_SESSION['sN']) && isset($_POST['removeSearch']))
			{
				for ($x=0; $x<sizeof($_SESSION['sN']); $x++)
				{
					if ($_POST['removeSearch'][$x] == $x)
					{
						unset($_SESSION['sN'][$x]);
						unset($_SESSION['sID'][$x]);
						unset($_SESSION['sQ'][$x]);
						unset($_SESSION['sP'][$x]);
					}
				}
				$_SESSION['sN'] = array_values($_SESSION['sN']);
				$_SESSION['sID'] = array_values($_SESSION['sID']);
				$_SESSION['sQ'] = array_values($_SESSION['sQ']);
				$_SESSION['sP'] = array_values($_SESSION['sP']);
				
                if (!isset($_POST['remove'])) 
				{
					print"<tr><td colspan = \"5\"><p class = \"orange\">The selected items have been removed from your shopping cart.</p></td></tr>";
                }					
			}
		?>	
<?php require_once("footerT.html");?>					<!-- Table footer file -->		