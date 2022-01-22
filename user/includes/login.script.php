<?php
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/database_connection.php');


	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn ,$_POST['password']);

	//-----Check if form datas are not filled-----

	if (empty($email)) {
		header ("Location:../login.php?error");
		exit();
	}
	if (empty($password)) {
		header ("Location:../login.php?error");
		exit();
	} 
	//-----Check if form datas are not filled-----

	//-----Check For Hash Password and Dehash-----

	$sql = "SELECT * FROM users WHERE email = '$email'";
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
	$hash_password = $row['password'];
	$dehash = password_verify($password, $hash_password);
	if ($dehash == 0) {
		header ("Location:../login.php?wrong");
		exit();
	}

	//-----End Check For Hash Password and Dehash-----  

	else {
		$sql = "SELECT * FROM users WHERE email = '$email'  AND password = '$hash_password' ";
		$result = $conn->query($sql);

		if (!$row = $result->fetch_assoc()) {
			header ("Location: //localhost/event-ticket-booking/user/login.php?wrong");
			exit();
		} else {
			$_SESSION['user_id'] = $row['u_id'];
			$_SESSION['firstname'] = $row['firstname'];
		}
		header ("Location: //localhost/event-ticket-booking/user/bookings");
	}
?>