    <!-- This is about us page available in sidebar it include header and footer file along with it  -->
    <html>
    <head>
    <style>
        /* css is included in this file */
        .aboutus{
           color:hotpink;
           font-size: 35px; 
           margin-top: 10px; 
           margin-left: 5px;
           position: center;
           
        }
        .misscm{
           color:hotpink;
           font-size: 35px;
           margin-left: 5px;
        }
        #ainfo{
            color:black;
            background-color:white;
            opacity:0.7;
            text-align: justify;
            text-justify: auto;
            font-size: 30px; 
            margin-left: 30px;
            height:150px;
            width:1120px;
           
        }
        .imgb{
            margin-left: 250px;
            height: 1300px;
        }
        .img{
            align:center;
            position: relative;
            margin-left:100px;
            

        }
        
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <!-- add header and sidebar -->
    <?php include 'HDHtml/header.html' ?>
    <?php include 'sidebar.php' ?> 
    <br>
    <!-- content of about us file -->
    <div class="imgb">

    <!-- message/data of about us -->
    <div  class="aboutus" align=center>About us</div>
    <p id="ainfo" align=center>Designed by Shyama Sodha
    <br>I am a student at Conestoga Collage and this is something releated to my web assignment. 
    I hope you liked my project.</p>
    <div class="misscm" align=center>Mission</div>
    <p id="ainfo" align=center>To share blogs made by students. <br>
        Using this website a student can share their views between other students.
        So don't miss a chance to tell your friends about this amazing website.
        If you have any query and want any other functionality reach out at my mail.
    </p>
    </div> 
    <!-- add footer -->
    <?php include 'HDHtml/footer.html' ?> 
    </body>
</html>