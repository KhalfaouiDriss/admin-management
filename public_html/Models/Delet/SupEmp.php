<?php

require '../Config/Config.php';

$id_tar = $_GET['id_emp'];

$query = "DELETE FROM travailleur WHERE id = '$id_tar'";
if (mysqli_query($conn, $query)) {
    // header()
    echo "<script>window.history.go(-1);</script>";
}else{
    echo "Error: ". $query. "<br>". mysqli_error($conn);
}
?>