
<?php

$title = "Ninth Life - Dashboard" ;
include('header.php');

?>
    <!-- Page Content -->
    <div class="container-fluid">

      <div class="row">

        <div class="col-lg-3 mx-auto">
          <div class="list-group">
            <a href="#" class="list-group-item active btn btn-success">Foster Me!</a>
          </div>
        </div>
        <!-- /.col-lg-3 -->
      </div>
      <div class="row">
        <div class="col-lg-12 mx-auto">

          <div class="card text-center my-5 pt-4 px-5">
            <h3 class="card-title">Pet Name </h3>
            <img class="card-img-top img-fluid" style="width:400px; margin: 0 auto;" src="http://kokefm.com/wp-content/uploads/2013/05/DOG.jpg" alt="">
            <hr class = "mt-4">
            <div class="card-body py-2" >
              
              <h4>About Me!</h4>
              <p class="card-text mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente dicta fugit fugiat hic aliquam itaque facere, soluta. Totam id dolores, sint aperiam sequi pariatur praesentium animi perspiciatis molestias iure, ducimus!</p>
              
            </div>
          </div>
          <!-- /.card -->

          <div class="card card-outline-secondary my-4">
            <div class="card-header">
              My Location
            </div>
            <div class="card-body">
    <div id="map" style="height:400px; width: 100%;z"></div>
    <script>
      function initMap() {
        var uluru = {lat: 40.4918103, lng: -74.44604369999999};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXEOVaQs_24CcJNwrSVDOAV9-5UWOVm9E&callback=initMap">
    </script>
            </div>
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->

      </div>

    </div>