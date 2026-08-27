<?php
session_start() ;
include '../core/functions.php' ;
include '../core/valid.php' ;


$errorrs = [] ;

if( checkRequestMethod("POST")  &&  checkPostInput('username')) {

foreach($_POST as $key  => $value) {
   $$key = SantizInput($value)     ;  
}

if (!requiredVal($username) || !requiredVal($email) || !requiredVal($password)) {
    $errorrs[] = "Check all inputs must be not Empty";
}


elseif( ! minVal($username,3)){
   $errorrs[]= "Name must be Bigger than 3" ;

}elseif(! maxVal($username , 25)){

 $errorrs[]= "Name Cant Be Bigger Than 25" ;

}


elseif( ! minVal($password,3)){
   $errorrs[]= "password must be Bigger than 3" ;

}elseif(! maxVal($password , 30)){

 $errorrs[]= "password Cant Be Bigger Than 30" ;

}




if(empty($errorrs)){
  $users_file = fopen("../data/users.csv","a+") ;
  $data =[$username ,$email,sha1($password)] ;
  fputcsv($users_file,$data) ;

  $_SESSION['auth'] = [$username , $email] ;
  header("Location: ../profile.php");



}else{
  $_SESSION['errorrs'] = $errorrs ;
  header("location:../signup.php") ;
  die;
}


}

var_dump($errorrs) ;
?>