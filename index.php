<?php 
session_start(); //starting a new session
if (empty($_SESSION['valid_csrf_token'])) {  //checking if a valid CSRF token is stored in the session, or else generate a new one using ms5 hashing
    $_SESSION['valid_csrf_token'] = md5(uniqid(mt_rand(), true)); 
}
?> 
<!-- the below code is to add borders, padding to text -->
<!DOCTYPE html> 
<html> 
<head> 
    <title>Product details form</title> 
    <style> <!--the below code is to add borders, padding to text -->
		
        .box {
            border: 1px solid #000;
            padding: 10px;
            margin-bottom: 10px;
            width: 300px;
        }
        h1 {
            text-align: center;
        }
        form {
            width: 350px;
            margin: 0 auto;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 5px;
            margin-top: 5px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 5px;
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head> 
<body> 
    <h1>Please Enter the Product Details here!!</h1> 
    <form action="validate.php" method="POST">  <!-- form to collect details-->
		<!-- comment the below line to do a successful CSRF attack -->
        <input type="hidden" name="valid_csrf_token" value="<?php echo $_SESSION['valid_csrf_token']; ?>"> 
        
        <div class="box"> <!-- input feild to get product name -->
            <label for="name">Name of the product: </label> 
            <input type="text" name="name" required> 
        </div>
        
        <div class="box">  <!--input feild to get product price -->
            <label for="price">Price Below: </label> 
            <input type="number" name="price" required> 
        </div>
        
        <div class="box">
            <label for="quantity">Enter Quantity: </label> <! -- input feild to get product quantity -->
            <input type="number" name="quantity" required> 
        </div>
        
        <div class="box"> <!--  submit button -->
            <input type="submit" value="Submit"> 
        </div>
    </form> 
</body> 
</html>
