    <?php

            include 'header.php';
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>contact us</title>
            <style>

form{
            background-color:cornflowerblue;
            position: relative;
            bottom: 130px;
            left: 600px;
            width: 300px;
            height: 400px;
            
        }
      .i1{
        position: relative;
        left: 20px;

      }
      .i2{
        position: relative;
        left: 20px;
        
      }
      .i3{
        position: relative;
        left: 20px;
        
     }
      .i4{
        position: relative;
        left: 20px;
      }

      .heading2{
        color:chartreuse ;
        position: relative;
        left: 20px;
        
      }
      .btn{
        position: relative;
        left: 30px;
        background-color:chocolate;
        color:white;
        
      }
      
            </style>
        </head>
        <section class="empty_page">
            <h2>Contact Page</h2>
        </section>

        <div class="container">
                <p>Hello my name is dhruv ghinaiya i am web devloper and profestional work in please your review in send in message. thank you</p>
                <br>

                <h5 class="mobile">Mobile:</h3>
                <label for="" class="label1">8155931920</label>
                
                <h5 class="email">Email:</h3>
                <label for="" class="label2">dhruvghinaiya793@gmail.com</label>

                <h5 class="mobile">Address:</h3>
                <label for="" class="label3">To.chhapari,savarkudla,amreli</label>
                    
                <form action="" method="POST" onsubmit=""><br>
                <h4 class="heading2">send a message</h4>
                <label for="name">
                            <input type="text" name="name" class="i1" id="name" placeholder="Enter Name" >
                    </label>
                    <label for="mobile">
                        <input type="text" name="mobile" class="i2" placeholder="Enter Mobile">
                    </label>
                    <label for="email">
                        <input type="Email" name="email" class="i3" placeholder="Enter email">
                    </label>
                    <label for="message">
                        <textarea name="message" id="" class="i4"  placeholder="message..."></textarea>
                    </label>
                        
                    <input type="submit" name="btn" value="submit"  class="btn" >
                </form>
        </div>


    
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
      <?php
if (isset($_POST['btn'])) {

    $nm = $_POST['name'];
    $mb = $_POST['mobile'];
    $em = $_POST['email'];
    $ms = $_POST['message'];
    

        //database connectivity
    $con = mysqli_connect("localhost", "root","","blog");

    $sql = ("INSERT INTO message(name,mobile,email,message) VALUES('$nm','$mb','$em','$ms')");
    mysqli_query($con,$sql);
    
    echo '<script>alert("your message is send successfully..")</script>'; 
}

?>
</body>
</html>