<?php
session_start();

if (isset($_SESSION['username'])) {
    header('Location: profile.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <title>Login - Account Portal</title>
</head>
<body>
    <div class="login">
        <div class="login__content">
            <div class="login__img">
                <img src="assets/img/img-login.svg" alt="">
            </div>

            <div class="login__forms">
                <?php if (isset($_SESSION['message'])): ?>
                    <div class="message">
                        <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
                    </div>
                <?php endif; ?>

                <form action="handlers/login.php" method="POST" class="">
                    <h1 class="login__title">Sign In</h1>

                    <div class="login__box">
                        <i class='bx bx-user login__icon'></i>
                        <input type="text" name="username" placeholder="Username" class="login__input" required>
                    </div>

                    <div class="login__box">
                        <i class='bx bx-lock-alt login__icon'></i>
                        <input type="password" name="password" placeholder="Password" class="login__input" required>
                    </div>

                    <button type="submit" class="login__button">Sign In</button>

                    <div>
                        <span class="login__account">Don't have an Account ?</span>
                        <a class="login__signin" href="signup.php">Sign Up</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>