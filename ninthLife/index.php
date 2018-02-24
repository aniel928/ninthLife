<?php 
$title = "Ninth Life - Log In";
 
include("header.php"); 

?>

<div class='row'>
	<div class = 'col-md-6'>
		<img style='width: 500px' class="img-responsive" src="img/catdog.jpeg"/>
	</div>
	<div class = 'col-md-6'>
		<h1> Welcome to Ninth Life! </h1>
		<br>
		<h4> Please Log In </h4>
		<br>
		<form action="dashboard.php" method="post">
			<div class="form-group">
				<label for="email">Email address</label>
				<input type="email" class="form-control" id="email" name = "email" aria-describedby="emailHelp" placeholder="Enter email">
				<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			</div>
			<div class="form-group">
				<label for="password`">Password</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="Password">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
		<br>
		<div class = 'h5' > No account yet?  Register <a href='register.html' >here </a>
		
	</div>
</div>
	
	
	
	
<?php include("footer.php"); ?>