<?php
include 'header.php';
$id = $_GET['id'];
$user_id = $_SESSION['all']['id'];
$sql1 = "SELECT b.*,l.user_name FROM blog b join login l ON l.id = b.user_id where b.id = '$id'";
$result = mysqli_query($link, $sql1);
$data = mysqli_fetch_array($result);

?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('img/read.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h2 class="subheading"><?= $data['title']; ?></h2>
                    <span class="meta">Posted by
                        <?php echo $data['user_name']; ?>
                        on <?php echo date('F d Y', strtotime($data['bdate'])); ?></span>
                </div>
            </div>
        </div>
    </div>
</header>
<style>
    .bimg {
        width: 100%;
        height: auto;
    }
    .responsive {
    max-width: 80%;
    height: auto;
        
        
}
    
    .redcolor
    {
        color:red;
    }
    .greencolor
    {
        color:green;
    }
    

</style>  
<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="row">
                    <img src="<?php echo $data['bimg']; ?>" class="bimg responsive"  >
                </div>
                <br>
               
                <p>  <?php echo $data['description']; ?></p>
                 <div class="row" style="margin-left:300px;" id="divid">

                    <?php
                    $sqllike = "SELECT * FROM like_dislike where blog_id = '$id' AND user_id='$user_id'";
                    $resultlike = mysqli_query($link, $sqllike);
                    $datalike = mysqli_fetch_array($resultlike);

                    if ($datalike['blogcount'] === 'like') {
                        ?>
                        <i class="fas fa-thumbs-up bluecolor" id="like"></i>&nbsp;&nbsp;

                    <?php } else { ?>
                        <i class="fas fa-thumbs-up" id="like"></i>&nbsp;&nbsp;
                    <?php } ?>
                    <?php if ($datalike['blogcount'] === 'dislike') { ?>
                        <i class="fas fa-thumbs-down bluecolor" id="dislike"></i>&nbsp;&nbsp;

                    <?php } else { ?>
                        <i class="fas fa-thumbs-down" id="dislike"></i>&nbsp;&nbsp;
                    <?php } ?>


                </div>

            </div>
        </div>
    </div>
</article>



<?php include 'footer.php'; ?>
<script>
    $("#like").on("click", function () {
        var countlike = 'like';
        var blog_id = '<?= $_GET['id'] ?>';

        $.ajax({
            type: "post",
            url: "like_dislike.php",
            data: {countlike: countlike, blog_id: blog_id},
            success: function (data) {
                
                              
                $("#like").addClass("greencolor");
                $("#dislike").removeClass("redcolor");
             
                
            }
        });
    });
    $("#dislike").on("click", function () {
        var countlike = 'dislike';
        var blog_id = '<?= $_GET['id'] ?>';

        $.ajax({
            type: "post",
            url: "like_dislike.php",
            data: {countlike: countlike, blog_id: blog_id},
            success: function (data) {
               
                $("#dislike").addClass("redcolor");
                $("#like").removeClass("greencolor");
              
            }
        });
    });
</script>