<?php


//call this function to log a user in - need to add hash for password
function login($email,$password){
	//start session
	session_start();
	//connect to db
	$connection = mysql_connect("ninthlife.czilv4k1yhiv.us-east-2.rds.amazonaws.com", "admin", "ninthlife");
	//takes input values and makes them safe
	$email = stripslashes($email);
	$password = stripslashes($password);
	$email = mysql_real_escape_string($email);
	$password = mysql_real_escape_string($password);
	
	//choose db
	$db = mysql_select_db("ninth_life", $connection);
	//set up and execute query, then put into array, then check for # of rows
	$query = mysql_query("select * from `Users` where password=\"". $password. "\" AND email= \"" . $email . "\";", $connection);
	$rows = mysql_num_rows($query);
	
	//assign all session variables if valid login
	// if ($rows == 1) {
	// 	$row = mysql_fetch_assoc($query);
	// 	//set session variables
	// 	$_SESSION['user_id']=$row['userId'];
	// 	$_SESSION['email'] = $row['email'];
	// 	$_SESSION['phone'] = $row['phone'];
	// 	$_SESSION['address'] = $row['streetAddress'];
	// 	$_SESSION['zip'] = $row['zipCode'];
	// 	$_SESSION['name'] = $row['fullName'];
	// 	$_SESSION['displayName'] = $row['displayName'];
	// 	if($row['angel']){
	// 		$_SESSION['type'] = "angel";
	// 	}
	// 	else if ($row['owner']){
	// 		$_SESSION['type'] = "owner";
	// 	}
	// 	else{
	// 		$_SESSION['type'] = "none";
	// 	}
	// 	$_SESSION['rating'] = $row['rating'];

	// 	$_SESSION['login_user']= $row['userID']; //Initializes session		
				
	// 	$user_check = $_SESSION['login_user'];
	// 	$ses_sql=mysql_query("select email from `user` where email='$user_check'", $connection);
	// 	$row = mysql_fetch_assoc($ses_sql);
	// 	$login_session =$row['user_id'];

	// 	if(!isset($login_session)){
	// 		mysql_close($connection); // Closing Connection
	// 		header('Location: index.php?status=failed'); // Redirecting To Home Page
	// 	}//end if(!isset($login_session)
	// 	mysql_close($connection); // Closing Connection
	// 	header("location: dashboard.php"); // Redirecting To Other Page
	// }//end if ($rows == 1)
 // 	else {//if rows !=1
	//  	mysql_close($connection); // Closing Connection
	// 	header("location: index.php?status=failed");
	// }//end else
}//end function


//call this function to create a new account
function createAccount($name, $displayName, $phone, $address, $zip, $email, $password, $type){
	//connect and select db
	echo "yes";
	$connection = mysql_connect("ninthlife.czilv4k1yhiv.us-east-2.rds.amazonaws.com", "admin", "ninthlife");
	$db = mysql_select_db("ninth_life", $connection);
	//make sure account doesn't already exist
	$query = mysql_query("select * from `Users` where password='$password' AND email='$email'",$connection);
	$rows = mysql_num_rows($query);
	if($rows >= 1){ //if email, password are the same
		echo "no";
		mysql_close($connection);
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
		
		mysql_query($query);
		mysql_close($connection);
		login($email,$password);	
	}//end first else
}

?>