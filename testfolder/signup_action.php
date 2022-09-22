<?php
include("config.php");
include("firebaseRDB.php");

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

if ($name == "") {
    echo "Email is required";
    # code...
}
else if ($name == "") {
    echo "email is required";
    # code...
}
else if ($password == "") {
    echo "Password is required";
    # code...
}
else{
    $rdb = new firebaseRDB($databaseURL);
    $retrieve = $rdb->retrieve("/user","email","EQUAL", $email);
    $data = json_decode($retrieve,1);

    if (isset($data['email'])) {
        echo "email already used";
    }
    else{
    $insert = $rdb->insert("/user", [
        "name" => $name,
        "email" => $email,
        "password" => $password
    ]);
    $result = json_decode($insert,1);
    if(isset($result['name'])){
        echo "Sign up success, now you can login";
    }
    else{
        echo "signup failed";
    }
    }
    
}