<?php

include("functions.php");
include("connect.php");


if($_SERVER['REQUEST_METHOD'] == "POST"){

    //$user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    //$password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
	

    if(!empty($name) && !empty($email) && !empty($phone) && !empty($address)){


        $query = "insert into crm_login(name, email, phone, address) values('$name', '$email', '$phone', '$address')";
        
        mysqli_query($con, $query);
       
        //header("Location: login.php");
	    echo "Thank you for signing up " . $name . "!";

    }
    else{
        echo "please enter all information";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
    .container{
        padding: 50px;
        width: 500px;
    }

    .form-label{
        padding-top: 20px;
        font-weight: bold;
    }
</style>
</head>
<body>
 
<div class="container"> 
    <h1>Sign Up</h1>
    <form method ="post">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" class="form-control" name = "name"  placeholder="Enter Name">

            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" class="form-control" name = "email" placeholder="Enter Email">
            
            <!-- <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="password" class="form-control" name = "password" placeholder="password"> -->

            <label for="exampleFormControlInput1" class="form-label">Phone</label>
            <input type="tel" class="form-control" name = "phone" placeholder="Enter your phone number">
            
            <label for="exampleFormControlInput1" class="form-label">Address</label>
            <input type="text" class="form-control" name = "address"  placeholder="Enter your address">

            <input type="submit" class ="button" name="button" value="signup"><br>
            <a href="login.php">Click to Login</a>
            
        </div>
    </form>
</div>


</body>
</html>
