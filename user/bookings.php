<?php
    ob_start();
	include ($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/header.php');
	echo "<title>Bookings</title>";
?>

</head>
<!-- body -->

<body class="main-layout">
    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/nav.php');
	?>

    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-2">
                <?php
                    include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/user/includes/side-nav.php');
                    if(!isset($_SESSION['user_id'])){
                        header ("Location: //localhost/event-ticket-booking/user/login?not-loggedin");
                    }
                ?>
            </div>
            <div class="col-sm-10">
                <?php
                include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/database_connection.php');
                $sql = "SELECT * FROM bookings LEFT JOIN events ON events.event_id=bookings.event_id WHERE user_id = '$_SESSION[user_id]' ORDER BY booking_id  DESC";
                $result = $conn->query($sql);
                if (mysqli_num_rows($result) > 0) {
                    echo "
                    <table class='table shadow-sm rounded'>
                        <thead class='thead-dark'>
                            <tr>
                                <th scope='col'>Event Name</th>
                                <th scope='col'>Tickets</th>
                                <th scope='col'>Total Price</th>
                                <th scope='col'>Booked On</th>
                                <th scope='col'></th>
                            </tr>
                        </thead>
                        <tbody>";
                        while($row = mysqli_fetch_assoc($result)) {
                            echo"
                                <tr>
                                    <th><a href='booking-details?bookingid=$row[booking_id]'>$row[event_name]</a></th>
                                    <th>$row[no_of_tickets]</th>
                                    <td>$row[total_price]</td>
                                    <td>$row[booking_date]</td>
                                    <td><a href='#'>></a></td>
                                </tr>";
                        }
                        echo"
                        </tbody>
                        </table>";
                            
                } else {
                    echo "<img class='image-center' src='//localhost/event-ticket-booking/images/empty.svg' alt='empty'>
                    <h3 class='text-center mt-3 font-weight-bold'>No Events Found!</h3>";                
                }
                ?><br>

            </div>
        </div>
    </div>
    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/footer.php');
	?>
</body>

</html>