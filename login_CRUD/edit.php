<?php
include("functions.php");

$editClient = new Client();


if (isset($_GET['edit_id']) && !empty($_GET['edit_id'])) {
    $editId = $_GET['edit_id'];
    //echo " the Edit ID is  " . $editId . " ";
    $clientRecord = $editClient->getRecordById($editId);
    //echo var_dump($clientRecord);
} else {
    echo " we dont have an edit id ";
}


if (isset($_POST['update'])) {
    //header ("location:index.php");
    $data = $editClient->updateClient($_POST);
    //echo var_dump($data);
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
	
	<!-- <h1><?php echo $user_data['name']; ?>'s Records</h1> -->
   

	<br>

	<div class="section">
            <h4>Update Client Data</h4>
            <form action="edit.php" method="POST">
                <div class="form-group">
                    <label for="business_name">Business Name</label>
                    <input type="text" class="form-control" name="business_name" id="business_name" aria-describedby="business_name" value="<?php echo $clientRecord['business_name']; ?>"  >

                </div>
                <div class="form-group">
                    <label for="contact_name">Contact Name</label>
                    <input type="text" class="form-control" name="contact_name" id="contact_name" aria-describedby="contact_name" value="<?php echo $clientRecord['contact_name']; ?>" >
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="email" value ="<?php echo $clientRecord['email']; ?>"  >
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" aria-describedby="phone #" value = "<?php echo $clientRecord['phone']; ?>" >
                </div>
                <div class="form-group">
                    <label for="enquiry">Enquiry</label>
                    <input type="text" class="form-control" name="enquiry" id="enquiry" aria-describedby="enquiry" value = "<?php echo $clientRecord['enquiry']; ?>" >
                </div>
                <div class="form-group">
                    <label for="product">Product</label>
                    <input type="text" class="form-control" name="product" id="product" aria-describedby="product " value = "<?php echo $clientRecord['product']; ?>">
                </div>
                <input type="hidden" name="ID" value="<?php echo $clientRecord['ID']; ?>">

                <input type="submit" style="margin:20px;" name="update" value="Update Record" class="btn btn-danger">


            </form>
        </div>
</body>

</html>