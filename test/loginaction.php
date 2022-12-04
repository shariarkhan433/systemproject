<?php
session_start();
include("config.php");
include("dbcon.php");

$email = $_POST['email'];
$password = $_POST['password'];

if ($email == "") {
    echo "Email is required";
    # code...
}
elseif ($password == "") {
    echo "Password is required";
    # code...
}
else{
    $rdb = new firebaseRDB($databaseURl);
    $retrieve = $rdb->retrieve("/user","email","EQUAL", $email);
    $data = json_decode($retrieve,1);

    if (count($data) == 0) {
        echo "email is not registered";
    }
    else{
        $id = array_keys($data)[0];
        if($data[$id]['password'] == $password){
            $_SESSION['user'] = $data[$id];
            $_SESSION['status'] = "Logged in successfully";
            header("location: regpage.php");
        }
        else {
            echo "login failed";
        }
    }
}