<?php
	session_start();

	if (isset($_POST['submit'])) {

		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/database_connection.php');

		$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$phone = mysqli_real_escape_string($conn, $_POST['phone']);
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
		} if (empty($password)) {
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
					$sql = "SELECT * FROM users WHERE phone = '$phone'";
					$result = $conn->query($sql);
					$phoneCheck = mysqli_num_rows($result);

					$sql = "SELECT * FROM users WHERE email = '$email'";
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
								$sql = "INSERT INTO users ( firstname, lastname, email, phone, password)
								VALUES ('$firstname', '$lastname',  '$email', '$phone',  '$encrypted_password')";
                                $result = $conn->query($sql);
                        header ("Location:../login.php?success");
					}
				}
		}
	} else {
		header ("Location:../register.php?error");
		exit();
	}
?>