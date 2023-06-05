<?php
include 'header.php';
?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('img/post.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">

                    <span class="subheading" style="font: italic bold 30px Georgia, serif;">“ I made a decision to write for my readers, not to try to find more readers for my writing.”</span>

                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container" style="background-image: url(img/white.jpg);">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          
            <div class="container">
                <h2>Add Your Blog</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="sel">Select Category:</label>
                        <select class="form-control" id="sel"  name="cat_id">
                            <option value=""> SELECT</option>
                            <option value="Travel">Travel</option>
                            <option value="Fashion">Fashion</option>
                            <option value="Food">Food</option>
                            <option value="Education">Education</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="tit">Title:</label>
                        <input type="text" class="form-control" id="tit" placeholder="Enter Title" name="title">
                    </div>

                    <div class="form-group">
                        <label for="img">Image:</label>
                        <input type="file" class="form-control" id="img" placeholder="Enter Email" name="bimg">
                    </div>


                    <div class="form-group">
                        <label for="des">Description:</label>
                        <textarea class="form-control" id="des" placeholder="Enter Description" name="description" rows="8"></textarea>
                    </div>
                    <br>


                    <button type="submit" name="submit" class="btn btn-default" style="background:gray">Submit</button>
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>



<?php include 'footer.php'; ?>
<?php
if (isset($_POST['submit'])) {


    $title = $_POST['title'];
     $cat_id = $_POST['cat_id'];
    $description = $_POST['description'];
    $user_id = $_SESSION['all']['id'];
    $bdate = date("d-m-Y");

    $target_dir = "Uploads/";
    $target_adhar_img = $target_dir . basename($_FILES["bimg"]["name"]);
    $FileType = pathinfo($target_adhar_img, PATHINFO_EXTENSION);
    $rand = md5(uniqid() . rand());
    $post_image = $rand . "." . $FileType;
    $target_adhar_img = $target_dir . $post_image;
    if (move_uploaded_file($_FILES["bimg"]["tmp_name"], $target_adhar_img)) {
        $target_adhar_img = $target_adhar_img;
    } else {
        $target_adhar_img = "";
    }

    echo $query = "INSERT INTO `blog`
			( `title`, 
			`description`, 
                        `cat_id`, 
                         `user_id`, 
			`bdate`, 
			`bimg`) VALUES 
				('$title',
				'$description',
                                    '$cat_id',
                                 '$user_id',
				'$bdate',
        '$target_adhar_img')";

    if ($link->query($query) === TRUE) {
        ?>
        <script type="text/javascript">
            alert('Blog Added Successfully');
            window.location.href = "add_blog.php";
        </script>
        <?php } else {
        ?>

        <script type="text/javascript">
            alert('Error!');
        </script>
    <?php
       
    }
}
$link->close();
?>
