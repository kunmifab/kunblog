<?php

if(!isset($_SESSION["user_loggedin"])){
    header("Location: login.php");
}else {
    $user_id_unsanitized = $_SESSION["user_loggedin"];
    $user_id = mysqli_real_escape_string($connect,filter_var($user_id_unsanitized,FILTER_SANITIZE_STRING));
    $check_user_exists_sql = "SELECT * FROM admins WHERE id = $user_id";
    $check_user_exists = mysqli_query($connect,$check_user_exists_sql);
    if(mysqli_num_rows($check_user_exists) != 1){
        header("Location: login.php");
    }else {
        while($user_row = mysqli_fetch_assoc($check_user_exists)){
            $user_username = $user_row["username"];
            $user_status = $user_row["status_id"];
            $user_id = $user_row["id"];
            $user_role = $user_row["role"];
        }
        if($user_status != 1){
            header("Location: login.php");
        }else{
            //nothing
        }
    }
}