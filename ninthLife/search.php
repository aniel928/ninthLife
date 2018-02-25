<?php
	$title = "Ninth Life - Search";
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
    if(isset($_GET['search'])){
		$pets = getPetsInNeed(null);
	}
	else{
		$pets = getPetsInNeed($zip);
	}
?>
<div class='container bg-white'>
<table class='table mx-auto text-center'>
	
<?php
	if($pets == null){
	echo "<tr><th>No pets in need right now.  Great job everyone!</th></tr></table>";
	}
	else{
		echo "<tr><th>Picture</th><th>Pet Type</th><th>Pet Name</th><th>Zip Code</th><th> Profile </th></tr>";
	foreach($pets as $pet){
		echo "<tr>";
		echo "<td><img style='width:150px' src=\"".$pet["pictureLink"]."\"></td>";
		echo "<td>".$pet["type"]."</td>";
		echo "<td>".$pet["name"]."</td>";
		echo "<td>".$pet["zipCode"]."</td>";
		echo "<td><a href=\"petPage.php?id=".$pet["petId"]."\"><button class = 'btn btn-success'>See My Profile!</button></a></td>";
		echo "</tr>";
	}}
?>
</table>
</div>
<div class='mx-auto text-center'>
<?php
if(isset($_GET['search'])){
		echo '<p> Showing all results.  To see results in only your area, click <a href="search.php">here</a>.</p>';
	}
	else{
		echo '<p> Showing all nearby results.  To search all results, click <a href="search.php?search=all">here</a>.</p>';
	}
?>


</div>


<?php
	include('footer.php');
?>