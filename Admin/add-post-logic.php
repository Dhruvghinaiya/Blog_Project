<?php 

    require 'config/database.php';  

    if(isset($_POST['submit'])){
        $author_id = $_SESSION['user-id'];
        $title = filter_var($_POST['title'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $body = filter_var($_POST['body'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $category_id = filter_var($_POST['category'],FILTER_SANITIZE_NUMBER_INT);
        $is_featured = filter_var($_POST['is_featured'],FILTER_SANITIZE_NUMBER_INT);
        $thumbnail = $_FILES['thumbnail'];

        // set is_featured to 0 if unchecked

        $is_featured = $is_featured == 1 ?: 0;

        // validate form data
        if(!$title){
            $_SESSION['add-post'] = "Enter Post Title ";
        }
        elseif(!$category_id){
            $_SESSION['add-post'] = "Select Post Category";
        }
        elseif(!$body){
            $_SESSION['add-post'] = "Enter Post Body";
        }
        elseif(!$thumbnail){
            $_SESSION['add-post'] = "Choose Post Thumbnail";
        }
        else{
            // work on thubnail
            // rename the image
            $time = time(); //make each image name unique
            $thubnail_name = $time.$thumbnail['name'];
            $thubnail_tmp_name = $thumbnail['tmp_name'];
            $thubnail_destination_path = "../images/".$thubnail_name;
            
            //make sure file is an image
            $allowed_files = ['png','jpg','jpeg'];
            $extension = explode('.',$thubnail_name);
            $extension = end($extension);
            
            if(in_array($extension,$allowed_files)){
                //make sure umage is not too big.(3mb+)
                if($thumbnail['size'] < 500000000000000){
                    //upload thubnail
                    move_uploaded_file($thubnail_tmp_name,$thubnail_destination_path);
                }
                else{
                    $_SESSION['add-post'] = "File Size Too Big. Should Be Less Than 3mb ";
                }
            }
            else{
                $_SESSION['add-post'] = "File Should Be Png, jpg, or jpeg";
            }
        }
        
        //redirect back (with form data) to add-post page if there is any problem
        if(isset($_SESSION['add-post'])){
            $_SESSION['add-post-data'] = $_POST;
            header('location:add-post.php');
            die();
        }
        else{
            //set is_featured of all posts to 0 if_featured for this post is 1
            if($is_featured == 1){
                $zero_all_is_featured_query = "UPDATE posts SET is_featured = 0";
                $zero_all_is_featured_result = mysqli_query($con,$zero_all_is_featured_query);
            }

            //insert post into database
            $query = "INSERT INTO posts (title,body,thumbnail,category_id,author_id,is_featured) VALUES('$title','$body','$thubnail_name','$category_id','$author_id','$is_featured')";
            $result = mysqli_query($con,$query);
            
            if(!mysqli_errno($con)){
                $_SESSION['add-post-success'] = "New Post Added Successfully..";
                header('location:index.php');
                die();
            }
        }
    }

     header('location:add-post.php');
     die();
?>