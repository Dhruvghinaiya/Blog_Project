        <?php
            include 'header.php';
            require 'Config/database.php';

            
        //fetch posts from table
        $query = "SELECT * FROM posts ORDER BY date_time DESC LIMIT 9";
        $posts = mysqli_query($con,$query) 
        ?>
        
        <section class="search_bar">
            <form action="search.php" method="GET"  class="container search_bar-container">
                <div>
                    <i class="uil uil-search"></i>
                    <input type="search" name="search" placeholder="Search">
                </div>
                <button type="submit" name="submit" class="btn">Go</button>
            </form>
        </section>

            <!--================================ END OF SEARCH =========================== -->

            <section class="posts <?= $featured ? '' : 'section_extra-margin' ?>">
        <div class="container posts_container">
            <?php while($post = mysqli_fetch_assoc($posts)): ?>
            <article class="post">
                <div class="post_thumbnail">
                    <img src="./images/<?= $post['thumbnail'] ?>" alt="">
                </div>
                <div class="post_info">
                    <?php
                        //fetch category from categories table using category_id of posy
                        // $category_id = $post['category_id'];
                        // $category_query = "SELECT * FROM categories WHERE id=$category_id";
                        // $category_result = mysqli_query($con,$category_query);
                        // $category = mysqli_fetch_assoc($category_result);
                    ?>
                    <!-- <a href="category-posts.php?id=<?=$post['category_id'] ?>" class="category_button"><?=$category['title']?></a> -->
                    <h3 class="post_title">
                        <a href="post.php?id=<?= $post['id']?>"><?= $post['title']?></a>
                    </h3>
                    <p class="post_body">
                    <?= substr( $post['body'],0,150) ?>...
                    </p>
                        <div class="post_author">
                            <?php 
                                //fetch author from users table using author_id                        
                                $author_id = $post['author_id'];
                                $author_query = "SELECT * FROM users WHERE id=$author_id";
                                $author_result = mysqli_query($con,$author_query);
                                $author = mysqli_fetch_assoc($author_result);
                            ?>

                            <div class="post_author-avatar">
                                <img src="./images/<?= $author['avatar']?>" alt="">
                            </div>
                        <div class="post_author-info">
                            <h5>By:<?= "{$author['firstname']} {$author['lastname']}" ?></h5>
                                <small>
                                    <?=date("M d,Y - H:i",strtotime($post['date_time']))?>
                            </small>
                        </div>
                    </div>
                </div>
            </article>
            <?php endwhile ?>
           
        </div>
    </section>


    <!-- =================================== END OF POSTS =================================== -->

    <section class="category_buttons">
        <div class="container category_buttons-container">
            <?php
                $all_category_query = "SELECT * FROM categories";
                $all_categories = mysqli_query($con,$all_category_query);
            ?>
            <?php while($category = mysqli_fetch_assoc($all_categories)): ?> 
            <a href="category-posts.php?id=<?= $category['id'] ?>" class="category_button"><?= $category['title'] ?></a>
           <?php endwhile ?>
        </div>
    </section>

<!--================================= END OF CATEGORY BUTTONS ======================================= -->



     <script src="main.js"></script> 
        <?php
            include 'footer.php';
        ?>
</body>
</html>