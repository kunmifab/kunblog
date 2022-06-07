<?php

session_start();

if(isset($_SESSION["user_loggedin"])){
    $_SESSION["user_loggedin"] = NULL;
    header("Location: login.php");
}else{
    header("Location: login.php");
}