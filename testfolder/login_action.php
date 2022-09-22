<?php
include("config.php");
include("firebaseRDB.php");

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
    $rdb = new firebaseRDB($databaseURL);
    $retrieve = $rdb->retrieve("/user","email","EQUAL", $email);
    $data = json_decode($retrieve,1);

    if (count($data) == 0) {
        echo "email is not registered";
    }
    else{
        $id = array_keys($data)[0];
        if($data[$id]['password'] == $password){
            $_SESSION['user'] = $data[$id];
            header("location : dashboard.php");
        }
        else {
            echo "login failed";
        }
    }
}