<?php

session_start();
    include("connect.php");
    include("functions.php");

    

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
	

    if(!empty($name) && !empty($email) && !empty($phone) && !empty($address)){
    //read from database 
    $query = "select * from crm_login where email = '$email' limit 1";
    $result = mysqli_query($con, $query); //result is connect and run query
	
        if($result) //if you connect and run query
        {
            if($result && mysqli_num_rows($result) > 0) //and there are more than 0 orws 
            {
                $user_data = mysqli_fetch_assoc($result);//fetch the associated info from table and call $user_data

                if($user_data['email'] === $email)//if email matches
                {
                    $_SESSION['name'] = $user_data['name'];//if business name from session is same as business name from userdata 
                    header("Location:index.php");//relocate to index
                    die;//end
                }
        
            }
            
        }
        

    echo "wrong username or password";
    
    }else
    {
        echo "error";
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
    <h1>Log in</h1>
    <form method ="post">
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" class="form-control" name = "name"  placeholder="Enter name">

            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" class="form-control" name = "email" placeholder="Enter your email address">
            

            <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" name = "phone" placeholder="Enter your phone number">
            
            <label for="exampleFormControlInput1" class="form-label">address</label>
            <input type="text" class="form-control" name = "address"  placeholder="Enter your address">

            <input type="submit" class ="button" name="button" value="login">
            <a href="signup.php">click to Sign Up</a>
            
        </div>
    </form>
</div>


</body>
</html>
