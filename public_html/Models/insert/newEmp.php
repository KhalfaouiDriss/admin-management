<?php
require_once '../Config/Config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $post = $_POST['post'];
    $telephone = $_POST['telephone'];
    // $contract = $_POST['contract'];
    $location = $_POST['location'];
    $naissance = $_POST['naissance'];
    $gender = $_POST['gender'];
    $etat = $_POST['etat'];
    $niveau = $_POST['niveau'];
    // Assuming $id_admin is defined or passed as a parameter
    $travailler_from_admin = $_SESSION["id_admin"];

    // Prepare and bind parameters (Prepared Statement)
    $stmt = $conn->prepare("INSERT INTO travailleur (nom, prenom, post, telephone, Location, naissance, gender, Etat, Neveau , travailler_from_admin) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssi", $nom, $prenom, $post, $telephone, $location, $naissance, $gender, $etat, $niveau, $travailler_from_admin);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Employee Added Successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
} else {
    echo "Invalid request";
}
?>
