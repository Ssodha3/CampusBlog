<?php 
// session_start();
?>
<html>
    <head>
    <style>
        .sidebar{
            width: 240px;
            height: 1290px;
            position:absolute;
            z-index: 1;
            left: 0;
            padding-right: 5px;
            background-image: url(Images/adminslidebar.jpg);
            background-position: center;
             background-repeat: no-repeat;
             background-size: cover;
            overflow-x: hidden;
            padding-top: 20px;
            margin-top:10px;
            margin-left:10px;
          }
          i{
            margin-left:5px;
          }
          #dash{
            margin-left:47px;
          }
          #login{
            margin-left:101px;
          }
          #comm{
            margin-left:58px;
          }
          #photo{
            margin-left:20px;
          }
          .sidebar a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 25px;
            color: white;
            display: block;
          }
          
          .sidebar a:hover 
          {
            color:black;
          }
    </style>
    </head>
    <body>
        <nav>
          <!-- show dashboard -->
            <div class="sidebar">
            
                <a  href="index.php">
                  <span >Dashboard</span>
                  <i class="fa fa-home" id="dash"></i>
                </a>
             <!-- if admin then show bloggers list -->
              <?php if(@$_SESSION['email']=="admin@gmail.com"){?>
               
                  <a  href="blog_list.php">
                    <span>Bloggers List</span>
                    <i class="fa fa-picture-o"></i>
                  </a>
                <!-- if student then show blog gallery and about us -->
             <?php }else{ ?>
                <a  href="bloggallery.php">
                  <span>Blog Gallery</span>
                  <i class="fa fa-picture-o"id="photo" ></i>
                </a>
             
                <a href="aboutus.php">
                  <span>About Us</span>
                  <i class="fa fa-commenting" id="comm"></i>
                </a>
              
              <?php 
             }
             ?>
             
             <!-- if session not active show login -->
             <?php
              if(@!$_SESSION['email']){
            ?>
                <a  href="login.php">
                  <span>Login</span>
                  <i class="fa fa-sign-in" id="login"></i>
                </a>
              <!-- if session active show logout -->
          <?php }else {
          ?>
                <a  href="logout.php">
                  <span>Logout</span>
                  <i class="fa fa-sign-out" id="comm"></i>
                </a>
              
          <?php   } ?>
           
            </div>
            </nav>
    </body>
</html>