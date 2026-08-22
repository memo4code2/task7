<?php
session_start();

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    $_SESSION['message'] = "Please fill in all fields";
    header('Location: ../index.php');
    exit;
}

$file = '../data/users.csv';

if (!file_exists($file)) {
    $_SESSION['message'] = "No users found. Please sign up first.";
    header('Location: ../index.php');
    exit;
}

$user_found = false;
$handle = fopen($file, 'r');

while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
    if (isset($data[0]) && trim($data[0]) === trim($username)) {
        $user_found = true;
        
        if (password_verify($password, $data[2])) {
            $_SESSION['username'] = trim($data[0]);
            $_SESSION['email'] = trim($data[1]);
            $_SESSION['member_since'] = date('F j, Y');
            
            fclose($handle);
            header('Location: ../profile.php');
            exit;
        } else {
            $_SESSION['message'] = "Wrong password";
            fclose($handle);
            header('Location: ../index.php');
            exit;
        }
    }
}

fclose($handle);

if (!$user_found) {
    $_SESSION['message'] = "Username not found. Please sign up first.";
    header('Location: ../index.php');
    exit;
}
?>