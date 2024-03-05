<?php
require 'config/database.php';
session_start();
if(isset($_POST['submit'])){
    //get form data
    $username_email = filter_var($_POST['username_email'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password= filter_var($_POST['password'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(!$username_email){
        $_SESSION['signin'] = "Username Or Email Requred";
    }elseif(!$password){
        $_SESSION['signin'] ="Password Requred";
    }else{
        //fetch user from database
        $fetch_user_query = "SELECT * FROM users WHERE username='$username_email' OR email='$username_email'";

        $fetch_user_result = mysqli_query($con,$fetch_user_query);

        if(mysqli_num_rows($fetch_user_result) == 1)
        {
            //convent the record into assoc array
            $user_record = mysqli_fetch_assoc($fetch_user_result);
            $db_password = $user_record['password'];
             //compare form password with database password
             if($password == $db_password)
             {
                //set session access control
                $_SESSION['user-id'] = $user_record['id'];
                // set session if user is an admin
                if($user_record['is_admin'] == 1)
                {
                    $_SESSION['user_is_admin']= true;
                }
                header('location:admin/');
                //log user in 
             }  
             else{
                $_SESSION['signin'] = "Please Check Your Input";
            }
        }
        else{
            $_SESSION['signin'] = "User Not Found";
        }
    }
    
    //if any problem, redirect back to signin page with login data
    if(isset($_SESSION['signin'])){
        $_SESSION['signin-data'] = $_POST;
        header('location:signin.php');
        die();
    } 

    

}
else{
    header('location:signin.php');
    die();
}