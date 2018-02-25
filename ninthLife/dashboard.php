<?php 

$title = "Ninth Life - Dashboard";
include('header.php');
include('functions.php');
 $email = $password = "";
if(isset($_POST['email']) && isset($_POST['password'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
}      
else{
	header("location:index.php");
}
login($email, $password);

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

?>

<h1> <?php echo $displayName?>'s Dashboard </h1> 
<?php if($type == "owner"){?>
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
			<td><a class='text-info' href=#> Switch to "Angel" Account </a></td>
			<td>History</td>
		</tr>
	</table>
		</div>
		<div class = 'col-md-4 mx-5 my-5 px-3 py-3'>
			
			
		</div>
	</div>
</div>
<?php }else if($type == "angel"){ ?>
<div class='container-fluid mx-auto my-5 border border-secondary bg-white'>
	<table class='table text-center'>
		<tr>
			<td><a class='text-info' href=#> Search for a pet to foster</a></td>
			<td><a class='text-info' href=#> Edit User Information </a></td>
		</tr>	
		<tr>
			<td></td>
			<td><a class='text-info' href=#> Deactivate Account </a></td>
		</tr>
		<tr>	
			<td><a class='text-info' href=#> Switch to "Owner" Account </a></td>
			<td>History</td>
		</tr>
	</table>
		</div>
		<div class = 'col-md-4 mx-5 my-5 px-3 py-3'>
			
			
		</div>
	</div>
</div>

<?php }else{ ?>
<div class='container-fluid mx-auto my-5 border border-secondary bg-white'>
	<table class='table text-center'>
		<tr>
			<td><a class='text-info' href=#> Edit User Information </a></td>
			<td><a class='text-info' href=#> Reactivate Account </a></td>
		</tr>
		
	</table>
		
</div>	
<?php } ?>
	
	
	
	
<?php include("footer.php"); ?>