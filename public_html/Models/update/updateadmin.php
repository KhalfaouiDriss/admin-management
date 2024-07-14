<?php
require_once '../Config/Config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $fullname = $_POST['fullname'];
    $username = $_POST['username']; 
    // $email = $_POST['email'];
    $password = $_POST['password'];
    $company_name = $_POST['company_name'];
    $id_admin = $_SESSION["id_admin"];
    $queryUp = "UPDATE `admin` SET `fullname`='$fullname', `username`='$username', `password`='$password', `company_name`='$company_name' WHERE id_admin ='$id_admin'";
    $resultUp = mysqli_query($conn, $queryUp);
    if ($resultUp) {
        
        echo "<script>window.history.go(-1);</script>";
    } else {
        
        echo "Error: ". mysqli_error($conn);
    }
}
?>
