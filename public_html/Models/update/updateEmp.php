<?php
require_once '../Config/Config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $CIN = $_POST['CIN'];
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
    $id = $_POST['id_emp'];
    // Assuming $id_admin is defined or passed as a parameter
    $travailler_from_admin = $_SESSION["id_admin"];

    $queryUp = "UPDATE `travailleur`   SET `N_CN`='$CIN', `nom`='$nom',`prenom`='$prenom',`post`='$post',`telephone`='$telephone',`Location`='$location',`naissance`='$naissance',`gender`='$gender',`Etat`='$etat',`Neveau`='$niveau' WHERE id='$id'";

    $resultUp = mysqli_query($conn, $queryUp);
    if ($resultUp) {
        echo "<script>window.history.go(-1);</script>";
    } else {
        echo "Error: ". mysqli_error($conn);
    }

}
?>
