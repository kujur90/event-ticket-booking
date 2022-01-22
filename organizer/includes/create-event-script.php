<?php
	session_start();

	if (isset($_POST['submit'])) {

		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/database_connection.php');

		$event_name = mysqli_real_escape_string($conn, $_POST['event_name']);
		$event_type = mysqli_real_escape_string($conn, $_POST['event_type']);
		$event_mode = mysqli_real_escape_string($conn, $_POST['event_mode']);
		$date = mysqli_real_escape_string($conn, $_POST['date']);
		$time = mysqli_real_escape_string($conn, $_POST['time']);
		$duration = mysqli_real_escape_string($conn, $_POST['duration']);
		$max_tickets = mysqli_real_escape_string($conn, $_POST['max_tickets']);
		$hosted_by = mysqli_real_escape_string($conn, $_POST['hosted_by']);
		$about = mysqli_real_escape_string($conn, $_POST['about']);
		$price = mysqli_real_escape_string($conn, $_POST['price']);
		$area = mysqli_real_escape_string($conn, $_POST['area']);
		$locality = mysqli_real_escape_string($conn, $_POST['locality']);
		$city = mysqli_real_escape_string($conn, $_POST['city']);
		$state = mysqli_real_escape_string($conn, $_POST['state']);
		$pin = mysqli_real_escape_string($conn, $_POST['pin']);

		//-----Check if form datas are not filled-----
         if (empty($event_name)) {
			header ("Location:../create-event.php?error");
			exit();
        }
        if (empty($event_type)) {
			header ("Location:../create-event.php?error");
			exit();
        }
		if (empty($event_type)) {
			header ("Location:../create-event.php?error");
			exit();
        }
        if (empty($event_mode)) {
            header ("Location:../create-event.php?error");
			exit();
		}
        if (empty($time)) {
            header ("Location:../create-event.php?error");
			exit();
		} if (empty($duration)) {
            header ("Location:../create-event.php?error");
			exit();
		} 
		if (empty($max_tickets)) {
            header ("Location:../create-event.php?error");
			exit();
		} 
        if (empty($hosted_by)) {
            header ("Location:../create-event.php?error");
			exit();
		} 
        if (empty($about)) {
            header ("Location:../create-event.php?error");
			exit();
		} 
        if (empty($price)) {
            header ("Location:../create-event.php?error");
			exit();
		} 

		//-----End Check if form datas are not filled-----

		else {
            $sql = "INSERT INTO events (organized_by, event_name, event_type, event_mode, hosted_by, date, time, duration, price, max_tickets, about, address_area, address_locality, address_city, address_state, address_pin)
            VALUES ('$_SESSION[organizer_id]', '$event_name', '$event_type', '$event_mode', '$hosted_by', '$date', '$time', '$duration', '$price', '$max_tickets', '$about', '$area', '$locality', '$city', '$state', '$pin')";
            $result = $conn->query($sql);
            if($conn->affected_rows != 0){

				//Upload Image
				$file = $_FILES['portrait_image'];
				$fileName = $_FILES['portrait_image']['name'];
				$fileTmpName = $_FILES['portrait_image']['tmp_name'];
				$fileSize = $_FILES['portrait_image']['size'];
				$fileError = $_FILES['portrait_image']['error'];
				$fileType = $_FILES['portrait_image']['type'];

				$fileExt = explode('.', $fileName);
				$fileActualExt = strtolower(end($fileExt));

				$allowed = array('jpg', 'jpeg');
				if (in_array($fileActualExt, $allowed)) {
					if ($fileError === 0) {
						if ($fileSize < 1000000) {
							$fileNameNew = $conn->insert_id.".".$fileActualExt;
							$fileLocation = $_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/images/event-images/'.$fileNameNew;
							move_uploaded_file($fileTmpName, $fileLocation);

							header ("Location: //localhost/event-ticket-booking/organizer/dashboard.php");

						} else {
							echo "Your file is too big";
						}

					} else{
						echo "Error uploading your file";
					}
				}
				else {
					echo "You Cannor upload files of this type";
				}				
				              
            }else {
                header ("Location:../create-event.php?error");
            }                
		}
	} else {
        header ("Location:../create-event.php?error");
		exit();
	}
?>