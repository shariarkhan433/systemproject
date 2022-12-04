<?php
session_start();
include("config.php");
include("dbcon.php");

$name = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

if($name == ""){
    echo "Email is required";
}elseif($password == ""){
    echo "Password is required";
}else{
    $rdb = new firebaseRDB($databaseURl);
    $retrieve = $rdb->retrieve("/user","email","EQUAL",$email);
    $data = json_decode($retrieve,1);

    if(isset($data['email'])){
        echo "email is required";
    }
    else{
        $insert = $rdb->insert("/user",[
            "name" => $name,
            "email" => $email,
            "password" => $password
        ]);
     $result = json_decode($insert,1);
    if(isset($result['name'])){
        $_SESSION['status'] = "User sign up is successful";
        header("location: test.php");
    }
    else{
        echo "signup failed";
    }
    }
    }
?>