<?php
include 'header.php';
?>


<!-- Page Header -->
<header class="masthead" style="background-image: url('img/my.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1 style="font-size:50px">MY CREATIONS</h1>
                    <span class="subheading"><I>"Life is lived when you breathe through your words."</I></span>
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
    <div class=row style="background-image: url(img/white.jpg)">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php
          
            $user_id = $_SESSION['all']['id'];
            $lim = $_GET['lim'];
            if (isset($_GET['cat']) != '' && !empty($_GET['cat'])) {
                $cat = $_GET['cat'];
                $sqlcount = "SELECT b.*,l.user_name FROM blog b join login l ON l.id = b.user_id
                   where b.status != 0 AND user_id = '$user_id' AND  cat_id = '$cat' ORDER BY id DESC";
                
                 $sql1 = "SELECT b.*,l.user_name FROM blog b join login l ON l.id = b.user_id
                   where b.status != 0 AND user_id = '$user_id' AND   cat_id = '$cat' ORDER BY id DESC  limit $lim,10";
            } else {
                   $sqlcount = "SELECT b.*,l.user_name FROM blog b join login l ON l.id = b.user_id  where b.status != 0 AND  user_id = '$user_id' ORDER BY id DESC";
                 $sql1 = "SELECT b.*,l.user_name FROM blog b join login l ON l.id = b.user_id  where b.status != 0 AND user_id = '$user_id' ORDER BY id DESC limit $lim,10";
            }
            
            $result = mysqli_query($link, $sql1);
             $resultcount = mysqli_query($link, $sqlcount);
            $limcount = mysqli_num_rows($resultcount);
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
            <?php  
            $lim = $_GET['lim'];
            $cat = $_GET['cat'];
             $limsub = $_GET['lim'] - 10;
            $limadd = $_GET['lim'] + 10;?>
            <div class="row">
             <?php  if($lim >= 10 ){ ?>                   
            
                    <div clas="col-md-2">
                <a href="<?= 'view_user_blog.php?cat='.$cat.'&lim='.$limsub;?>"   class="btn btn-success float-left" >Previous Posts</a>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                   </div>
            
               
            <?php  }   ?>
          <?php  if($limadd < $limcount){  ?>
            
                    <div clas="col-md-2">
                        <a href="<?= 'view_user_blog.php?cat='.$cat.'&lim='.$limadd;?>"  style="" class="btn btn-success float-right" >Next Posts</a>
                     </div>
            
            
            <?php  }   ?>
            
           </div>
        </div>
    </div>
</div>






<?php include 'footer.php'; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

                                function sessionout() {

                                    //  $(location).attr('href', 'http://localhost/blog/login/login.php')
                                    //   window.location.href = 'about.php';
                                    window.alert('Please Login');

                                }

                                $(document).ready(function () {



//                                    $("#cat").on("change", function () {
//                                        var selVal = $(this).val();
//                                        if (selVal == 'All') {
//                                            window.location = "view_user_blog.php?cat=";
//                                        } else {
//                                            window.location = "view_user_blog.php?cat=" + selVal;
//                                        }
//                                    });
                                    
                                      $("#All").on("click", function () {
                                           var All = $('#All').val();                                      
                                            window.location = "view_user_blog.php?lim=0&cat=";
                                        
                                    });
                                    
                                        $("#Travel").on("click", function () {
                                           var Travel = $('#Travel').val();                                      
                                            window.location = "view_user_blog.php?lim=0&cat=" + Travel;
                                        
                                    });
                                    
                                    
                                        $("#Fashion").on("click", function () {
                                           var Fashion = $('#Fashion').val();                                      
                                            window.location = "view_user_blog.php?lim=0&cat=" + Fashion;
                                        
                                    });
                                    
                                    
                                        $("#Food").on("click", function () {
                                           var Food = $('#Food').val();                                      
                                            window.location = "view_user_blog.php?lim=0&=cat=" + Food;
                                        
                                    });
                                    
                                    
                                        $("#Food").on("click", function () {
                                           var Food = $('#Food').val();                                      
                                            window.location = "view_user_blog.php?lim=0&cat=" + Food;
                                        
                                    });
                                    
                                    
                                        $("#Education").on("click", function () {
                                           var Education = $('#Education').val();                                      
                                            window.location = "view_user_blog.php?lim=0&cat=" + Education;
                                        
                                    });
                                    
                                    
                                    
                                   

                                });
</script>