<?php
session_start();
include "model/pdo.php"; 
include "model/taikhoan.php"; 


if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$loginError = '';

if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $checkuser = check_user($user, $pass);
    if (is_array($checkuser)) {
        $role = $checkuser['role'];
        if ($role == 1) {
            $_SESSION['admin'] = $checkuser;
            header("Location: index.php");
            exit();
        } else {
            $loginError = 'Bạn không có quyền truy cập trang này';
        }
    } else {
        $loginError = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-image: linear-gradient(to bottom, #f2f2f2, #fff);
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-form {
            width: 300px;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .login-form h2 {
            margin-top: 0;
        }
        .login-form .form-control {
            height: 40px;
            padding: 10px;
            font-size: 16px;
        }
        .login-form .btn {
            width: 100%;
            height: 40px;
            font-size: 16px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .login-form .btn:hover {
            background-color: #3e8e41;
        }
        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
    <script>
        function validateForm() {
            var username = document.getElementById('user').value.trim();
            var password = document.getElementById('pass').value.trim();
            var usernameError = document.getElementById('usernameError');
            var passwordError = document.getElementById('passwordError');
            
            // Clear previous error messages
            usernameError.innerHTML = '';
            passwordError.innerHTML = '';

            var isValid = true;

            if (username.length < 3) {
                usernameError.textContent = 'Username phải tối thiểu  hơn 3 ký tự';
                isValid = false;
            }

            if (password.length < 6) {
                passwordError.textContent = 'Password phải tối thiểu 6 ký tự';
                isValid = false;
            }

            return isValid;
        }
    </script>
</head>
<body>
    <div class="login-form">
        <h2>Login Admin</h2>
        <form method="post" action="login.php" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="user">Username:</label>
                <input type="text" id="user" name="user" class="form-control" minlength="3" title="Username phải tối thiểu  hơn 3 ký tự">
                <div id="usernameError" class="error-message"></div>
            </div>
            <div class="form-group">
                <label for="pass">Password:</label>
                <input type="password" id="pass" name="pass" class="form-control" minlength="6" title="Password phải tối thiểu 6 ký tự">
                <div id="passwordError" class="error-message"></div>
            </div>
            <input type="submit" name="login" value="Login" class="btn">
            <?php if ($loginError): ?>
                <p class="error-message"><?php echo $loginError; ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>