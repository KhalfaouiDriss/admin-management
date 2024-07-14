<?php
require_once '../Config/Config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $section = $_POST['section'];
    $cat_from_admin = $_SESSION["id_admin"];

    // Use backticks for column names, not single quotes
    $query_section = "INSERT INTO `categories` (`id_cat`, `name_cat`, `cat_from_admin`) VALUES (NULL, '$section', '$cat_from_admin')";

    if ($conn->query($query_section) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query_section . "<br>" . $conn->error;
    }
}
?>
