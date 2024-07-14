<?php
require_once '../Config/Config.php';
$id_admin = $_SESSION["id_admin"];

if (isset($_POST['add_imgs'])) {
    if (isset($_FILES['imgs'])) {
        $file_name = $_FILES['imgs']['name'];
        $file_tmp = $_FILES['imgs']['tmp_name'];
        
        // Ensure the upload directory exists
        $upload_dir = "../../Components/assets/img/img_admin/";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Move the uploaded file to the "uploads" directory
        if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
            // Escape the file name to prevent SQL injection
            $file_name_escaped = mysqli_real_escape_string($conn, $file_name);

            // Update the admin's image in the database
            $sql = "UPDATE `admin` SET img = '$file_name_escaped' WHERE id_admin = $id_admin";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                header('location:../../Components/Setting.php');
            } else {
                echo "File uploaded but database update failed.";
            }
        } else {
            echo "File upload failed.";
        }
    } else {
        echo "No file selected.";
    }
}
?>
