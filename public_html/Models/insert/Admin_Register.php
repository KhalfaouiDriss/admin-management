<?php
require_once '../Config/Config.php';

if (isset($_POST['register_submit'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $company = $_POST['company'];
    $email = $_POST['email'];


    $activation_code = $_POST['activation_code'];

    // Check if email already exists in the database
    $check_email_query = "SELECT * FROM admin WHERE email = ? OR username = ?";
    $stmt = $conn->prepare($check_email_query);
    $stmt->bind_param("ss", $email, $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // Email already exists, redirect back to the form with an error message
        header('Location: ../../Components/Admin_Register.php?error=email_exists');
        exit;
    } else {
        // Check if activation code exists in the database
        $check_activation_code_query = "SELECT * FROM code_activation WHERE activation_code = ?";
        $stmt2 = $conn->prepare($check_activation_code_query);
        $stmt2->bind_param("s", $activation_code);
        $stmt2->execute();
        $result2 = $stmt2->get_result();

        if ($result2->num_rows == 0) {
            // Activation code is not correct, redirect back to the form with an error message
            header('Location: ../../Components/Admin_Register.php?error_activation=activation_code_not_correct');
            exit;
        }
    }

    // If both email and activation code checks pass, proceed with sending verification code
    $token = sprintf("%05d", rand(0, 9999999));

    $_SESSION['fullname'] = $fullname;
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['company'] = $company;
    $_SESSION['password'] = $password;
    $_SESSION["token"] = $token;
    $_SESSION['activation_code'] = $activation_code;

    header('location:../sendEmail.php?token=' . $token);
}


if (isset($_GET['is_verif'])) {
    if ($_GET['is_verif'] == true) {
        $stmt = $conn->prepare("INSERT INTO admin (fullname, username, email, company_name, password, activation_code) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $_SESSION['fullname'], $_SESSION['username'], $_SESSION['email'], $_SESSION['company'], $_SESSION['password'], $_SESSION['activation_code']);

        if ($stmt->execute()) {
            header('Location: ../../index.php?is_register=true');
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
    }
} else {
    echo "Invalid request";
}
?>