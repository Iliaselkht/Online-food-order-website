<?php include('../config/cots.php'); ?>

<html>
    <head>
    <meta name="viewport" content="width = device-width , initial-scale = 1.0">
        <title>Login</title>
        <link rel="stylesheet" href="../css/log.css">
        <style>
            .eror{
                text-align: top center;
                background: red;
            }
        </style>
    </head>

    <body>
    <br><br>
     <?php 
              if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>

       <!--Login Form Starts HEre-->
            <div class="container">
            <form action="" method="POST" class="text-center">
            <h1 class="formtit">Login</h1>
           <div class="forpug">
            <input type="text" class="forput" name="username" placeholder="Enter Username">
            </div>
             <div class="forpug">  
            <input type="password" class="forput" name="password" placeholder="Enter Password">
            </div>
            <input type="submit" name="submit" class="forbut" value="Login">
            <br><br>
            </form>
            <!-- Login Form Ends HEre -->
        </div>-->

    </body>
</html>

<?php 

    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM admin_settings WHERE username='$username' AND password='$password'";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. COunt rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //User AVailable and Login Success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            //User not Available and Login FAil
            $_SESSION['login'] = "<div class='eror'>Incorrect username/password combination</div>";
            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'admin/login.php');
        }


    }

?>