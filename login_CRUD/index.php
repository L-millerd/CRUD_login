<?php 

session_start();
    $_SESSION; 

	include("connect.php");
	include("functions.php");

	$user_data = check_login($con);

	$clientObj = new Client();

	$data = $clientObj->viewClient();

	if (isset(($_POST['submit']))) {
		$clientObj->addClient();
	}
	
    ///deletes client record when press delete icon
	if (isset($_GET['del_id']) && !empty($_GET['del_id'])) {
		$delId = $_GET['del_id'];
		$clientObj->deleteClient($delId);
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<style>
	.container{
        padding: 50px;
        width: 800px;
    }

    .form-label{
        padding-top: 20px;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class ="container">
	
	<h1><?php echo $user_data['name']; ?>'s Records</h1>
    <a href="logout.php">Logout</a>

	<br>

	<div class="section">
            <h4>Add Client Data </h4>
            <form action="index.php" method="POST">
                <div class="form-group">
                    <label for="business_name">Business Name</label>
                    <input type="text" class="form-control" name="business_name" id="business_name" aria-describedby="business_name" placeholder="Enter business name">

                </div>
                <div class="form-group">
                    <label for="contact_name">Contact Name</label>
                    <input type="text" class="form-control" name="contact_name" id="contact_name" aria-describedby="business_name" placeholder="Enter contact name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="email" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" aria-describedby="phone #" placeholder="Enter Phone">
                </div>
                <div class="form-group">
                    <label for="enquiry">Enquiry</label>
                    <input type="text" class="form-control" name="enquiry" id="enquiry" aria-describedby="enquiry" placeholder="Enter enquiry">
                </div>
                <div class="form-group">
                    <label for="product">Product</label>
                    <input type="text" class="form-control" name="product" id="product" aria-describedby="product " placeholder="Enter product">
                </div>

                <input type="submit" style="margin:20px;" name="submit" value="Add Record" class="btn btn-danger">


            </form>
        </div>

		<main>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Business Name</th>
                        <th scope="col">Contact Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Enquiry</th>
                        <th scope="col">Product</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data as $client) {///invalid argument

                    ?>
                        <tr>
                            <th scope="row"><?php echo $client['ID'] ?></th>
                            <td><?php echo $client['business_name'] ?></td>
                            <td><?php echo $client['contact_name'] ?></td>
                            <td><?php echo $client['email'] ?></td>
                            <td><?php echo $client['phone'] ?></td>
                            <td><?php echo $client['enquiry'] ?></td>
                            <td><?php echo $client['product'] ?></td>
                            <td><a href="edit.php?edit_id=<?php echo $client['ID']; ?>"><i class="fas fa-edit"> </i></a>
                                <a href="index.php?del_id=<?php echo $client['ID']; ?>"><i class="fas fa-trash"></i></a>
                            </td>



                        </tr>
                    <?php } ?>
                </tbody>

            </table>


        </main>
	</div>
</body>
</html>
