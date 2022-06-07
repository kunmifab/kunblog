<?php

if(!isset($_POST['signup_submit'])){
    $errormessage = "";
} else {
    $username = mysqli_real_escape_string($connect,filter_var($_POST["username"],FILTER_SANITIZE_STRING));
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];

    if(strlen($password1) < 7 || strlen($password2) < 7){
        $errormessage = "<div class='alert alert-danger'>Sorry, your password must be more than 7 characters</div>";
    } elseif($password1 != $password2){
        $errormessage = "<div class='alert alert-danger'>Sorry, your password is not the same</div>";
    }else {
        $check_sql = "SELECT * FROM admins WHERE username = '$username'";
        $check = mysqli_query($connect,$check_sql);
        if(mysqli_num_rows($check) == 1){
            $errormessage = "<div class='alert alert-danger'>Sorry, that user has an account already. Try something else.</div>";
        }else{
            $final_pwd = password_hash($password1,PASSWORD_BCRYPT,array("cost"=>10));
            $submit_sql = "INSERT INTO admins(username,password) VALUE('$username','$final_pwd')";
            $submit = mysqli_query($connect,$submit_sql);

            if($submit){
                $errormessage = " <div class='alert alert-success'>Congrats! Your registration was successful. Click <a href='login.php'>here</a> to login. </div>";
            }else {
                $errormessage = " <div class='alert alert-danger'>Sorry, your registration failed. Try again later.</div>";
            }
        }
    }
}
