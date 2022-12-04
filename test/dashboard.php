<?php
include("config.php");
include("dbcon.php");

if(!isset($_SESSION['user'])){
    header("location: loginpage.php");
}
else{
    echo "hello {$_SESSION['user']['name']}, welcome to my website";
    echo "<a href='#'>Logout</a>";
}