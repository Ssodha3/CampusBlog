<!--contains blogger upload section, delete section and all viewers blogs  -->
<?php 
session_start();
include("connection/cn.php");
@$id=$_SESSION['id'];
//on submit blogs are store in blogs table
if(isset($_POST['submit']))  
{
    $count=count($_FILES['photo']['name']);
    $description = $_POST['description'];
    for($i=0;$i<$count;$i++)
    {
        $imagename=$_FILES['photo']['name'][$i];
        $ins=mysqli_query($con,"insert into blogs (`uid`,`name`,`description`) values ('$id','$imagename', '$description')");

        move_uploaded_file($_FILES['photo']['tmp_name'][$i],'Blogs/'.$imagename);
    }
}

//delete blogs
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $del=mysqli_query($con,"delete from blogs where id=$id");
    header('location: bloggallery.php');
}
?>
<html>
    <head>
    <head>
    <title>Bloggallery</title> <!--content can be seen by all viewers -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="istyle.css">
    <style>
    div.gallery 
    {
        color:black;
        margin: 5px;
        border: 1px solid #ccc;
        float: left;
        width: 230px;
        height:300;
        font-family:cursive;
        margin-top:20px;
    }

    div.gallery:hover {
        border: 1px solid red;
    }

    div.gallery img {
        width: 100%;
        height: 300px;
    }

    div.desc {
        padding: 20px;
        text-align: center;

    }
</style>
</head>
    <body style="color:black;">
    <!-- include header and sidebar -->
    <?php include 'HDHtml/header.html' ?>
    <?php include 'sidebar.php' ?>
    
    <div class="photo" >
        <?php if(@!$_SESSION['email'])
        {?>
        <?php
        $s=mysqli_query($con,"select * from student where status=1");
        while($fet123=mysqli_fetch_array($s))
        {
            $ids=$fet123['id'];?>
            <?php
            $select=mysqli_query($con,"select * from blogs where uid=$ids order by id desc");
            while($rw=mysqli_fetch_array($select))
            {
            ?>
            <div class="gallery">
                <a target="_blank" href="Blogs/<?php echo $rw['name']; ?>">
                <img src="Blogs/<?php echo $rw['name']; ?>">
                </a>
                <div class="desc">
                    Name : <?php echo $fet123['name'];?>
                    <br> Email : <?php echo $fet123['email'];?>
                    <br> Description : <?php echo $rw['description'];?>
                </div>
            </div>
        <?php }}?>
        <?php }
        
        else {?>
        <!--upload new blog -->
        <p id="hellop" align=center>Blog Upload</p>
        <form  method="post" enctype="multipart/form-data">
            <table border="2" style="color:black; " align=center width="95%" border="2" cellspacing="50%"  style="border-spacing: 15px;">
            <tr>
                <th>Upload Images</th>
                <th><input type="file" multiple name="photo[]"></th>
            </tr>
            
            <tr>
                <th>Upload Caption</th>
                <th><input type="text" name="description" ></th>
            </tr>
            
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="Submit">
                </td>
            </tr>
            </table>
        </form>
        <br>
        <br>
        
        <!--show details of posted blog and delete option-->
        <table border="2" style="color:black;" align="center" width="95%" > 
        <tr>
            <th>#</th>
            <th>Images</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        <?php
        $sel1=mysqli_query($con,"select * from blogs where uid=$id");
        $i=1;
        while($row=mysqli_fetch_array($sel1)) {?>
        <tr>
            <th><?php echo $i; ?></th>
            <th><img src="Blogs/<?php  echo $row['name']; ?>" width="100px" height="100px" ></th>
            <th><?php echo $row['description']; ?></th>
            <th><a href="bloggallery.php?id=<?php echo $row['id']; ?>">Delete</a></th>
        </tr>
        <?php
         $i++; 
        } ?>
        
    </table>
    <?php } ?>
</div>

<!-- include footer -->
<?php include 'HDHtml/footer.html' ?> 

</body>
</html>