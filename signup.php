<?php
session_start();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <title>Sign Up - Account Portal</title>
</head>
<body>
    <h1>
            <?php  
        
        if(isset($_SESSION['errorrs'])):

        foreach($_SESSION['errorrs'] as $errorrs ) :    ?>
            <div class="alert alert-danger text-center">
                             <?php  echo $errorrs ; ?>
            </div>
       <?php endforeach; 
       unset($_SESSION['errorrs']) ;
       endif;
        
       ?>
    </h1>
    <div class="login">
        <div class="login__content">
            <div class="login__img">
                <img src="assets/img/img-login.svg" alt="">
            </div>

            <div class="login__forms">
             
                <form action="handlers/register.php" method="POST" class="login__registre">
                    <h1 class="login__title">Create Account</h1>

                    <div class="">
                        <i class='bx bx-user login__icon'></i>
                        
                        <input type="text" name="username" placeholder="Username" class="login__input" required>
                    </div>

                    <div class="">
                        <i class='bx bx-at login__icon'></i>
                        <input type="email" name="email" placeholder="Email" class="login__input" required>
                    </div>

                    <div class="">
                        <i class='bx bx-lock-alt login__icon'></i>
                        <input type="password" name="password" placeholder="Password" class="login__input"  required>
                    </div>

                    <button type="submit" class="login__button">Sign Up</button>

                    <div>
                        <span class="login__account">Already have an Account ?</span>
                        <a class="login__signin" href="index.php">Sign In</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>