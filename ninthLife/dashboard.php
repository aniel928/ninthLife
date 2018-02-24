<?php 
$title = "Ninth Life - Dashboard";
 
//Pull in session variables
$name = "Anne";
$email = '';
$password = '';
include("header.php"); 

if(isset($_POST['email'])){
	$email = $_POST['email'];
}

if(isset($_POST['password'])){
	$password = $_POST['password'];
}

?>

<h1> <?php echo $name?>'s Dashboard </h1> 

<div class='container-fluid mx-auto my-5 border border-secondary bg-white'>
	<table class='table text-center'>
		<tr>
			<td><a class='text-info' href=#> Add a Pet </a></td>
			<td><a class='text-info' href=#> Edit User Information </a></td>
		</tr>	
		<tr>
			<td><a class='text-info' href=#> Request Help </a></td>
			<td><a class='text-info' href=#> Deactivate Account </a></td>
		</tr>
		<tr>	
			<td><a class='text-info' href=#> Switch to Helper Account </a></td>
			<td></td>
		</tr>
	</table>
		</div>
		<div class = 'col-md-4 mx-5 my-5 px-3 py-3'>
			
			
		</div>
	</div>
</div>
	
	
	
	
<?php include("footer.php"); ?>