<?php
	include("header.php");
	include("functions.php");
	
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

if($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = $petType = $info = null;
	

	$name = $_POST['name'];
	$petType = $_POST['petType'];
	$info = $_POST['info'];
	
	$target_dir = "img/";
	$target_file = $target_dir . basename($_FILES["picture"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);

	$connection = new mysqli("ninthlife.czilv4k1yhiv.us-east-2.rds.amazonaws.com", "admin", "ninthlife", "ninth_life");
	$connection->query("INSERT INTO Pets (type, name, pictureLink, needsHelp, information, petOwner) VALUES(\"".$petType."\", \"".$name."\", \"".$target_file."\", 0, \"".$info."\", \"".$userID."\");");

	$connection->close();

	header("location:dashboard.php?status=success");
}



else{
?>
<form action="newPet.php" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<!-- Pet Name -->
		<label for="name">Pet Name:</label>
		<input required type="text" class="form-control" id="name" name = "name" placeholder="e.g. Rover" onblur="fillDisplay()">
	</div>
	<div class="form-group">
		<!-- Pet Type -->
		<label for="petType">Pet Type:</label>
		<select required name="petType" id='petType'>
			<option value='Cat'>Cat</option>
			<option value='Dog'>Dog</option>
			<option value='Bird'>Bird</option>
			<option value='Other'>Other</option>
		</select>
	</div>				
	<div class="form-group">
		<label for="picture">Upload a Picture:</label>
		<input required type='file' id='picture' name='picture'/>
	</div>
	<div class="form-group">
		<!-- Home Address -->
		<label for="info">Information</label>
		<textarea rows="4" maxlength="800" class="form-control" id="info" name = "info" placeholder="e.g. Friendly golden retriever, 85 lbs of pure love.  Does not do well with other dogs, but loves cats!"></textarea>
	</div>
	<button required type="submit" class="btn btn-primary">Register</button>
</form>


<?php
}
	include("footer.php");
?>