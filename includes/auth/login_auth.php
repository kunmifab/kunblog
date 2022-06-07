<?php

if(!isset($_POST['login_submit'])){
    $errormessage = "";
} else{
    $username_sanitize = filter_var($_POST["username"],FILTER_SANITIZE_STRING);
    $username = mysqli_real_escape_string($connect,$username_sanitize);
    $password = $_POST["password"];
    $check_sql = "SELECT * FROM admins WHERE username = '$username'";
    $check = mysqli_query($connect,$check_sql);
    $user_exists = mysqli_num_rows($check);
    if($user_exists != 1){
        $errormessage = "<div class='alert alert-danger'>Sorry, This user doesn't have an account here! Sign up or try again.</div>";
    } else {
        while($user_row = mysqli_fetch_assoc($check)){
            $user_password = $user_row["password"];
            $user_status = $user_row["status_id"];
            $user_id = $user_row["id"];
            $compare = password_verify($password,$user_password);
            if($compare != 1){
                $errormessage = "<div class='alert alert-danger'>Sorry, wrong password! Try again.</div>";
            }elseif ($user_status != 1){
                $errormessage = "<div class='alert alert-danger'>Sorry, this user is not authorised to gain access to KunBlog. Contact the admin.</div>";
            }else {
                $_SESSION["user_loggedin"] = $user_id;
                if($_SESSION["user_loggedin"]){
                    header("location: index.php");
                }else{
                    $errormessage = "<div class='alert alert-danger'>Sorry, something went wrong</div>"; 
                }
            }
        }
    }
}