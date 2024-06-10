<?php

    if(isset($_POST['s'])){
        $name = $_POST['name'];
        $city = $_POST['city'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        $avatar = 'img/'. $_FILES['avatar']['name'];
        $avatar_tmp_name = $_FILES['avatar']['tmp_name'];
         move_uploaded_file($avatar_tmp_name,$avatar);

         if(!$name){
            $_SESSION['signup'] = "Please Enter Name";
         }
         elseif(!$city){
            $_SESSION['signup'] = "Please Enter City";
         }
         elseif(!$mobile){
            $_SESSION['signup'] = "Please Enter Mobile";
         }
         elseif(strlen($mobile) <=10){
            $_SESSION['signup'] = "Please Enter Mobile Number in Valid";
         }
         elseif(!$email){
            $_SESSION['signup'] = "Please Enter Email";
         }
         elseif(!$pass){
            $_SESSION['sinup'] = "Please Enter Password";
         }
         elseif(strlen($pass) <8){
            $_SESSION['signup'] = "Password is 8 + character Enter";
         }
         elseif(!$cpass){
            $_SESSION['signup'] = "Please Enter Confirm Password";
         }
         else{
            if($pass !== $cpass){
                $_SESSION['signup'] = "Password and Confirm Password do not match";
             }    
         }
    }
?>