<?php

require 'config/database.php';

if(isset($_GET['id'])){
    //fetch user from database
    $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);

    
    //fetch user from database

    $query = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($con,$query);
    $user = mysqli_fetch_assoc($result);

    //make sure we got back only one user
    if(mysqli_num_rows($result) == 1){
        $avatar_name = $user['avatar'];
        $avatar_path = '../images/'.$avatar_name;
        //delete image if available
        if($avatar_path);{
            unlink($avatar_path);
        }
    }

    //for later
    //fetch all thumbnail of user's posts and delete them
        $thumbnail_query = "SELECT thumbnail FROM posts WHERE author_id=$id";
        $thumbnail_result = mysqli_query($con,$thumbnail_query);
        if(mysqli_num_rows($thumbnail_result) > 0){
            while($thumbnail = mysqli_fetch_assoc($thumbnail_result)){
                $thumbnail_path = '../images/'. $thumbnail['thumbnail'];

                //delete thumbnail from folder is exits
                if($thumbnail_path){
                    unlink($thumbnail_path);
                }
            }
        }

    //delete user from database
    $delete_user_query = "DELETE FROM users WHERE id=$id";
    $deleter_user_result = mysqli_query($con,$delete_user_query);
    if(mysqli_errno($con)){
        $_SESSION['delete-user'] = "could't delete {$user['firstname']} {$user['lastname']}";
    }
    else{
        $_SESSION['delete-user-success'] ="{$user['firstname']} {$user['lastname']} Deleted Successfully..";
    }

}

    header('location:manage-users.php');

?>