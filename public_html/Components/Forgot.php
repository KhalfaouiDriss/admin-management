<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Forget Password</title>
    <style>
        .error{
            color: red;
            font-size: 10px;
            width: 100%;
            margin-bottom: 8px ;
            margin-top: 5px;
            padding: 5px;
            background-color: rgba(255, 0, 0, 0.16);
        }
    </style>
</head>

<body>
    <div class="container" id="container">
        <form action="../Models/forget.email.php" method="post" id="loginForm">
            <h2>Forget Password</h2>
            <input type="email" class="email" name="log_email" placeholder="Entre votre email">
            <?php if (isset($_GET['log_email'])) { ?>
                <h6 class="error">
                    <?php echo "Email not fond";
            } ?>
            </h6>
            
            <button type="submit" name="searchBtn" class="searchBtn">Search</button>
            <a href="Admin_Register.php" class="Forgot_password" style="font-size:10px">Don't have an account</a>

        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="Controllers/login.js"></script> -->
</body>

</html>