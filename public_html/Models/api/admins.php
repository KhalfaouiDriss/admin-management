<?php
require_once '../Config/Config.php';

if (isset($_POST['log_submit'])) {
    $username = $_POST['log_username'];
    $password = $_POST['log_password'];

    // Use prepared statement to prevent SQL injection
    $query = "SELECT * FROM admin WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = array();
    if ($row = $result->fetch_assoc()) {
        $data[] = array(
            'id_admin' => $row['id_admin'],
            'username' => $row['username'],
            'password' => $row['password'],
            'Permissions' => $row['Permissions'],
            'status' => $row['status']
        );

            // If login is successful, set session variables and redirect
            $_SESSION['id_admin'] = $row['id_admin'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['Permissions'] = $row['Permissions'];
            $_SESSION['status'] = $row['status'];
            $queryStatus = "UPDATE `admin` SET `status`='1' WHERE username = ? AND password = ?";
            $stmtStatus = $conn->prepare($queryStatus);
            $stmtStatus->bind_param('ss',$username,$password); 
            $stmtStatus->execute();
            
            // If login is successful, set session variables and redirect
            $_SESSION["login"] = true;
            header('location:../../Components/index.php');
            echo json_encode($data);

        } else {
            $_SESSION["login"] = false;
            header('location:../../index.php?error_login=error_loginx');
        }
    }

if (isset($_GET['log_email'])) {
    $email = $_GET['email'];
    $query = "SELECT * FROM admin WHERE email =?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = array();
}
?>