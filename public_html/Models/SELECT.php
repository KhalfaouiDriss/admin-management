<?php
session_start();
require_once '../Config/Config.php';


        $query = "SELECT * FROM admin";
        $result = mysqli_query($conn, $query);
        while($row = $result->fetch_assoc()){
            $Data =  ['username'=>$row['username'],'password' => $row['password']];
        }


?>