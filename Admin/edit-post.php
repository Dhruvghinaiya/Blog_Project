    <?php
        include 'header.php';
        require 'config/database.php' ; 
        //fetch categories from database
        $category_query = "SELECT * FROM categories";
        $categories = mysqli_query($con,$category_query);

        //fetch post data from database if id is set

        if(isset($_GET['id'])){
            $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
            $query = "SELECT * FROM posts WHERE id= $id";
            $result = mysqli_query($con,$query);
            $post= mysqli_fetch_assoc($result);
        }
        else{
            header('location:index.php');
            die();
        }
    ?>

    <section class="form_section">
        <div class="container form_section-container">
            <h2>Edit Post</h2>
            <form action="edit-post-logic.php"  enctype="multipart/form-data" method="POST">
                <input type="hidden" name="id" value="<?=$post['id']?>" >
                <input type="text" name="title" value="<?=$post['title']?>" placeholder="Title">
                <select name="category">
                    <?php while($category = mysqli_fetch_assoc($categories)): ?>
                    <option value="<?= $category['id'] ?>"><?=$category['title'] ?></option>
                    <?php endwhile ?>
                </select>
                <textarea   rows="10" placeholder="Body" name="body"><?= $post['body'] ?></textarea>
                <div class="form_control inline">
                    <input type="checkbox" name="is_featured"id="is_featured" value="1" checked>
                    <label for="is_featured"  >Featured</label>
                </div>
                <div class="form_control">
                    <label for="thumbnail">Change Thumbnail</label>
                    <input type="file" name="thumbnail"  id="thumbnail">

                </div>
                <button type="submit" name="submit" class="btn">Update Post</button>
            </form>
        </div>
    </section>
    <body>
    <?php
        include '../footer.php'
    ?>
        
    </body>
    </html>