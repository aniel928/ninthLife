<?php


//call this function to log a user in - need to add hash for password
function login($email,$password){
	//start session
	session_start();
	//connect to db
	$connection = mysqli_connect("ninthlife.czilv4k1yhiv.us-east-2.rds.amazonaws.com", "admin", "ninthlife", "ninth_life");
	//takes input values and makes them safe
	$email = stripslashes($email);
	$password = stripslashes($password);
	$email = mysqli_real_escape_string($connection, $email);
	$password = mysqli_real_escape_string($connection, $password);
	
	//choose db
	$db = mysqli_select_db($connection, "ninth_life");
	//set up and execute query, then put into array, then check for # of rows
	$query = mysqli_query($connection, "select * from `Users` where password=\"". $password. "\" AND email= \"" . $email . "\";");
	$rows = mysqli_num_rows($query);
	
	//assign all session variables if valid login
	if ($rows > 0) {
		$row = mysqli_fetch_assoc($query);
		//set session variables
		$_SESSION['user_id']=$row['userId'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['phone'] = $row['phone'];
		$_SESSION['address'] = $row['streetAddress'];
		$_SESSION['zip'] = $row['zipCode'];
		$_SESSION['name'] = $row['fullName'];
		$_SESSION['displayName'] = $row['displayName'];
		if($row['angel']){
			$_SESSION['type'] = "angel";
		}
		else if ($row['owner']){
			$_SESSION['type'] = "owner";
		}
		else{
			$_SESSION['type'] = "none";
		}
		$_SESSION['rating'] = $row['rating'];

		$_SESSION['login_user']= $row['userId']; //Initializes session		
				
		$login_session =$row['userId'];

		if(!isset($login_session)){
			mysqli_close($connection); // Closing Connection
//			header('Location: index.php?status=failed'); // Redirecting To Home Page
		}//end if(!isset($login_session)
		mysqli_close($connection); // Closing Connection
//		header("location: dashboard.php"); // Redirecting To Other Page
	}//end if ($rows == 1)
 	else {//if rows !=1
	 	mysqli_close($connection); // Closing Connection
//		header("location: index.php?status=failed");
	}//end else
}//end function


//call this function to create a new account
function createAccount($name, $displayName, $phone, $address, $zip, $email, $password, $type){
	//connect and select db
	echo "yes";
	$connection = mysqli_connect("ninthlife.czilv4k1yhiv.us-east-2.rds.amazonaws.com", "admin", "ninthlife");
	$db = mysqli_select_db("ninth_life", $connection);
	//make sure account doesn't already exist
	$query = mysqli_query("select * from `Users` where password='$password' AND email='$email'",$connection);
	$rows = mysqli_num_rows($query);
	if($rows >= 1){ //if email, password are the same
		echo "no";
		mysqli_close($connection);
		header("location:register.php?status=failed");
	}//end if($rows >=1)
	else{//if it does not exist, check email and type (in case pw is wrong)
		echo "yay";
		
		$email = stripslashes($email);
		$password = stripslashes($password);
		$email = mysql_real_escape_string($email);
		$password = mysql_real_escape_string($password);

		$angel = 0;
		$owner = 0;
		if($type == 'angel'){
			$angel = 1;
			$owner = 0;
		}
		else{
			$angel = 0;
			$owner = 1;
		}
		$query = "INSERT INTO `Users` (`password`, `email`, `phone`, `streetAddress`, `zipCode`, `fullName`, `displayName`, `rating`, `angel`, `owner`) VALUES (\"".$password."\", \"". $email ."\", \"". $phone . "\", \"". $address. "\", \"". $zip ."\", \"" . $name . "\", \"" . $displayName . "\", 0, " . $angel . ", " . $owner . ");";
		
		mysqli_query($query);
		mysqli_close($connection);
		login($email,$password);	
	}//end first else
}

function getPets($userId){
	$connection = new mysqli("ninthlife.czilv4k1yhiv.us-east-2.rds.amazonaws.com", "admin", "ninthlife", "ninth_life");
	
	$pets = [];
	$sql = "SELECT * FROM Pets, Users WHERE `Pets`.`petOwner` = `Users`.`userId` AND petOwner=\"".$userId."\";";
	$result = $connection->query($sql);
	if ($result->num_rows > 0) {
    	// output data of each row
    	while($row = $result->fetch_assoc()) {
        	array_push($pets, $row);
    	}
	} else {
	    $pets = null;

	}
	$connection->close();
	return $pets;
}
?>