<?php
session_start();
include 'connection.php';
            $user_id = $_SESSION['all']['id'];
            $countlike = $_POST['countlike'];
            $blog_id = $_POST['blog_id'];
            
 $query = "DELETE FROM like_dislike WHERE blog_id='$blog_id' AND user_id='$user_id'";
 mysqli_multi_query($link, $query);
 
 $query = "insert into like_dislike (blog_id,user_id,blogcount)values('$blog_id','$user_id','$countlike')";
    if (mysqli_multi_query($link, $query)) {
		
        echo "Records added successfully.";        
    } else {
       echo "Records not added successfully.";
    }
    
?>


