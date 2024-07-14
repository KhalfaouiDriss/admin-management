<?php
session_start();

if(isset($_POST['verify_email'])){
    $token = $_SESSION['token'];
    $tokenX = $_POST['tokenX'];

    if($tokenX == $token){
        header('location:insert/Admin_Register.php?is_verif=true');
    }else{
        header('location:../Components/verify.php?not_verif=false');
    }   
}
if(isset($_SESSION['fond_email'])){
    $token = $_SESSION['token'];
    $tokenX = $_POST['tokenX'];

    if($tokenX == $token){
        header('location:insert/Admin_Register.php?is_verif=true');
    }else{
        header('location:../Components/verify.php?not_verif=false');
    }   
}
?>
