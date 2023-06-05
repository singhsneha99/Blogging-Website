<?php
include 'header.php';

?>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/contact.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <h1 style="font-size:48px;">HERE FOR YOU!</h1>
              <span class="subheading"><i>"We've always got your back, always here for you."</i></span>
            </div>
          </div>
        </div>
      </div>
    </header>
 
   <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <div class="row" >
		  <style>
       #map {
        height: 400px;
    
       }
    </style>
			<div class="col-md-12">
			 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
                      <h3 class="w3-center">Our Location</h3>
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: 19.082884, lng: 73.028869};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDq3GV0SuBO9VRPAMv-fqGj5zAC5yaHlnA&callback=initMap">
    </script>

            </div>
				<div class="col-md-6"></div>
			</div>
        </div>
      </div>
    </div>

    

<?php include 'footer.php';  ?>