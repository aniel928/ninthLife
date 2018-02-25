<?php 
	$title = "Ninth Life - Edit Profile";
	include('header.php');
	include('functions.php');

	session_start();
	$userID = $_SESSION['user_id'];

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    	updateUser($userID, $_POST['name'], $_POST['displayname'], $_POST['phone'], $_POST['address'], $_POST['zip'], $_POST['email']);
    }

    $email = $_SESSION['email'];
    $phone = $_SESSION['phone'];
    $address = $_SESSION['address'];
    $zip = $_SESSION['zip'];
    $fullName = $_SESSION['name'];
    $displayName = $_SESSION['displayName'];
    $type = $_SESSION['type'];
    $rating = $_SESSION['rating'];
    $username = $_SESSION['login_user'];

?>

<div class='row'>

	<div class = 'col-md-6 mx-auto'>
		<h1> Edit Profile </h1>	
		<br><?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<p style='color:green'> Changes updated! </p>";
} ?>
		<form action="edit.php" method="post">
			<div class="form-group">
				<!-- Full Name -->
				<label for="full name">Full Name:</label>
				<input required type="text" class="form-control" id="name" name = "name" placeholder="e.g. John Smith" onblur="fillDisplay()" value='<?php echo $fullName?>'>
			</div>
			<div class="form-group">
				<!-- Display Name -->
				<label for="displayname">Display Name:</label>
				<input type="text" class="form-control" id="displayname" name = "displayname" placeholder="e.g. Johnny S." value='<?php echo $displayName?>'>
			</div>				
			<div class="form-group">
				<!-- Email Address -->
				<label for="phone">Phone Number</label>
				<input required type="tel" class="form-control" id="phone" name = "phone" placeholder="e.g. 555-555-5555" value='<?php echo $phone?>'>
			</div>
			<div class="form-group">
				<!-- Home Address -->
				<label for="address">Full address</label>
				<input required type="text" class="form-control" id="address" name = "address" placeholder="e.g. 123 Main St, Maintown, NJ" value='<?php echo $address?>'>
				<br>
				<!-- Zip Code -->
				<label for="zip">Zip Code</label>
				<input required type="zip" class="form-control" id="zip" name = "zip" placeholder="e.g. 90210" value='<?php echo $zip?>'>
			</div>
			<div class="form-group">
				<!-- Email Address -->
				<label for="email">Email address</label>
				<input required type="email" class="form-control" id="email" name = "email" placeholder="e.g. me@example.com" value='<?php echo $email?>'>
			</div>
			<button required type="submit" class="btn btn-primary">Update</button>
		</form>
		
	</div>
</div>
<?php include("footer.php"); ?>