<?php

require 'config/database.php';

if(isset($_GET['id'])){
    $id= filter_var($_GET['id'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    

    $query1 = "SELECT * FROM categories WHERE id=$id";
    $result1 = mysqli_query($con,$query1);
    $category = mysqli_fetch_assoc($result1);
    
    
            
            //delete category
                $query = "DELETE FROM categories WHERE id=$id LIMIT 1";
                $result = mysqli_query($con,$query);
                $_SESSION['delete-category-success'] = "{$category['title']} Category Deleted Successfully..";

        
}
    header('location:manage-categories.php');
?>