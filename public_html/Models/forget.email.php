<?php
require_once 'Config/Config.php';

if (isset($_POST['searchBtn'])) {
    $email = $_POST['log_email'];
    $query = "SELECT * FROM admin WHERE email = '$email'";
    $result = mysqli_query($conn, $query);


    if ($result->num_rows > 0) {
        $result_row = mysqli_fetch_array($result);
        $_SESSION['email'] = $email;
        $_SESSION['username'] = $result_row['username'];
        $_SESSION['password'] = $result_row['password'];

        // $token = sprintf("%07d", rand(0, 9999999));
        // $_SESSION['token_search'] = $token;
        // echo "ok";
        header('location:sendEmail.php?fond_email=email_fond');

        // while ($row = $result->fetch_assoc()) {

        // }
        // $Data = ['username' => $row['username'], 'password' => $row['password']];
    } else {
        header('location:../Components/Forgot.php?log_email=not_fond');
    }
}

?>