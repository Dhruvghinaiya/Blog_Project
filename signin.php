<?php
    session_start();
    require 'config/database.php';
    $username_email = $_SESSION['signin-data']['username_email'] ?? null;
    $password = $_SESSION['signin-data']['password'] ?? null;
    

    unset($_SESSION['signin-data']);
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <!-- connect stylesheet  design file  -->
        <link rel="stylesheet" href="style.css">

        <!--============= GOOGLE FONT =================  -->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">


    </head>
    <body>

        <section class="form_section">
            <div class="container form_section-container">
                <h2>Sign In</h2>
                <?php if(isset($_SESSION['signup-success'])) : ?>
                    <div class="alert_message success">
                        <p>
                            <?=$_SESSION['signup-success'];
                            unset($_SESSION['signup-success']);
                            ?>
                        </p>
                    </div>
                    <?php elseif(isset($_SESSION['signin'])) : ?>
                    <div class="alert_message error">
                        <p>
                            <?= $_SESSION['signin'];
                            unset($_SESSION['signin']);
                            ?>
                        </p>
                    </div>
                    <?php endif ?>
                <form action="signin-logic.php" method="POST" autocomplete="off">
                    <input type="text" name="username_email" value="<?= $username_email ?>" placeholder=" Email"><br>
                    <input type="password" name="password" value="<?= $password ?>" placeholder="Password">
                    <button type="submit" name="submit" class="btn">Sign In</button>
                    <small>Already have an account <a href="signUp.php">Sign Up</a></small>
                </form>
            </div>

        </section>

    </body>
</html>