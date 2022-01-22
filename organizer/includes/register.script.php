<?php
	session_start();

	if (isset($_POST['submit'])) {

		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/database_connection.php');

		$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
		$company = mysqli_real_escape_string($conn, $_POST['company']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$phone = mysqli_real_escape_string($conn, $_POST['phone']);
		$area = mysqli_real_escape_string($conn, $_POST['area']);
		$locality = mysqli_real_escape_string($conn, $_POST['locality']);
		$city = mysqli_real_escape_string($conn, $_POST['city']);
		$state = mysqli_real_escape_string($conn, $_POST['state']);
		$pin = mysqli_real_escape_string($conn, $_POST['pin']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);

		//-----Check if form datas are not filled-----
         if (empty($email)) {
			header ("Location:../register.php?error");

			exit();
        }
        if (empty($firstname)) {
			header ("Location:../register.php?error");

			exit();
        }
        if (empty($lastname)) {
			header ("Location:../register.php?error");

			exit();
		}
        if (empty($phone)) {
			header ("Location:../register.php?error");

			exit();
		}
		if (empty($area)) {
			header ("Location:../register.php?error");

			exit();
		} 
		if (empty($locality)) {
			header ("Location:../register.php?error");

			exit();
		} 
		if (empty($city)) {
			header ("Location:../register.php?error");

			exit();
		} 
		if (empty($state)) {
			header ("Location:../register.php?error");

			exit();
		} 
		if (empty($pin)) {
			header ("Location:../register.php?error");

			exit();
		}  
		if (empty($password)) {
			header ("Location:../register.php?error");
			exit();
		} 

		//-----End Check if form datas are not filled-----

		else {
			
				//check if email is valid
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					header ("Location:../register.php?error");
					exit();
				}
				else {
					//-----Check if username or email is already exists----- 
					$sql = "SELECT * FROM organizer_details WHERE phone = '$phone'";
					$result = $conn->query($sql);
					$phoneCheck = mysqli_num_rows($result);

					$sql = "SELECT * FROM organizer_login WHERE email = '$email'";
					$result = $conn->query($sql);
					$emailCheck = mysqli_num_rows($result);

					if ($phoneCheck > 0) {
						header ("Location:../register.php?phone-exists");
						exit();
					}
					elseif ($emailCheck > 0) {
						header ("Location:../register.php?email-exists");
						exit();

					}
					//-----End Check if username or email is already exists-----
					else {
						$encrypted_password = password_hash($password, PASSWORD_DEFAULT); //hashing password
								$sql = "INSERT INTO organizer_details ( firstname, lastname, company, phone, address_area, address_locality, address_city, address_state, address_pin)
								VALUES ('$firstname', '$lastname', '$company', '$phone', '$area', '$locality', '$city', '$state', '$pin')";
                                $result = $conn->query($sql);
								$last_inserted_id = mysqli_insert_id($conn);

								$sql2 = "INSERT INTO organizer_login (o_id, email, password)
								VALUES (LAST_INSERT_ID(), '$email', '$encrypted_password')";
                                $result2 = $conn->query($sql2);
                        header ("Location://localhost/event-ticket-booking/user/login.php?success");
					}
				}
		}
	} else {
		header ("Location:../register.php?error");
		exit();
	}
?>