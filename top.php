<?php
include 'header.php';
?>


<!-- Page Header -->
<header class="masthead" style="background-image: url('img/top.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1 style="font-size:46px;">SERVING THE BEST ALWAYS!</h1>
                    <span class="subheading"><i>"A writer is by nature a dreamer: <b style="font-family:monotype corsiva;">A conscious dreamer"</b></i></span>
                </div>
            </div>
        </div>
    </div>
</header>



<!-- Main Content -->
<div class="container">
    <div class="row" style="margin-left:100px;"> 
        <input type="button" id="All" value="All" class="cat btn btn-info" style="background-image: url('img/al.jpg'); height: 200px; width: 200px;">
        <input type="button" id="Travel" value="Travel" class="cat btn btn-info" style="background-image: url('img/tr.jpg'); height: 200px; width: 200px;">
        <input type="button" id="Fashion" value="Fashion" class="cat btn btn-info" style="background-image: url('img/fa.jpg'); height: 200px; width: 200px;">
        <input type="button" id="Food" value="Food" class="cat btn btn-info" style="background-image: url('img/f.jpg'); height: 200px; width: 200px;">
        <input type="button" id="Education" value="Education" class="cat btn btn-info" style="background-image: url('img/ed.jpg'); height: 200px; width: 200px;">
        

    </div>
    <br>
    <div class="row" style="background-image: url(img/white.jpg)">
        <br>
        <br>
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php
         $sql1 = "SELECT b.*,n.user_name, COUNT(l.blogcount) as bcount  FROM blog b 
                JOIN like_dislike l ON l.blog_id = b.id
                JOIN login n ON n.id = b.user_id
                WHERE l.blogcount = 'like'
                GROUP  BY l.blog_id
                ORDER By bcount DESC
                limit 5";
          
            
            $result = mysqli_query($link, $sql1);             
           $count = 1;
            while ($res = mysqli_fetch_array($result)) {
                ?>
                <div class="post-preview">
                    <?php if (isset($_SESSION['all'])) { ?>
                        <a href="blog.php?id=<?= $res['id']; ?>">
                        <?php } else { ?>
                            <a href=""  onclick="sessionout();">
                            <?php } ?>

                            <h4 class="" style="font:2px !important;">
                                <?php echo $res['title']; ?>
                            </h4>
                            <h3 class="post-subtitle">
                                <?php
                                $in = $res['description'];
                                echo $out = strlen($in) > 50 ? substr($in, 0, 50) . "<span style='color:blue; font: italic bold 12px/30px Georgia, serif;'>.... Read More</span>" : $in;
                                ?>
                            </h3>
                        </a>
                        <p class="post-meta">Posted by
                            <a href=""> <?php echo $res['user_name']; ?></a>
                            on  <?php echo date('F d Y', strtotime($res['bdate'])); ?></p>
                </div>
                <hr>
            <?php } ?>
            <!-- Pager -->
          
        </div>
    </div>
</div>






<?php include 'footer.php'; ?>
    
  