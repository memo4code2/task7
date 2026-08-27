<?php
session_start();
include '../core/functions.php';
include '../core/valid.php';

$errorrs = [];

if (checkRequestMethod("POST") && checkPostInput('username')) {

    foreach ($_POST as $key => $value) {
        $$key = SantizInput($value);
    }


    if (!requiredVal($username) || !requiredVal($password)) {
        $errorrs[] = "Check all inputs must be not Empty";
    }

  
    if (empty($errorrs)) {

        $found = false;
        $users_file = fopen("../data/users.csv", "r");

        if ($users_file) {
            while (($data = fgetcsv($users_file)) !== false) {
          
                if (!isset($data[0], $data[1], $data[2])) {
                    continue;
                }

                if ($data[0] === $username) {
                
                    $passwordMatches = (sha1($password) === $data[2]) ;
                      

                    if ($passwordMatches) {
                        $found = true;
                        $_SESSION['auth'] = [$data[0], $data[1]];
                        break;
                    }
                }
            }
            fclose($users_file);
        }

        if (!$found) {
            $errorrs[] = "Username or Password is incorrect";
        }
    }

   
    if (empty($errorrs)) {
        header("Location: ../profile.php");
        die;
    } else {
        $_SESSION['message'] = implode("<br>", $errorrs);
        header("Location: ../index.php");
        die;
    }
}
?>