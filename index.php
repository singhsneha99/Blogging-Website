<?php
include 'header.php';
?>


<!-- Page Header -->
<header class="masthead" style="background-image: url('img/home.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1 style="font-size:46px">BLOG!T - WRITER'S HOMESPACE</h1>
                    <span class="subheading"><i>"Be fearless in the pursuit of what sets your soul on fire."</i></span>
                </div>
            </div>
        </div>
    </div>
</header>


<!-- Main Content -->
<div class="container">
    <div class="row" style="margin-left:50px;"> 
        <input type="button" id="All" value="All" class="cat btn btn-info" style="background-image: url('img/al.jpg'); height: 200px; width: 200px;">
        <input type="button" id="Travel" value="Travel" class="cat btn btn-info" style="background-image: url('img/tr.jpg'); height: 200px; width: 200px;">
        <input type="button" id="Fashion" value="Fashion" class="cat btn btn-info" style="background-image: url('img/fa.jpg'); height: 200px; width: 200px;">
        <input type="button" id="Food" value="Food" class="cat btn btn-info" style="background-image: url('img/f.jpg'); height: 200px; width: 200px;">
        <input type="button" id="Education" value="Education" class="cat btn btn-info" style="background-image: url('img/ed.jpg'); height: 200px; width: 200px;">
            </div>
    <br>
    <div class="arti" style="background-image: url(img/white.jpg)">
        <br>
        <br>
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php
           
           
            if (isset($_GET['lim']) != 0 && !empty($_GET['lim'])){
              $lim = $_GET['lim'];  
            }
            else{
               $lim=0;  
            }
            if (isset($_GET['cat']) != '' && !empty($_GET['cat'])){
              $cat = $_GET['cat'];  
            }
            else{
               $cat='';  
            }
                    
            
            if (isset($_GET['cat']) != '' && !empty($_GET['cat'])) {
                $cat = $_GET['cat'];
                $sqlcount = "SELECT b.*,l.user_name FROM blog b join login l ON l.id = b.user_id
                   where b.status != 0 AND  cat_id = '$cat' ORDER BY id DESC";
                
                 $sql1 = "SELECT b.*,l.user_name FROM blog b join login l ON l.id = b.user_id
                   where b.status != 0 AND  cat_id = '$cat' ORDER BY id DESC  limit $lim,10";
            } else {
                   $sqlcount = "SELECT b.*,l.user_name FROM blog b join login l ON l.id = b.user_id where b.status != 0   ORDER BY id DESC";
                 $sql1 = "SELECT b.*,l.user_name FROM blog b join login l ON l.id = b.user_id where b.status != 0 ORDER BY id DESC limit $lim,10";
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
            $limsub=0;
            $limadd=0;
            if (isset($_GET['lim']) != 0 && !empty($_GET['lim'])){
              $lim = $_GET['lim'];
              $limsub = $_GET['lim'] - 10;
              $limadd = $_GET['lim'] + 10;
            }
            else{
               $lim=0;  
            }
            if (isset($_GET['cat']) != '' && !empty($_GET['cat'])){
              $cat = $_GET['cat'];  
            }
            else{
               $cat='';  
            }
                               
                
        ?>
            <div class="row">
             <?php  if($lim >= 10 ){ ?>                   
            
                    <div clas="col-md-2">
                <a href="<?= 'index.php?cat='.$cat.'&lim='.$limsub;?>"   class="btn btn-success float-left" >Previous Posts</a>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                   </div>
            
               
            <?php  }   ?>
          <?php  if($limadd < $limcount){  ?>
            
                    <div clas="col-md-2">
                        <a href="<?= 'index.php?cat='.$cat.'&lim='.$limadd;?>"  style="" class="btn btn-success float-right" >View More Posts</a>
                     </div>
            <br>
            <br>
                <br>
            
            <?php  }   ?>
            
           </div>
        </div>
    </div>
</div>

    </div>




<?php include 'footer.php'; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

                                function sessionout() {

                                    window.alert('Please Login');

                                }

                                $(document).ready(function () {

                                    
                                      $("#All").on("click", function () {
                                           var All = $('#All').val();                                      
                                            window.location = "index.php?lim=0&cat=";
                                        
                                    });
                                    
                                        $("#Travel").on("click", function () {
                                           var Travel = $('#Travel').val();                                      
                                            window.location = "index.php?lim=0&cat=" + Travel;
                                        
                                    });
                                    
                                    
                                        $("#Fashion").on("click", function () {
                                           var Fashion = $('#Fashion').val();                                      
                                            window.location = "index.php?lim=0&cat=" + Fashion;
                                        
                                    });
                                    
                                    
                                        $("#Food").on("click", function () {
                                           var Food = $('#Food').val();                                      
                                            window.location = "index.php?lim=0&=cat=" + Food;
                                        
                                    });
                                    
                                    
                                        $("#Food").on("click", function () {
                                           var Food = $('#Food').val();                                      
                                            window.location = "index.php?lim=0&cat=" + Food;
                                        
                                    });
                                    
                                    
                                        $("#Education").on("click", function () {
                                           var Education = $('#Education').val();                                      
                                            window.location = "index.php?lim=0&cat=" + Education;
                                        
                                    });
                                    
                                    
                                    
                                   

                                });
</script>