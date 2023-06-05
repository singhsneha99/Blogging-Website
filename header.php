<?php session_start();
if(!isset($_SESSION['all'])){
    echo'<script type="text/javascript">
    window.location="login.php",</script>';
}
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog!t</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
      <!-- <img src="img/alogo.jpg" style="height:20px;width:30px;"> -->
        <a class="navbar-brand" href="index.php">Blog!t</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="index.php?cat=&lim=0" class="nav-link" >Home</a>
            </li>
            
             <li class="nav-item">
              <a href="top.php" class="nav-link" >Top Blogs</a>
            </li>
           
            <li class="nav-item">
              <a href="about.php"  class="nav-link" >About</a>
            </li>
           
            <li class="nav-item">
              <a href="contact.php" class="nav-link" >Contact</a>
            </li>
            
		<?php if(isset($_SESSION['all'])) { ?>
            
             <li class="nav-item">
              <a href="add_blog.php" class="nav-link" >Add Post</a>
            </li>
            
             <li class="nav-item">
              <a href="view_user_blog.php?cat=&lim=0" class="nav-link" >My Post</a>
            </li>
            
            <li class="nav-item">
              <a href="logout.php" class="nav-link" >Logout</a>
            </li>   
            
             <li class="nav-item">
              <a href="view_user_blog.php?cat=&lim=0" class="nav-link" ><?= $_SESSION['all']['user_name'];?></a>
            </li> 
          
		<?php }else{ ?>
            
            <li class="nav-item">
              <a href="login/login.php" class="nav-link" >Login</a>
            </li>
	
            <li class="nav-item">
              <a href="signup.php" class="nav-link" >Sign Up</a>
            </li>
            
		<?php } ?>
            
          </ul>
        </div>
      </div>
    </nav>
    
