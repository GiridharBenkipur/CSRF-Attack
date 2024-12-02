<!DOCTYPE html> 
<html> 
<head>
    <title>CSRF Attacker Page</title>
    <style>
        .box {   <!-- adding simple boxes accross the text for better representation -->
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
    <form action="validate.php" method="POST"> <!-- form to collect the details using POST method -->
        
        <div class="box">
            <label for="name">Name of the product: </label>  <!-- feild for entering product name -->
            <input type="text" name="name" required> 
        </div>
        
        <div class="box">
            <label for="price">Price Below: </label> <!-- feild for entering product price -->
            <input type="number" name="price" required> 
        </div>
        
        <div class="box">
            <label for="quantity">Enter Quantity: </label> <!-- feild for entering product quantity -->
            <input type="number" name="quantity" required> 
        </div>
        
        <div class="box">
            <input type="submit" value="Submit">  <!-- submit button -->
        </div>
    </form> 
</body> 
</html>
