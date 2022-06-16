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
	
	if (isset($_SESSION['email']))
	{
		$_SESSION = [];
		session_destroy();
		print"<tr><td colspan = \"5\"><p class = \"orange\">You have logged out of your account.</p></td></tr>";			
	}
	else
	{
		print"<tr><td colspan = \"5\"><p class = \"orange\">You have not logged into your account.</p></td></tr>";
	}
?>
<?php require_once("footerT.html");?>					<!-- Table footer file -->