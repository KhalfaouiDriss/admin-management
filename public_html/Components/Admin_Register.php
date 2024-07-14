<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/Admin_Register.css">
    <title>Registration</title>
    <style>
        .error {
            color: red;
            font-size: 10px;
            width: 100%;
            margin-bottom: 8px;
            margin-top: 5px;
            padding: 5px;
            background-color: rgba(255, 0, 0, 0.16);
        }

        .registerBtn {
            background-color: red;
            border: none;
        }

        .img {
            display: ;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 10px;
            margin-right: 10px;
            padding: 10px;
            box-shadow: 1px 1px 1px 1px rgba(0, 0, 0, 0.16);
            cursor: pointer;
            transition: 0.5s;
        }
    </style>
</head>

<body>
    <div class="container" id="container">
        <form action="../Models/insert/Admin_Register.php" method="post" id="registerForm">
            <h1>Register</h1>
            
            <input type="text" class="fullname" name="fullname" placeholder="Full Name" required>
            <input type="text" class="username" name="username" placeholder="Username" required>
            <input type="email" class="email" name="email" placeholder="Email" required>

            <input type="password" class="password" name="password" placeholder="Password" required>
            <input type="text" class="company" name="company" placeholder="company name" required>
            <input type="text" class="activation_code" name="activation_code" placeholder="activation code" required>
            <?php if (isset($_GET['error'])) { ?>
                <h6 class="error">
                    <?php echo "email ou username est deja exists";
            } ?>
            </h6>
            <?php if (isset($_GET['error_activation'])) { ?>
                <h6 class="error">
                    <?php echo "activation code pas correct";
            } ?>
            </h6>
            <button type="submit" name="register_submit" class="registerBtn">Register</button>
            <a href="../index.php" class="Forgot_password" style="font-size:10px">I have an account</a>

        </form>
    </div>
</body>

</html>