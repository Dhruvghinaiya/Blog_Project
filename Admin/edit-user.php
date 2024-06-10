    <?php
        include 'header.php';
        require 'config/database.php';

        if(isset($_GET['id'])){
            $id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
            $query = "SELECT * FROM users WHERE id=$id";
            $result = mysqli_query($con,$query);
            $user = mysqli_fetch_assoc($result); 
        }
        else{
            header('location:manage-users.php');
            die();
        }
    ?>
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Edit User</h2>
            
            <form action="edit-user-logic.php"  method="POST">
                <input type="hidden" value="<?= $user['id'] ?>" name="id" >
                <input type="text" value="<?= $user['firstname'] ?>" name="firstname" placeholder="First Name">
                <input type="text" value=" <?= $user['lastname'] ?>" name="lastname" placeholder="Last Name">
                 <select name="userrole" >
                    <option value="0">Author</option>
                    <option value="1">Admin</option>
                </select>
                
                <button type="submit" name="submit" class="btn">Update User</button>
            </form>
        </div>
    </section>
    <body>
    <?php
        include '../footer.php'
    ?>
    </body>
    </html>