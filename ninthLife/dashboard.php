<?php 

$title = "Ninth Life - Dashboard";
include('header.php');
include('functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	session_start();
	if(!isset($_SESSION['user_id'])){
		header("location:index.php");
	}
	$userID = $_SESSION['user_id'];
	if(isset($_GET['type'])){
		$type = $_GET['type'];
		$_SESSION['type'] = $type;
		$owner = 0;
		$angel = 0;
		if($type == "owner"){
			$owner = 1;
		}else if($type == "angel"){
			$angel = 1;
		}
		$connection = new mysqli("ninthlife.czilv4k1yhiv.us-east-2.rds.amazonaws.com", "admin", "ninthlife", "ninth_life");
		$connection->query("UPDATE Users SET `owner` = ". $owner . ", `angel` = ". $angel ." WHERE userId=\"". $userID ."\";");

		$connection->close();
	}

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$email = $password = "";
	if(isset($_POST['email']) && isset($_POST['password'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
		login($email, $password);
	}      
	else{
		header("location:index.php");
	}


}

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
<?php if($type == "owner"){
	if(isset($_GET['status'])){
		if($_GET['status'] == 'success'){
			echo'<p class="mt-5" style="color:green">Successfully added your pet!</p>';
		}	
	}?>

<div class='container-fluid mx-auto my-5 border border-secondary bg-white'>
	<table class='table text-center'>
		<tr>
			<td><a class='text-info' href='newPet.php'> Add a Pet </a></td>
			<td><a class='text-info' href='edit.php'> Edit User Information </a></td>
		</tr>	
		<tr>
			<td><a class='text-info' href='help.php'> Request Help </a></td>
			<td><a class='text-info' href="dashboard.php?type=none"> Deactivate Account </a></td>
		</tr>
		<tr>	
			<td><a class='text-info' href="dashboard.php?type=angel"> Switch to "Angel" Account </a></td>
			<td><a class='text-info' href="history.php"> History</a></td>
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
			<td><a class='text-info' href='search.php'> Search for a pet to foster</a></td>
			<td><a class='text-info' href='edit.php'> Edit User Information </a></td>
		</tr>	
		<tr>
			<td></td>
			<td><a class='text-info' href="dashboard.php?type=none"> Deactivate Account </a></td>
		</tr>
		<tr>	
			<td><a class='text-info' href="dashboard.php?type=owner"> Switch to "Owner" Account </a></td>
			<td><a class='text-info' href="history.php"> History</a></td>
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
			<td><a class='text-info' href='edit.php'> Edit User Information </a></td>
		</tr>
		<tr>
			<td><a class='text-info' href="dashboard.php?type=angel"> Reactivate Account as Angel </a></td>
			<td><a class='text-info' href="dashboard.php?type=owner"> Reactivate Account as Pet Owner </a></td>
		</tr>
	</table>
		
</div>	
<?php } ?>
	
	
	
	
<?php include("footer.php"); ?>