<?php

require 'config/database.php';

if(isset($_POST['submit'])){
    //get form data
    $title = $_POST['title'];
    $description = $_POST['description'];

    if(!$title){
        $_SESSION['add-category'] = "Enter Title";
    }
    elseif(!$description){
        $_SESSION['add-category'] = "Enter Description";
    }
    
    //redirect back to add category page with form data if there was invalid input
    if(isset($_SESSION['add-category'])){
        $_SESSION['add-category-data'] = $_POST;
        header('location:add-category.php');
        die();
    
    }
    else{

        $query = "INSERT INTO categories (title,description) VALUES('$title','$description')";
        $result = mysqli_query($con,$query);
        if(mysqli_errno($con)){
            $_SESSION['add-category'] = "couldn't add category";
            header('location:add-category.php');
            die();
        }
        else{
            $_SESSION['add-category-success'] = " $title category added successfully";
            header('location:manage-categories.php');
            die();
        }
    }
    
   }
