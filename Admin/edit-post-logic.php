<?php

require 'config/database.php';

///make sure edit post button was ckicked

if (isset($_POST['submit'])) 
{
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var($_POST['is_featured'],FILTER_SANITIZE_NUMBER_INT);
    //set is featured to 0 of it was clicked
    $is_featured = $is_featured == 1 ?: 0;

    //check and validate input values

    if (!$title) {
        $_SESSION['edit-post'] = "Couldn't Update Post. Invalid Form Data On Edit Post Page ";
    } elseif (!$category_id) {
        $_SESSION['edit-post'] = "Couldn't Update Post. Invalid Form Data On Edit Post Page ";
    } elseif (!$body) {
        $_SESSION['edit-post'] = "Couldn't Update Post. Invalid Form Data On Edit Post Page ";
    } 
        
    if($_SESSION['edit-post']){
        //redirect to manage for page if form was invalid
        $_SESSION['add-post-data'] = $_POST;
        header('location:index.php');
        die();
    }
    else{
        //set is_featured of all posts to 0 if_featured for this post is 1
        if($is_featured == 1){
            $zero_all_is_featured_query = "UPDATE posts SET is_featured = 0";
            $zero_all_is_featured_result = mysqli_query($con,$zero_all_is_featured_query);
        }


    //redirect back (with form data) to edit-post page if there is any problem
    if ($_SESSION['edit-post']) {
         header('location:manage-index.php');
    } else {
         $query = "UPDATE posts SET title='$title',body='$body',category_id='$category_id',is_featured='$is_featured' WHERE id=$id LIMIT 1 ";
        $result = mysqli_query($con,$query);
    }
    }
    if (!mysqli_errno($con)) {
        $_SESSION['edit-post-success'] = "Post Update Successfully..";
    }
}

     header('location:index.php');
     die();
