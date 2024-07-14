<?php
// Start the session
session_start();

require_once '../Config/Config.php';


$queryStatus = "UPDATE `admin` SET `status`='0' WHERE username = ? AND password = ?";
$stmtStatus = $conn->prepare($queryStatus);
$stmtStatus->bind_param('ss', $_SESSION['username'], $_SESSION['password']);
$stmtStatus->execute();

session_destroy();


// قم بتوجيه المستخدم إلى صفحة تسجيل الدخول أو أي صفحة أخرى ترغب فيها
header("Location: ../../");
exit;

?>