<!-- Regisration page for user and to upload their studentid  -->
<?php
    include("connection/cn.php");
    // when submit btn click
    if(isset($_POST['submit']))
    {
            $name=$_POST['name'];
            $email=$_POST['email'];
            $phone_no=$_POST['phone_no'];
            $password=$_POST['password'];
            $studentid=$_FILES['studentidcard']['name'];
            // check if any empty then error message
            if($name =="" || $email == "" || $phone_no == "" || $password == "" )
            {?>
              <script>
              alert("All fields are required");
              </script><?php    
            }
            // if not empty add to database
            else{
            $ins=mysqli_query($con,"insert into student (`name`, `email`, `phone_no`, `studentid`, `password`) values ('$name','$email','$phone_no','$studentid','$password')");
            if($ins)
            {
              // move studentId file to Studentid folder with same file name and extension
                    move_uploaded_file($_FILES['studentidcard']['tmp_name'],'Studentid/'.$studentid);
                    header('location: login.php');
            }
        }

    }
?>
<html>
  <head>
  <title>Conestoga Registeration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Css/loginform.css">
  </head>
    <body>
    <!-- add header -->
    <?php include 'HDHtml/header.html' ?>
    <!-- registration form -->
    <form method="post" enctype="multipart/form-data">
    <div class="box">
    <h1>Registration</h1>

    <input type="text" name="name"  class="email" placeholder="Name" />
    <input type="email" name="email"  class="email" placeholder="Email" />
    <input type="number" name="phone_no"  class="email" placeholder="Phone No" />

    <input type="password" name="password"  class="password"  placeholder="Password"/>
    <br>
    <label> Submit Student Id Card  </label>
    <input type="file" name="studentidcard"  class="email" />
    
    <centre><input type="submit" name="submit" value="Submit" class="btn" ></centre>
  
    </div> 
    
    </form>  
    <br>
    <br>
    <br>
    <!-- add footer -->
    <?php include 'HDHtml/footer.html' ?> 

    </body>

</html>
