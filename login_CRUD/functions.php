<?php

function check_login($con){//checks if user is logged in{
    if(isset($_SESSION['name'])){
        $id = $_SESSION['name'];
        $query = "select * from crm_login where name ='$id' limit 1";


        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0)//if it connects and queries and there are more than 0 rows
        {
            $user_data = mysqli_fetch_assoc($result);//fetch associative array
            return $user_data;
        }
    }

    //redirect to login
    header("Location: login.php");
    die;
}

class Client
{

    private $host = 'localhost';
    private $username  = 'root';
    private $password = '';
    private $dbName = 'crm_login';
    private $port = 3306;

    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbName);
        
        if (mysqli_connect_error()){
            trigger_error('Error in DB' . mysqli_connect_error()); //displays error with string
        } else{
            return $this->conn;
        }
    }

    public function viewClient()
    {
        $sql = "SELECT ID, business_name, contact_name, email, phone, enquiry, product FROM records";
        $result = $this->conn->query($sql);
        //echo var_dump($result); //boolean false 
        //echo var_dump($sql);
        //echo var_dump($conn);//null???

        if ($result->num_rows > 0){//ERROR result is non object
            $data = array();
            while ($row = $result->fetch_assoc()){
                $data[] = $row;
            }

            return $data;
        }

    }
    public function addClient()
    {
        $business_name = $_POST['business_name'];
        $contact_name = $_POST['contact_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $enquiry = $_POST['enquiry'];
        $product = $_POST['product'];

        $sql = "insert into records(business_name, contact_name, email, phone, enquiry, product)
        values('$business_name', '$contact_name', '$email', '$phone', '$enquiry', '$product')";

        if($this->conn->query($sql)){
            echo "New Client Record Added";
        }else {
            echo "we have an error " . $this->conn->error;
        }
    }

    public function deleteClient($id){
        $sql = "DELETE FROM records WHERE id = '$id'";
        $result = $this->conn->query($sql);
        if($result){
            echo "The record was deleted";
            header ("location:index.php");
        }else {
            echo "Not able to delete";
        }
    }

    public function getRecordById($id)
    {
        $query = "SELECT * FROM records WHERE id = '$id' limit 1";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0){
            $row = $result->fetch_assoc(); //fethces one row of data and returns as associative array
            return $row;
        } else{
            echo "No records found";
        }
    }

    public function updateClient($postData)
    {
        //echo ("thanks!");
        $business_name = $_POST['business_name'];
        $contact_name = $_POST['contact_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $enquiry = $_POST['enquiry'];
        $product = $_POST['product'];
        $id = $_POST['ID'];/// why is this here??

        if (!empty($id) && !empty($postData)){

            $sql = "UPDATE records SET business_name = '$business_name', contact_name = '$contact_name', email = '$email', phone = '$phone', enquiry = '$enquiry', product = '$product' WHERE id='$id' ";

            $result = $this->conn->query($sql);////THIS IS THE ERROR
            //echo var_dump($result);

            //this works
            if ($sql == true){
                header ("location:index.php");
            } else {
                echo "update failed";
            }
        }
    }




}