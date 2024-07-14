<?php
// session_start(); 
require_once '../Models/Config/Config.php';

// Check if the user is logged in
if (isset($_SESSION['id_admin'])) {
    $id_admin = $_SESSION['id_admin'];

    // Fetch data for 'travailleur' table
    $travailleur_query = "SELECT * FROM travailleur WHERE travailler_from_admin = ?";
    $stmt_travailleur = $conn->prepare($travailleur_query);
    $stmt_travailleur->bind_param("i", $id_admin);
    $stmt_travailleur->execute();
    $result_travailleur = $stmt_travailleur->get_result();

    $travailleurData = array();
    while ($row = $result_travailleur->fetch_assoc()) {
        $Data[] = $row;
    }

    // Fetch data for 'admin' table
    $admin_query = "SELECT * FROM admin";
    $stmt_admin = $conn->prepare($admin_query);
    $stmt_admin->execute();
    $result_admin = $stmt_admin->get_result();

    $adminData = array();
    while ($row = $result_admin->fetch_assoc()) {
        $adminData[] = $row;
    }

    // Combine the data from both tables
    // $allData = array(
    //     "travailleur" => $travailleurData,
    //     "admin" => $adminData
    // );

    // Encode the combined data as JSON and output it
    // echo json_encode($allData);
} else {
    echo "User is not logged in.";
}
?>
