<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/Admin_Register.css">
    <title>Verify</title>
    <style>
        .error {
            color: red;
            font-size: 10px;
            width: 100%;
            margin-bottom: 8px ;
            margin-top: 5px;
            padding: 5px;
            background-color: rgba(255, 0, 0, 0.16);
        }
        .registerBtn{
            
            background-color: red;
            border: none;
        
        }
        .email_send{
            color: green;
            font-size: 10px;
            width: 100%;
            margin-bottom: 8px;
            margin-top: 5px;
            padding: 5px;
            background-color: rgba(0, 128, 0, 0.201);
        }
        
    </style>
</head>

<body>
    <div class="container" id="container">
        <form action="../Models/verifEmail.php" method="post" id="registerForm">
            <h1>Verify : </h1>
            
            <input type="text" class="tokenX" name="tokenX" placeholder="entre Code" required>
            <!-- <h5></h5> -->
            <?php if (isset($_GET['email_send'])) { ?>
                <h6 class="email_send">
                    <?php echo "check votre Email";
            } ?>
            </h6>
            <?php if (isset($_GET['not_verif'])) { ?>
                <h6 class="error">
                    <?php echo "Code de verification incorrect";
            } ?>
            </h6>
            <button type="submit" name="verify_email"class="registerBtn">Verify</button>
            <a href="Admin_Register.php" class="Forgot_password" style="font-size:10px">Modifie Email</a>
        </form>
    </div>
</body>

</html>
