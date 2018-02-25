<?php 
$title = "Ninth Life - Register";
include("header.php"); 
include("functions.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = $displayName = $phone = $address = $zip = $email = $password = $type = "";

   	if(isset($_POST['name'])){
   		$name = $_POST['name'];
   		$displayName = $name;
   	}
   	if(isset($_POST['displayname'])){
   		$displayName = $_POST['displayname'];
   	}
   	if(isset($_POST['phone'])){
   		$phone = $_POST['phone'];
   	}
   	if(isset($_POST['address'])){
   		$address = $_POST['address'];
   	}
   	if(isset($_POST['zip'])){
   		$zip = $_POST['zip'];
   	}
   	if(isset($_POST['email'])){
   		$email = $_POST['email'];
   	}
   	if(isset($_POST['password']) && isset($_POST['confirmpassword'])){
   		if($_POST['password'] != $_POST['confirmpassword']){
   			header("location:register.php?status=failed");
   		}
   		$password = $_POST['password'];
   	}
   	if(isset($_POST['type'])){
   		$type = $_POST['type'];
   	}
   	createAccount($name, $displayName, $phone, $address, $zip, $email, $password, $type);

   	echo "awesome";
   	header('Location: dashboard.php');
}
else{
?>

<div class='row'>

	<div class = 'col-md-6 mx-auto'>
		<h1> Register </h1>	
		<br>
		<h4> Please Enter Your Information </h4>
		
		<?php 
			if(isset($_GET['status'])){
				if($_GET['status'] == 'failed'){
					echo "User already exists!  Please pick a unique email";
				}
			}
		?>


		<form action="register.php" method="post">
			<div class="form-group">
				<!-- Full Name -->
				<label for="full name">Full Name:</label>
				<input required type="text" class="form-control" id="name" name = "name" aria-describedby="nameHelp" placeholder="Full name" onblur="fillDisplay()">
				<small id="nameHelp" class="form-text text-muted">Please enter your full name. You can enter a display name below.</small>
			</div>
			<div class="form-group">
				<!-- Display Name -->
				<label for="displayname">Display Name:</label>
				<input type="text" class="form-control" id="displayname" name = "displayname" aria-describedby="displaynamehelp" placeholder="Display name">
				<small id="displaynamehelp" class="form-text text-muted">This is the name that other users will see.</small>
			</div>				
			<div class="form-group">
				<!-- Email Address -->
				<label for="phone">Phone Number</label>
				<input required type="tel" class="form-control" id="phone" name = "phone" aria-describedby="phoneHelp" placeholder="Enter phone">	
				<small id="phoneHelp" class="form-text text-muted">We'll only share your phone number with those who have offered to foster your pet.</small>
			</div>
			<div class="form-group">
				<!-- Home Address -->
				<label for="address">Street address</label>
				<input required type="text" class="form-control" id="address" name = "address" aria-describedby="addressHelp" placeholder="Enter address">
				<br>
				<!-- Zip Code -->
				<label for="zip">Zip Code</label>
				<input required type="zip" class="form-control" id="zip" name = "zip" aria-describedby="zipHelp" placeholder="00000">
				<small id="zipHelp" class="form-text text-muted">We'll never share your home address, this is merely to help with map placement.</small>
			</div>
			<div class="form-group">
				<!-- Email Address -->
				<label for="email">Email address</label>
				<input required type="email" class="form-control" id="email" name = "email" aria-describedby="emailHelp" placeholder="Enter email">
				<small id="emailHelp" class="form-text text-muted">We'll only share your email with those who have offered to foster your pet.</small>
			</div>
			<div class="form-group">
				<!-- Password -->
				<label for="password">Password</label>
				<input required type="password" class="form-control" id="password" name="password" placeholder="Password">
				<br>
				<!-- Password Checker-->
				<label for="confirmpassword">Confirm Password</label>
				<input required type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password">
			</div>
			<div class="form-group">
				<!-- Email Address -->
				<label for="type">Account Type</label>
				<br>

				<label class="radio-inline 	">
					<input required type="radio" id="type" name = "type" aria-describedby="typeHelp" value="angel">
					Angel (I want to help foster pets)
				</label><br>	
				<label class="radio-inline 	">
					<input required type="radio" id="type" name = "type" aria-describedby="typeHelp" value="angel">
					Pet Owner (My pets need help!)
				</label><br>	
				<small id="emailHelp" class="form-text text-muted">You can change this later.</small>
			</div>
			<button required type="submit" class="btn btn-primary">Register</button>
		</form>
		
	</div>
</div>
<script>
	function fillDisplay(){
		document.getElementById("displayname").value = document.getElementById("name").value;
	}

</script>
<?php } ?>
	
	
	
	
<?php include("footer.php"); ?>