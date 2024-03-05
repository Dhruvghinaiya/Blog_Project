
    <?php
        include 'header.php';
        require 'Config/database.php';

        //fetch post from database if id is set
        
        if(isset($_GET['id'])){
            $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
            $query = "SELECT * FROM posts WHERE id=$id";
            $result = mysqli_query($con,$query);
            $post = mysqli_fetch_assoc($result);
        }
        else{
            header('location:blog.php');
        }
    ?>
    <section class="singlepost">
        <div class="container singlepost_container">
            <h2><?= $post['title']?></h2>
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
            <div class="singlepost_thumbnail">
                <img src="./images/<?= $post['thumbnail']?>" alt="">
            </div>
            <p>
                <?= $post['body']?>
            </p>
    </section>

        <!--================================= END OF SINGLE POST ================================= -->


<footer>
    <div class="footer_socials">
        <a href="https://www.youtube.com/channel/UCqRZEUA4Ui5tzGelqUI3-UA/featured" target="_blank"><i class="uil uil-youtube"></i></a>
         <a href="https://facebook.com" target="_blank"><i class="uil uil-facebook-f"></i></a> 
         <a href="https://instagram.com" target="_blank"><i class="uil uil-instagram-alt"></i></a>
          <a href="https://linkedin.com" target="_blank"><i class="uil uil-linkedin"></i></a>
    </div>
    <div class="container footer_container">
        <article>
            <h4>Categories</h4>
            <ul>
                <li><a href="">Art</a></li>
                <li><a href=""> Wild Life </a></li>
                <li><a href="">Travel</a> </li>
                <li><a href="">Science & Technology</a> </li>
                <li><a href="">Food</a> </li>
                <li><a href="">Music</a> </li>
            </ul>
        </article>
        <article>
            <h4>Support</h4>
            <ul>
                <li><a href=""> Online Support</a></li>
                <li><a href="">Call NUmbers</a> </li>
                <li><a href="">Emails</a> </li>
                <li><a href="">Social Support</a> </li>
                <li><a href="">Location</a> </li>
            </ul>
        </article>
        <article>
            <h4>Blog</h4>
            <ul>
                <li><a href="">Safety</a> </li>
                <li><a href="">Repair</a> </li>
                <li><a href="">Recent</a> </li>
                <li><a href="">popular</a> </li>
                <li><a href="">Categories</a> </li>
                <li><a href="">Music</a> </li>
            </ul>
        </article>
        <article>
            <h4>PermaLinks</h4>
            <ul>
                <li><a href="">Home</a> </li>
                <li><a href="">Blog</a> </li>
                <li><a href="">Services</a> </li>
                <li><a href="">Contact</a> </li>
                <li><a href="">About</a> </li>
            </ul>
        </article>
    </div>
    <div class="footer_copyright">
        <small>Copyright &copy; 2022 DG TUTORIALS</small>
        <br>
        <div class="container">
            <div class="row">
              <div class="col-md-12 text-center">
                <h6 class="animate-charcter">Design & Devlopment By : Dhruv Ghinaiya</h6>
              </div>
            </div>
          </div>
        
    </div>

</footer>

    <script src="./main.js"></script>

</body>
</html>