<!-- Home page with images, animations and some text  -->
<?php session_start(); ?>
<!DOCTYPE html>
<html lang=en>
<head>
    <title>Index Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="istyle.css">
  </head>
<body >
    <!-- include header and sidebar  -->
    <?php include 'HDHtml/header.html' ?>
    <?php include 'sidebar.php' ?>

    <!-- images and content of dashboard -->
    <div class="aside">
    <br>
    <p id="hello" align=center>A class above the rest - The Bloggers</p>

    <table align=center>
    <tr>
    <td rowspan="2" class="image1" ></td>
    <td><img  class="image2" src="Images/campus1.jpg"> </td>
    </tr>
    <tr>
    <td><img  class="image2" src="Images/campus2.jpg"></td>
    </tr>
    </table>

    <ul id="info" align=center>
    <li>
    <strong>Welcome to the Conestoga College blog</strong>, your hub for stories, perspectives, and updates from our vibrant campus community! 
    </li><li> Here, you'll discover a treasure trove of articles, written by studentsoffering firsthand accounts of life at Conestoga.
    </li><li> Save time , money and is really headache
    to visit the place and compare all. So here you gets best option to pick among all designers.</li>
    </ul>

    <div id="polaroid">
    <table align=center>
    <tr>
    <td><img  class="image2" src="Images/campus1.jpg"></td>
    <td><img  class="image2" src="Images/campus2.jpg"></td>
    <td><img  class="image2" src="Images/campus3.jpg"></td>
    </table>
    <br>
    <table align=center>
    <tr>
    <td><img  class="image2" src="Images/campus3.jpg"><br></td><br>
    <td><img  class="image2" src="Images/campus2.jpg"></td><br>
    <td><img  class="image2" src="Images/campus1.jpg"></td>
    </table>
    </div>

    </div>
  <!-- include footer -->
  <?php include 'HDHtml/footer.html' ?>
</body>
</html> 