<!-- blogger list file only show upon admin login  -->
<?php 
session_start();
include("connection/cn.php");

// update student table status 
if(@$_GET['status'])
{
    $status=$_GET['status'];
    $id=$_GET['id'];

    //change status (0= both(new student), 1=active allow for blogging and 2=Decline)
    $update=mysqli_query($con,"update student set status='$status' where id=$id"); 
    header('location: blog_list.php');

}
?>
<!DOCTYPE html>
<html lang=en>
<head>
    <title>Conestoga Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="istyle.css">
  </head>
<body style="color:white">
    <?php include 'HDHtml/header.html' ?>
    <?php include 'sidebar.php' ?>
    <div class="ddata">
    <br>
    <p id="hello" align=center>Blog Data</p>
    <!-- Table show list of students  -->
    <table class="table" align=center width="95%" border="2" cellspacing="50%"  style="border-spacing: 15px;">
        <tr>
            <th>Id </th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone No</th>
            <!--<th>Password</th>-->
            <th>Student Id</th>
            <th>Status</th>
        </tr>
        <?php 
            $sel=mysqli_query($con,"select * from student");
            $i=1;
            while($row=mysqli_fetch_array($sel)){
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone_no']; ?></td>
                <!--<td><?php echo $row['password']; ?></td>-->
                <td><a target="_blank" href="Studentid/<?php echo $row['studentid']; ?>" ><?php echo $row['studentid'] ?></a></td>
                <!--<td><a href="_blank" src="upload/<?php  echo $row['studentid'];?>"<?php echo $row['studentid'] ?> width="100px" height="100px" ></a></td>-->
                <td>
                <!-- show status option according to value  -->
                    <?php if($row['status']==0){ ?>
                            <a href="blog_list.php?status=1&id=<?php echo $row['id']; ?>">Active</a>
                            <a href="blog_list.php?status=2&id=<?php echo $row['id']; ?>">Decline</a>
                    <?php }?>
                    <?php if($row['status']==1){ ?>
                        <a href="blog_list.php?status=2&id=<?php echo $row['id']; ?>">Decline</a>
                    <?php }?>
                    <?php if($row['status']==2){ ?>
                        <a href="blog_list.php?status=1&id=<?php echo $row['id']; ?>">Active</a>
                    <?php }?>
                </td>
            </tr>
        <?php 
         $i++;
         } ?>
    </table>
    
</div> 

  <?php include 'HDHtml/footer.html' ?>
</body>
</html> 