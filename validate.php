<?php 
session_start(); 
 
$db = new SQLite3('inventory.db'); //if a db named 'invntory.db' does not exist, then it will create and establish a connection with the same
 
if (!$db) { 
    die("Database connection not connecting: " . $db); 
} 
$token = filter_input(INPUT_POST, 'valid_csrf_token', FILTER_SANITIZE_STRING); //comment this line to have a successful CSRF attack
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {  // handling POST request to add new products to the inventory
   if (hash_equals($_SESSION['valid_csrf_token'], $token )) {   //validating CSRF token to avoid any type of potential attacks. Comment this line to have successful attack
		if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['quantity'])) { 
				$name = $_POST['name']; 
				$amount = $_POST['price']; 
				$quantity = $_POST['quantity'];
 
				$stmt = $db->prepare("INSERT INTO product_details (product_name, price, quantity) VALUES (:name, :amount, :quantity)"); // This is to prevent any type of SQL injection attacks, this happens at runtime
				$stmt->bindValue(':name', $name, SQLITE3_TEXT); // using appropriate data types
				$stmt->bindValue(':amount', $amount, SQLITE3_INTEGER); 
  			 	$stmt->bindValue(':quantity', $quantity, SQLITE3_INTEGER);
    
    $result = $stmt->execute(); // checking of operation is successful
 
    if ($result) { 
        echo "Inventory is updated"; 
    } else { 
        echo "cannot insert the data"; 
    } 
} 
}
//comment the below 4 lines for a successful CSRF attack [line number 32 to 35]
else{
	die("CSRF token Mismatched"); //if token validation fails, code will terminate with error message
	}
}

?>
<?php 
 
$results = $db->query("SELECT * FROM product_details"); //querying the db to get all the product details
 
echo "<h1>product details</h1>";  // displaying the products as h1
while ($row = $results->fetchArray(SQLITE3_ASSOC)) { 
  echo "ID: " . $row['id'] . " - product Name: " . $row['product_name'] . "  price: $" . $row['price'] . " quantity " . $row['quantity']. "<br>"; 
} 
?> 
