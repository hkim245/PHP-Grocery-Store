<!--
*****************************************************************************
* Author: Harry Kim 												      	*
* Major: Information Technology 									      	*
* Creation Date: April 8, 2018 											  	*
* Due Date: May 4, 2018 											      	*
* Course: CSC242010 												      	*
* Professor: Dr. Carelli											      	*
* Assignment: Account Forms 										      	*
* Filename: accountForms.php											  	*
* Purpose: This PHP code uses a table to organize the elements of a         *
*		   web page for an account creation and login page for the			*
*          user. It uses an external style sheet for the presentation 		*
*		   of the webpage. It uses the form method to post the 				*
*		   information to a php webpage. It uses the input element			*
*		   for user input and different attributes, such as 				*
*		   placeholder, name, and size.	It asks the user for his 	        *
*		   email address, password, first name, last name, street 			*
*		   address, second street address, city address, state address, 	*
*		   zip code, and phone number. This information is sent to the PHP	*
*          code by the form method. It uses a header file for links at 		*
*		   the top of the webpage and a footer file for the bottom of the 	*
*		   webpage.															* 
*****************************************************************************  
-->  
<?php require_once("headerT.html");?>				<!-- Table header file -->
	<script>
		function dataValidation()
		{
			document.getElementById("firstName").required = true;
			document.getElementById("lastName").required = true;
			document.getElementById("streetAddress").required = true;
			document.getElementById("cityAddress").required = true;
			document.getElementById("stateAddress").required = true;
			document.getElementById("zipCode").required = true;
			document.getElementById("enterEmail").required = true;
			document.getElementById("confirmEmail").required = true;
			document.getElementById("createPassword").required = true;
			document.getElementById("confirmPassword").required = true;
			var enterEmail = document.getElementById("enterEmail").value;
			var confirmEmail = document.getElementById("confirmEmail").value;
			if (enterEmail != confirmEmail)
			{
				alert("Email does not match!");
				return false;
			}
			var createPassword = document.getElementById("createPassword").value;
			var confirmPassword = document.getElementById("confirmPassword").value;
			if (createPassword != confirmPassword)
			{
				alert("Password does not match!");
				return false;
			}
			var zipLength = document.getElementById("zipCode");
			document.getElementById("zipCode").setAttribute("type", "number");
			if (zipLength.value.length != 5)
			{
				alert("Zip code is not correct!");
				return false;
			}
			var createLength = document.getElementById("createPassword");
			var confirmLength = document.getElementById("confirmPassword");
			if ((createLength.value.length < 5) || (confirmLength.value.length < 5))
			{
				alert("Password must be at least 5 characters long!");
				return false;
			}
		}
		function resetPage()
		{
			var reset = confirm("Do you want to reset the webpage?");
			if (reset == true)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		function loginValidation()
		{
			document.getElementById("userEmail").required = true;
			document.getElementById("userPassword").required = true;
			var passwordLength = document.getElementById("userPassword");
			if ((passwordLength.value.length < 5))
			{
				alert("Password must be at least 5 characters long!");
				return false;
			}
		}
	</script>
				<link rel = "stylesheet" type = "text/css" href = "styles.css">      <!-- Link to the external style sheet -->
				<tr>
					<form method = "post" action = "postLogin.php" onsubmit = "return loginValidation()" onreset = "return resetPage()">				<!-- Uses form method to post information of user login to file forms.php -->
					<td class = "left" colspan = 5>
						<p>(Fields in red are required)</p>
						<p class = "account">Login</p>                <!-- User login -->
						<p><label>E-mail Address: 
							<input type = "email" placeholder = "Enter email" name = "userEmail" id = "userEmail" size = "45"/>          <!-- Uses the input element to ask the user for his email, type attribute is text,-->
						</label></p><br/>                                                                                       <!-- placeholder attribute asking the user to enter email, name index is userEmail, -->
						<p><label>Password:                                                                                     <!-- size of the text box is 45 characters long, and is required by the user to enter his email-->
							<input type = "password" placeholder = "Enter password" name = "userPassword" id = "userPassword" size = "45"/>              <!-- Uses the input element to ask the user for his password -->
						</label></p>																														  <!-- Password must be at least 8 characters long -->
						<p>
							<input type = "submit" name = "submit" value = "Login"/>			<!-- Submit button to submit the login form-->
							<input type = "reset" name = "reset" value = "Reset Form"/>    	<!-- Reset button to reset the login form -->
						</p>
					</td>
					</form>
				</tr>
				<tr>
					<form method = "post" action = "postAccount.php" onsubmit = "return dataValidation()" onreset = "return resetPage()">				<!-- Uses form method to post information of user account creation to file forms.php -->
					<td class = "left" colspan = 5>
						<p>(Fields in red are required)</p>
						<p class = "account">Create Account</p>           <!-- User account creation -->
						<p><label>First Name: 
								<input type = "text" placeholder = "Enter first name" name = "firstName" id = "firstName" size = "45"/>             <!-- Asks the user for his first name, type attribute is text -->
						</label></p>																										<!-- has a placeholder atrribute inside of the text asking the -->
						<p><label>Last Name: 																								<!-- user to enter his first name, name index is firstName, size of the text box is 45 characters long, and requires the user to enter his first name-->
								<input type = "text" placeholder = "Enter last name" name = "lastName" id = "lastName" size = "45"/>				<!-- Asks the user for his last name -->
						</label></p>                                                                                                        <!-- and has a placeholder attribute inside of the text asking the -->
						<p><label>Street Address: 																							<!-- user to enter his last name, name index is lastName, size of the text box is 45 characters long, and requires the user to enter his last name -->
								<input type = "text" placeholder = "Enter street address" name = "streetAddress" id = "streetAddress" size = "45"/>     <!-- Asks the user for his street address -->
						</label></p>
						<p class = "fontcolor"><label>Street Address 2: 
								<input type = "text" placeholder = "Enter second street address" name = "streetAddress2" id = "streetAddress2" size = "45"/>      <!-- Asks the user for his second street address -->
						</label></p>
						<p><label>City: 
								<input type = "text" placeholder = "Enter city" name = "cityAddress" id = "cityAddress" size = "45"/>              <!-- Asks the user for his city address -->
						</label></p>                          
						<p><label>State: 
								<name = "stateAddress" id = "stateAddress"/>            <!-- Asks the user for his state address -->
								<select name = "stateAddress">
									<option selected = "selected"></option>
									<option>PA</option>
									<option>NJ</option>
									<option>NY</option>
									<option>DE</option>
									<option>OH</option>
									<option>MD</option>
									<option>WV</option>
								</select>
						</label></p>
						<p><label>Zip Code: 
								<input type = "text" placeholder = "Enter zip code" name = "zipCode" id = "zipCode" size = "45"/>       <!-- Asks the user for his zip code -->
						</label></p>
						<p class = "fontcolor"><label>Phone Number: 
								<input type = "text" placeholder = "Enter phone number" name = "phoneNumber" id = "phoneNumber" size = "45"/>        <!-- Asks the user for his phone number -->
						</label></p>
						<p><label>E-mail Address: 
								<input type = "email" placeholder = "Enter email" name = "enterEmail" id = "enterEmail" size = "45"/>              <!-- Asks the user for his email address -->
						</label></p>
						<p><label>Confirm E-mail Address: 
								<input type ="email" placeholder = "Confirm email" name = "confirmEmail" id = "confirmEmail" size = "45"/>             <!-- Asks the user to confirm the email address -->
						</label></p>
						<p class = "fontcolor">Create a password(minimum length of 5 characters)</p>
						<p><label>Password: 
								<input type = "text" placeholder = "Create password" name = "createPassword" id = "createPassword" size = "45"/>           <!-- Asks the user to create a password  with at least 8 characters-->
						</label></p>
						<p><label>Confirm password: 
								<input type = "text" placeholder = "Confirm password" name = "confirmPassword" id = "confirmPassword" size = "45"/>              <!-- Asks the user to confirm the password with at least 8 characters-->
						</label></p>
						<p>
							<input type = "submit" name = "submit" value = "Create Account"/>                <!-- Submit the account creation form -->
							<input type = "reset" name = "reset" value = "Reset Form"/>                     <!-- Clear the account creation form -->
						</p>
					</td>
					</form>
				</tr>
<?php require_once("footerT.html");?>					<!-- Table footer file -->