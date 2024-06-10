    <?php
        
        include 'header.php';

        //get back form data if invalid
        $title = $_SESSION['add-category-data'] ['title'] ?? null;
        $description = $_SESSION['add-category-data'] ['description'] ?? null ;

        unset($_SESSION['add-category-data']);
    ?>
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Add Category</h2>
                <?php if(isset($_SESSION['add-category'])): ?>
                    <div class="alert_message error">
                    <p>
                        <?= $_SESSION['add-category'];
                            unset($_SESSION['add-category'])
                        ?>
                    </p>
                </div>
                <?php endif ?>
            <form action="add-category-logic.php" method="POST">
                <input type="text" name="title" value="<?= $title ?>" placeholder="Title">
                <textarea type="password"  name="description" value ="<?= $description ?>" rows="4" placeholder="Description"></textarea>
                <button type="submit" name="submit" class="btn">Add Category</button>
            </form>
        </div>
    </section>
    <body>

        <?php
            include '../footer.php'
        ?>
       
    </body>
    </html>
