<?php
include("config.php");

if(!isset($_SESSION['user'])){
    header("location: testfolder/login.php");
}
else{
    header("location: testfolder/dashboard.php");
}