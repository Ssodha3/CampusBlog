<!-- User login Page -->
<?php 
session_start();
    include("connection/cn.php");
    if(isset($_POST['signin'])){
            $uname=$_POST['uname'];
            $password=$_POST['password'];

            // check if empty then error message
            if($uname=="" || $password=="")
            { ?>
            <script>
                alert("All Fields are Required");
            </script>
               
            <?php
            // if field not empty then
            }else {
                // check if admin login
                if($uname=="admin@gmail.com")
                {
                    // verify admin and start session
                    $sel=mysqli_query($con,"select * from admin where email='$uname' and password='$password'");
                    $fet=mysqli_fetch_array($sel);
                    $id=$fet['id'];
                    if($fet['email']==$uname)
                    {
                        $_SESSION['email']=$uname;
                        header('location: index.php');
                    }else
                    {
                        echo "Invalid user name and Password";
                    }
                }else
                {
                    //if not admin then verify student and start session
                    $sel=mysqli_query($con,"select * from student where email='$uname' and password='$password' and status=1");
                    $fet=mysqli_fetch_array($sel);
                    $id=$fet['id'];
                    if($fet['email']==$uname)
                    {
                        $_SESSION['email']=$uname;
                        $_SESSION['id']=$fet['id'];
                        header('location: index.php');
                    }
                    else
                    {
                        echo "Invalid user name and Password or not activated Account";
                    }
                }
            }
    }
?>

<html>
    <head>
    <link rel="stylesheet" href="Css/loginform.css">
    <title>Conestoga Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <!-- include header -->
    <?php include 'HDHtml/header.html' ?>

    <!-- login form -->
    <form method="post">
    <div class="box">
    <h1>Login</h1>
    <label>Enter email & Password</label>
    <input type="text" name="uname"  class="email" />
    
    <input type="password" name="password"  class="password" />
    
    <input type="submit" name="signin" value="Sign In" class="btn" >

    <input type="reset" id="btn2">
    <!-- link to regristration page -->
    <a href="registration.php">Registration for creating blogs</a>
    </div> 
    
    </form> 
    <br>
    <br>
    <br>
    <br>
    <br>
    <!-- include footer --> 
    <?php include 'HDHtml/footer.html' ?> 

    </body>
</html>