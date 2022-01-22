<?php
	session_start();

	if (isset($_POST['submit'])) {

		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/database_connection.php');

		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$phone = mysqli_real_escape_string($conn, $_POST['phone']);
		$message = mysqli_real_escape_string($conn, $_POST['message']);
		
		//-----Check if form datas are not filled-----
         if (empty($name)) {
			header ("Location:../contact.php?error");
			exit();
        }
        if (empty($email)) {
			header ("Location:../contact.php?error");
			exit();
        }
		if (empty($phone)) {
			header ("Location:../contact.php?error");
			exit();
        }
        if (empty($message)) {
            header ("Location:../contact.php?error");
			exit();
		}
	

		//-----End Check if form datas are not filled-----

		else {
            $sql = "INSERT INTO contact (name, email, phone, message)
            VALUES ('$name', '$email', '$phone', '$message')";
            $result = $conn->query($sql);
            if($conn->affected_rows != 0){
                header ("Location:../contact.php?success");
            }else {
                header ("Location:../contact.php?error");
            }                
		}
	} else {
        header ("Location:../contact.php?error");
		exit();
	}
?>