<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <?php session_start(); ?>

    <form action="handleForm.php" method="POST">
        <p><input type="text" placeholder="First name here" name="userName" required></p>
        <p><input type="password" placeholder="Password here" name="userPassword" required></p>
        <p><input type="submit" value="Login" name="loginBtn"></p>
        <p><input type="submit" value="Logout" name="logoutBtn"></p>
    </form>

    <?php 
    // Display any login/logout message
    if (isset($_SESSION['alertMessage'])) {
        echo '<h2>' . htmlspecialchars($_SESSION['alertMessage']) . '</h2>';
        unset($_SESSION['alertMessage']); // Clear the message after displaying it
    } else {
        // Display user information if logged in
        if (isset($_SESSION['userName'])) { ?>
            <h2>User logged in: <?php echo htmlspecialchars($_SESSION['userName']); ?></h2>
            <h2>User password: <?php echo htmlspecialchars($_SESSION['hashedPassword']); ?></h2>
        <?php }
    }
    ?>
</body>
</html>
