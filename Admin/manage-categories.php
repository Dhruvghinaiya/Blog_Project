<?php
    include 'header.php';
    require 'config/database.php';

    //fetch category from database
    $query = "SELECT * FROM categories ORDER BY  title ";
    $categories = mysqli_query($con,$query);
?>

<section class="dashboard">
                <?php if(isset($_SESSION['add-category-success'])) : //shows if add category was successfully ?>  
                    <div class="alert_message success container">
                        <p>
                            <?=$_SESSION['add-category-success'];
                            unset($_SESSION['add-category-success']);
                            ?>
                        </p>
                    </div>
                    <?php elseif(isset($_SESSION['add-category'])) : //shows if add category was not successfully ?>  
                    <div class="alert_message error container">
                        <p>
                            <?=$_SESSION['add-category'];
                            unset($_SESSION['add-category']);
                            ?>
                        </p>
                    </div>
                    <?php elseif(isset($_SESSION['edit-category'])) : //shows if edit category was not successfully ?>  
                    <div class="alert_message error container">
                        <p>
                            <?=$_SESSION['edit-category'];
                            unset($_SESSION['edit-category']);
                            ?>
                        </p>
                    </div>
                    <?php elseif(isset($_SESSION['edit-category-success'])) : //shows if edit category was  successfully ?>  
                    <div class="alert_message success container">
                        <p>
                            <?=$_SESSION['edit-category-success'];
                            unset($_SESSION['edit-category-success']);
                            ?>
                        </p>
                    </div>
                    <?php elseif(isset($_SESSION['delete-category-success'])) : //shows if delete category was  successfully ?>  
                    <div class="alert_message success container">
                        <p>
                            <?=$_SESSION['delete-category-success'];
                            unset($_SESSION['delete-category-success']);
                            ?>
                        </p>
                    </div>
                    <?php endif ?>
    <div class="container dashboard_container"> 
        <button id="show_sidebar-btn" class="sidebar_toggle"><i class="uil uil-angle-right-b"></i></button>
        <button id="hide_sidebar-btn" class="sidebar_toggle"><i class="uil uil-angle-left-b"></i></button>
       
        <aside>
            <ul>
                <li>
                    <a href="add-post.php"><i class="uil uil-pen"></i>
                        &nbsp; &nbsp;&nbsp;<h5>Add Post</h5>
                    </a>
                </li>
                <li>
                    <a href="index.php"><i class="uil uil-postcard"></i>
                        &nbsp; &nbsp;&nbsp; <h5>Manage Post</h5>
                    </a>
                </li>
                    <?php if(isset($_SESSION['user_is_admin'])) : ?>
                <li>    
                    <a href="add-user.php"><i class="uil uil-plus"></i>
                        &nbsp; &nbsp;&nbsp; <h5>Add User</h5>
                    </a>
                </li>
                <li>    
                    <a href="manage-users.php"><i class="uil uil-pen"></i>
                        &nbsp; &nbsp;&nbsp;<h5>Manage User</h5>
                    </a>          
                </li>
                <li>    
                    <a href="add-category.php"><i class="uil uil-edit"></i>
                        &nbsp; &nbsp;&nbsp;<h5>Add Category</h5>
                    </a>          
                </li>
                <li>    
                    <a href="manage-categories.php" class="active"><i class="uil uil-list-ul"></i>
                        &nbsp; &nbsp;&nbsp; <h5>Manage Category</h5>
                    </a>          
                </li>
                <?php endif ?>
            </ul>
        </aside>
        <main>
            <h2>Manage Category</h2>
            <?php if(mysqli_num_rows($categories) > 0) : ?>
            <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                <tbody>
                    <?php while($category = mysqli_fetch_assoc($categories)) : ?>
                    <tr>
                        <td><?= $category['title'] ?></td>
                        <td><a href="edit-category.php?id=<?= $category['id'] ?>" class="btn sm">Edit</a></td>
                        <td><a href="delete-category.php?id=<?= $category['id'] ?>" class="btn sm danger">Delete</a></td>
                    </tr>
                   <?php endwhile ?>
                </tbody>
        </table>
        <?php else: ?>
            <div class="alert_message error"><?= " No Categories Found" ?></div>
            <?php endif ?>


        </main>
    </div>
</section>


<?php
        include '../footer.php'
    ?>
</body>
</html>