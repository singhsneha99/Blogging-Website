<?php
include 'header.php';

?>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/new.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <h1>Welcome Aboard!</h1>
              <span class="subheading">“Blogging is a conversation, not a code.”</span>
            </div>
          </div>
        </div>
      </div>
    </header>
 
   <!-- Main Content -->
    <div class="container" style="background-image: url(img/white.jpg)">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="container">
                <br>
                <br>
  <h2>SIGNUP HERE</h2>
  <form action="" method="post">
  <div class="form-group">
      <label for="pwd">User Name:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter User Name" name="user_name" required>
    </div><div class="form-group">
      <label for="pwd">Mobile:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter Mobile" name="mobile" required>
    </div><div class="form-group">
      <label for="pwd">Email:</label>
      <input type="email" class="form-control" id="pwd" placeholder="Enter Email" name="email" required>
    </div><div class="form-group">
      <label for="pwd">Address:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter Address" name="address">
    </div>
    <div class="form-group">
      <label for="email">Gender:</label>
      <select name="gender" class="form-control">
        <option disabled="disabled" selected="selected">Choose option</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Trigender">Other</option>
</select>
     
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
    </div>
    
    <button type="submit" name="submit" class="btn btn-default" style="background:gray ;">Submit</button>
      <br>
      <br>
  </form>
</div>
        </div>
      </div>
    </div>

    

<?php include 'footer.php';  ?>
<?php 
if(isset($_POST['submit'])){
                                                      
               
    $user_name = $_POST['user_name'];
    $mobile = $_POST['mobile'];   
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];


   echo  $query="INSERT INTO `login`
			( `user_name`, 
			`mobile`, 
			`address`, 
			`gender`, 
			`email`, 
			`password`) VALUES 
				('$user_name',
				'$mobile',
				'$address',
        '$gender',
				'$email',
				'$password')";

        if ($link->query($query) === TRUE) {?>
            <script type="text/javascript">
                alert('Signup successfully..Please Login Here!');
                window.location.href = "login/login.php";
            </script>
           <?php  
        } else {?>
            
            <script type="text/javascript">
                alert('Error!');
            </script>
      <?php /*echo $link->error; */ }

                                                             
}
$link->close();
?>
