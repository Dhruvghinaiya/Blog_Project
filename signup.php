<?php
    session_start();
     //get back from data if there was  a registation error
     $firstname = $_SESSION['signup-data']['firstname'] ?? null;
     $lastname = $_SESSION['signup-data']['lastname'] ?? null;
     $username = $_SESSION['signup-data']['username'] ?? null;
     $email = $_SESSION['signup-data']['email'] ?? null;
     $password = $_SESSION['signup-data']['password'] ?? null;
     $confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;

    // delete signup data session
     unset($_SESSION['signup-data']);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP Blog Website</title>

        <!-- connect stylesheet  design file  -->
        <link rel="stylesheet" href="style.css">

        <!--============= GOOGLE FONT =================  -->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">


    </head>
    <body>

        <section class="form_section">
            <div class="container form_section-container">
                <h2>SignUp</h2>
                    <?php
                    if(isset($_SESSION['signup'])): ?> 
                    <div class="alert_message error">
                        <p>
                            <?= $_SESSION['signup']; 
                            unset($_SESSION['signup'])

                            ?></p>
                    </div>
                    <?php endif ?>    
                
                <form action="signup-logic.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <input type="text" name="firstname" value="<?= $firstname?>" placeholder="First Name">
                    <input type="text" name="lastname" value="<?= $lastname?>" placeholder="Last Name">
                    <input type="text" name="username" value="<?= $username?>" placeholder="UserName">
                    <input type="email" name="email" value="<?= $email?>" placeholder="Email">
                    <input type="password" name="password" value="<?= $password?>" placeholder="Create Password">
                    <input type="password" name="confirmpassword" value="<?= $confirmpassword?>" placeholder="Confirm Password">
                    <div class="form_control">
                        <label for="avatar"></label>
                        <input type="file" name="avatar" id="avatar">
                    </div>
                    <button type="submit" name="submit" class="btn">Sign Up</button>
                    <small>Already have an account <a href="signin.php">Sign In</a></small>
                </form>
            </div>

        </section>

    </body>
</html>