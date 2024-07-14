<?php
require_once '../Config/Config.php';
session_start();

        $query = "SELECT * FROM travailleur";
        $result = mysqli_query($conn, $query);
        while($row = $result->fetch_assoc()){
            $Data[] =  ['prenom'=> $row['nom'],'post' => $row['post'],'telephone' => $row['telephone'],'contract' => $row['contract']];
        }
       
        echo json_encode($Data);

?>