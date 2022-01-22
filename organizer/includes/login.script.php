<?php
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/database_connection.php');


	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn ,$_POST['password']);

	//-----Check if form datas are not filled-----

	if (empty($email)) {
		header ("Location://localhost/event-ticket-booking/user/login.php?error");
		exit();
	}
	if (empty($password)) {
		header ("Location://localhost/event-ticket-booking/user/login.php?error");
		exit();
	} 
	//-----Check if form datas are not filled-----

	//-----Check For Hash Password and Dehash-----

	$sql = "SELECT * FROM organizer_login WHERE email = '$email'";
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
	$hash_password = $row['password'];
	$dehash = password_verify($password, $hash_password);
	if ($dehash == 0) {
		header ("Location: //localhost/event-ticket-booking/user/login.php?wrong");
		exit();
	}

	//-----End Check For Hash Password and Dehash-----  

	else {
		$sql = "SELECT * FROM organizer_login WHERE email = '$email'  AND password = '$hash_password' ";
		$result = $conn->query($sql);

		if (!$row = $result->fetch_assoc()) {
			header ("Location: //localhost/event-ticket-booking/user/login.php?wrong");
			exit();
		} else {
            $sql2 = "SELECT * FROM organizer_details WHERE o_id = $row[o_id] ";
		    $result2 = $conn->query($sql2);
            $row2 = mysqli_fetch_assoc($result2);

			$_SESSION['organizer_id'] = $row['o_id'];
			$_SESSION['firstname'] = $row2['firstname'];
		}
		header ("Location: //localhost/event-ticket-booking/organizer/dashboard.php");
	}
?>