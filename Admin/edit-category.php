    <?php
        include 'header.php';
         require 'config/database.php';
        if(isset($_GET['id'])){
            $id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
            $query = "SELECT * FROM categories WHERE id=$id";
            $result = mysqli_query($con,$query);
            $category = mysqli_fetch_assoc($result); 
        }
        else{
             header('location:manage-categories.php');
            die();
        }
        
    ?>
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Edit Category</h2>
            
            <form action="edit-category-logic.php" method="POST">
                <input type="hidden" name="id" value="<?= $category['id']?>" >
                <input type="text" name="title" value="<?= $category['title']?>" placeholder="Title">
                <textarea type="password" name="description" rows="4"   placeholder="Description"><?= $category['description']?></textarea>
                <button type="submit" name="submit" class="btn">Update Category</button>
            </form>
        </div>
    </section>
    <body>

    <?php
        include '../footer.php'
    ?>
        
    </body>
    </html>