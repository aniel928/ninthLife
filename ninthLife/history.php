<?php
	$title = "Ninth Life - History";
	include('header.php');
	include('functions.php');

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
    $pets = [];

if(isset($_GET['id'])){
	$connection = new mysqli("ninthlife.czilv4k1yhiv.us-east-2.rds.amazonaws.com", "admin", "ninthlife", "ninth_life");
	if($type == 'owner'){
		$connection->query("Update Fostering set location = 2 where petHelped=".$_GET['id']." AND ownerId=".$userID.";");
	}
	else{
		$connection->query("Update Fostering set location = 2 where petHelped=".$_GET['id']." AND angelId=".$userID.";");
	}
	
	$connection->close();
}

if(isset($_GET['cancel'])){
	$connection = new mysqli("ninthlife.czilv4k1yhiv.us-east-2.rds.amazonaws.com", "admin", "ninthlife", "ninth_life");
	if($type == 'owner'){
		$connection->query("Update Fostering set location = 0 where petHelped=".$_GET['cancel']." AND ownerId=".$userID.";");
		$connection->query("Update Pets set needsHelp = 1 where petId=".$_GET['cancel']);
	}
	else{
		$connection->query("Update Fostering set location = 0 where petHelped=".$_GET['cancel']." AND angelId=".$userID.";");
	}

	
	$connection->close();
}

if(isset($_GET['finish'])){
$connection = new mysqli("ninthlife.czilv4k1yhiv.us-east-2.rds.amazonaws.com", "admin", "ninthlife", "ninth_life");
	if($type == 'owner'){
		$connection->query("Update Fostering set location = 0 where petHelped=".$_GET['finish']." AND ownerId=".$userID.";");
	}
	else{
		$connection->query("Update Fostering set location = 0 where petHelped=".$_GET['finish']." AND angelId=".$userID.";");
	}
	
	$connection->close();
}







    if($type == 'owner'){
		$pets = getFosteredPets($userID);
    }
    else{
    	$pets = getFosteringPets($userID);
    }
?>
<div class='container bg-white'>
<table class='table'>
<?php
	if($pets != null){
		echo "<tr><th>Owner Name</th><th>Pet Name</th><th>Phone</th><th>Email</th><th> Action </th></tr>";
	foreach($pets as $pet){
		$connection = new mysqli("ninthlife.czilv4k1yhiv.us-east-2.rds.amazonaws.com", "admin", "ninthlife", "ninth_life");
		$result = $connection->query("SELECT * From Pets, Users where Pets.petOwner = Users.userId AND petId=\"".$pet['petHelped']."\";");
		$row = $result->fetch_assoc();

		echo "<tr>";
		echo "<td>".$row["displayName"]."</td>";
		echo "<td>".$row["name"]."</td>";
		echo "<td>".$row["phone"]."</td>";
		echo "<td>".$row["email"]."</td>";
		if($pet["location"] == 1){
			echo "<td><a href=\"history.php?id=".$row["petId"]."\"><button class = 'btn btn-success'>Pet with Foster</button></a><br><br>";
			echo "<a href=\"history.php?cancel=".$row["petId"]."\"><button class = 'btn btn-danger'>Cancel</button></a></td>";
		}
		else{
			echo "<td><a href=\"history.php?finish=".$row["petId"]."\"><button class = 'btn btn-success'>Pet Returned</button></a><br><br>";
		}
		echo "</tr>";
		$connection->close();
	}
	}else{
		echo "<tr><td> No records currently </td></tr>";
	}
?>
</table>
</div>



<?php
	include('footer.php');
?>