<?php
session_start();
require_once "database.php";

if (isset($_POST["submit"])) {
    $userName = trim($_POST["userName"]);
    $password = $_POST["password"];

    if (empty($userName) || empty($password)) {
        $error = "All fields are required!";
    } else {
        $sql = "SELECT * FROM users WHERE userName = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $userName);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION["user"] = $user;
            echo "<script>
                    alert('Login Successful! Redirecting to Dashboard!');
                    window.location.href = 'dashboard.php';
                  </script>";
            exit();
        } else {
            $error = "Invalid Username or Password!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="login-body">
    <div class="login-container">
        <img src="ccs.png" alt="Logo" class="logo">
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form action="login.php" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" name="userName" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="submit">Login</button>
        </form>
        <p class="mt-3">
            Don't have an account? <a href="registration.php">Register here</a>
        </p>
    </div>
</body>
</html>
