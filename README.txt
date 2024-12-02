# Demonstration of CSRF attack

# Setup Instructions:

1. **Install Prerequisites:**
PHP with SQLite , a webserver is needed to run this program.

2. **Database Setup:**
   - Create a file named 'inventory.db' in the same directory as the PHP files.
   - In this case, the inventory.bd is alreay provided in the zip file, one can read and attach that the SQLite DB.


3. **Run the Application:**
   - Place the PHP files ('index.php', 'csrf_Attacker.php', 'validate.php', 'inventory.db') in the web server.
   - Run the PHP server using this command "php -S localhost:8000" (or any other valid port).
   - Go to 'index.php' to submit product details legitimately. This can be done by connecting to the php local host using the web browser. Can type this "http://localhost:8000/index.php"
   - Navigate to 'csrf_Attacker.php' to simulate a CSRF attack.
 
4. **Testing the CSRF:**
   - Submit a form using 'index.php' to observe valid database updates.
   - Use 'csrf_Attacker.php' to perform the attack. But the code I have provided is for the countermeasure. So we need to comment out the below code in index.php and validate.php in order for a successful CSRF attack.

5. **Comment out the below code for a successful CSRF attack**
    - In index.php comment the below code: (Line 50)
    <!--        <input type="hidden" name="valid_csrf_token" value="<?php echo $_SESSION['valid_csrf_token']; ?>"> -->

    - In validate.php comment the below code: (Line 9,11,32,33,34,35)
    $token = filter_input(INPUT_POST, 'valid_csrf_token', FILTER_SANITIZE_STRING); //comment this line to have a successful CSRF attack
   if (hash_equals($_SESSION['valid_csrf_token'], $token )) {   //validating CSRF token to avoid any type of potential attacks. Comment this line to have successful attack
	//comment the below 4 lines for a successful CSRF attack [line number 32 to 35]
	else{
		die("CSRF token Mismatched"); //if token validation fails, code will terminate with error message
	}
}



# Expected Behavior:
- Submissions via 'index.php' with valid CSRF tokens will update the database.
- In the scenario of Successful attack (by commenting the mentioned lines) , this will lead the attacker to successfully add the values to the valid db using CSRF attack.