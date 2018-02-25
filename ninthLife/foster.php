
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

updateFostered($petId, $pet['petOwner'], $userID);
flagHelped($petId, 0);


?>
<!-- Page Content -->
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 mx-auto my-3 py-4 bg-white border border-dark text-center">
      <h3> Thank you for being <?php echo $pet['name']?>'s Angel!</h3><br>
        
          <p> Here is the information you need </p>
          <p> Owner's name: <?php echo $pet['fullName']?> </p>
          <p> Owner's phone number: <?php echo $pet['phone']?> </p>
          <p> Owner's email: <?php echo $pet['email']?> </p>
      <br><h3> Please reach out to the owner to arrange foster pickup!</h3>
      <a href="dashboard.php" class='btn btn-secondary'>Back to Dashboard</a>
    </div>
  </div>
</div>