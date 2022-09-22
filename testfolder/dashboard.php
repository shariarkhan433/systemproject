<?php
include("config.php");
include("firebaseRDB.php");

if(!isset($_SESSION['user'])){
    header("location: login.php");
}
else{
    echo "hello {$_SESSION['user']['name']}, welcome to my website";
    echo "<a href='#'>Logout</a>";
}