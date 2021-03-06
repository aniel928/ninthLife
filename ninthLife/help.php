<?php
	$title = "Ninth Life - Help!";
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

if(isset($_GET['id'])) {
	flagHelped($_GET['id'], 1);
}
if(isset($_GET['cancel'])){
	flagHelped($_GET['cancel'], 0);
}



	$pets = getPets($userID);
?>
<div class='container bg-white'>
<table class='table'>
	<tr><th>Picture</th><th>Pet Type</th><th>Pet Name</th><th>Zip Code</th><th> Profile </th></tr>
<?php
	if($pets != null){
	foreach($pets as $pet){
		echo "<tr>";
		echo "<td><img style='width:150px' src=\"".$pet["pictureLink"]."\"></td>";
		echo "<td>".$pet["type"]."</td>";
		echo "<td>".$pet["name"]."</td>";
		echo "<td>".$pet["zipCode"]."</td>";
		if($pet["needsHelp"] == 0){
			echo "<td><a href=\"help.php?id=".$pet["petId"]."\"><button class = 'btn btn-success'>Request An Angel</button></a></td>";
		}
		else{
			echo "<td><a href=\"help.php?cancel=".$pet["petId"]."\"><button class = 'btn btn-danger'>Cancel Request</button></a></td>";	
		}
		echo "</tr>";
	}}
?>
</table>
</div>



<?php
	include('footer.php');
?>