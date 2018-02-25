
<?php
session_start();
$userID = $_SESSION['user_id'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];
$address = $_SESSION['address'];
$zip = $_SESSION['zip'];
$fullName = $_SESSION['name'];
$displayName = $_SESSION['displayName'];
$type = $_SESSION['type'];
$rating = $_SESSION['rating'];
$username = $_SESSION['login_user'];
$title = "Ninth Life - Dashboard" ;
include('header.php');
include('functions.php');

$petId = $_GET['id'];
$pet = getPetInfo($petId);
?>
    <!-- Page Content -->
    <div class="container-fluid">

      <div class="row">

        <div class="col-lg-3 mx-auto">
          <div class="list-group">
            <a href="foster.php?id=<?php echo $petId?>" class="list-group-item active btn btn-success">Foster Me!</a>
          </div>
        </div>
        <!-- /.col-lg-3 -->
      </div>
      <div class="row">
        <div class="col-lg-12 mx-auto">

          <div class="card text-center my-5 pt-4 px-5">
            <h3 class="card-title"><?php echo $pet['name']?> </h3>
            <img class="card-img-top img-fluid" style="width:400px; margin: 0 auto;" src="<?php echo $pet["pictureLink"]?>" alt="">
            <hr class = "mt-4">
            <div class="card-body py-2" >
              
              <h4>About Me!</h4>
              <p class="card-text mb-4"><?php echo $pet['information']?></p>
              
            </div>
          </div>
          <!-- /.card -->

          <div class="card card-outline-secondary my-4">
            <div class="card-header">
              My Location
            </div>
            <div class="card-body">
    <div id="map" style="height:400px; width: 100%;z"></div>




<?php
$googleKey = 'AIzaSyBF_zj9oKHeU-S_-sWMWLLYZEsqk8ocvuU';
$zip = $pet['zipCode'];
$street = $pet['streetAddress'];
$search = implode(', ', [$street, $zip]);

$geoData = google_maps_search($search, $googleKey);

if (!$geoData) {
    echo "Error: " . $id . "\n";
    exit;
}

$mapData = map_google_search_result($geoData);

$lat = $mapData['lat'];
$lng = $mapData['lng'];
?>























    <script>
      function initMap() {
        var uluru = {lat: <?php echo $lat; ?>, lng: <?php echo $lng; ?>};
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