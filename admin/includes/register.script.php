<?php
	session_start();

	if (isset($_POST['submit'])) {

		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/database_connection.php');

		$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);

		//-----Check if form datas are not filled-----
         if (empty($email)) {
			header ("Location:../register?error=empty");

			exit();
        }
        if (empty($firstname)) {
			header ("Location:../register?error=empty");

			exit();
        }
        if (empty($lastname)) {
			header ("Location:../register?error=empty");

			exit();
		} if (empty($password)) {
			header ("Location:../register?error=empty");

			exit();
		} 

		//-----End Check if form datas are not filled-----

		else {
			
				//check if email is valid
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					header ("Location:../register?email=invalid");
					exit();
				}
				else {
					//-----Check if email is already exists----- 

					$sql = "SELECT * FROM admin WHERE email = '$email'";
					$result = $conn->query($sql);
					$emailCheck = mysqli_num_rows($result);

					if ($emailCheck > 0) {
						header ("Location:../register?error=email");
						exit();

					}
					//-----End Check if username or email is already exists-----
					else {
						$encrypted_password = password_hash($password, PASSWORD_DEFAULT); //hashing password
								$sql = "INSERT INTO admin ( firstname, lastname, email, password)
								VALUES ('$firstname', '$lastname',  '$email', '$encrypted_password')";
                                $result = $conn->query($sql);
                        header ("Location:../login?register=success");
					}
				}
		}
	} else {
		header ("Location:../register.php?submit-error");
		exit();
	}
?>