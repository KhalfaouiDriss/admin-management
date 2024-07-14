<?php
require_once '../Config/Config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['section_P_S']) && isset($_SESSION["id_admin"])) {

        $section_P_S = $_POST['section_P_S'];
        $cat_from_admin = $_SESSION["id_admin"];

        // Check if there are any records in the travailleur table referencing the category to be deleted
        $check_travailleur = "SELECT * FROM `travailleur` WHERE post = ?";
        $stmt_check_travailleur = $conn->prepare($check_travailleur);
        $stmt_check_travailleur->bind_param("i", $section_P_S);
        $stmt_check_travailleur->execute();
        $result_travailleur = $stmt_check_travailleur->get_result();

        if ($result_travailleur->num_rows > 0) {
            // If there are records, delete them first
            $stmt_delete_travailleur = $conn->prepare("DELETE FROM `travailleur` WHERE post = ?");
            $stmt_delete_travailleur->bind_param("i", $section_P_S);
            if ($stmt_delete_travailleur->execute()) {
                echo "Deleted related records from the travailleur table<br>";
            } else {
                echo "Error deleting related records from the travailleur table: " . $conn->error;
            }
        }

        // Now delete the category
        $stmt_delete_category = $conn->prepare("DELETE FROM `categories` WHERE id_cat = ? AND cat_from_admin = ?");
        $stmt_delete_category->bind_param("ii", $section_P_S, $cat_from_admin);

        if ($stmt_delete_category->execute()) {
            echo "Category deleted successfully";
        } else {
            echo "Error deleting category: " . $conn->error;
        }

        $stmt_delete_category->close();
    } else {
        echo "Missing form data";
    }
}
?>
