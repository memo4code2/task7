<?php
session_start();

$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

$errors = [];

if (strlen($username) < 3) {
    $errors[] = "Username must be at least 3 characters";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Valid email is required";
}

if (strlen($password) < 6) {
    $errors[] = "Password must be at least 6 characters";
}

$file = '../data/users.csv';
if (file_exists($file)) {
    $handle = fopen($file, 'r');
    while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
        if (isset($data[0]) && $data[0] === $username) {
            $errors[] = "Username already taken";
        }
        if (isset($data[1]) && $data[1] === $email) {
            $errors[] = "Email already registered";
        }
    }
    fclose($handle);
}

if (!empty($errors)) {
    $_SESSION['message'] = implode("\\n", $errors);
    header('Location: ../signup.php');
    exit;
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$user_data = [$username, $email, $hashed_password];

if (!is_dir('../data')) {
    mkdir('../data', 0777, true);
}

$handle = fopen($file, 'a');
fputcsv($handle, $user_data);
fclose($handle);

$_SESSION['username'] = $username;
$_SESSION['email'] = $email;
$_SESSION['member_since'] = date('F j, Y');

$_SESSION['message'] = "Account created successfully!";
header('Location: ../profile.php');
exit;
?>