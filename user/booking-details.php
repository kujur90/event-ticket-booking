<?php
    ob_start();
	include ($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/header.php');
	echo "<title>Account</title>";
?>

</head>
<!-- body -->

<body class="main-layout">
    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/nav.php');
        if(!isset($_SESSION['user_id'])){
            header ("Location: //localhost/event-ticket-booking/user/login?not-loggedin");
        }
	?>

    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-2">
                <?php
                    include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/user/includes/side-nav.php');
                    include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/database_connection.php');
                    $booking_id = $_GET['bookingid'];
                    $sql = "SELECT * FROM bookings LEFT JOIN events ON events.event_id=bookings.event_id WHERE booking_id = '$booking_id' AND user_id = '$_SESSION[user_id]'";
                    $result = $conn->query($sql);
                    $row = mysqli_fetch_assoc($result);
                ?>
            </div>
            <div class="col-sm-10">
                <div class="shadow p-5 rounded">
                    <h2>Booking Details</h2>
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="//localhost/event-ticket-booking/images/event-images/<?php echo $row['event_id']; ?>.jpg"
                                alt="">
                        </div>
                        <div class="col-sm-8">
                            <h2><?php echo $row['event_name']; ?></h2>
                            <h4><?php echo "$row[event_type] -  $row[event_mode] - $row[duration] Hour"; ?></h4>
                            <h4><?php echo "$row[date] -  $row[time]"; ?></h4>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-3 shadow-sm mr-4 p-4">
                            <h3><b>Hosted By</b></h3>
                            <h4><?php echo $row['hosted_by']; ?></h4>
                            <?php 
                            if($row['address_area'] == null){
                                echo "
                                    <h4><b><i class='fas fa-film' style='color: #FF6666;'></i> Online Event</b></h4>
                                ";
                            } else {
                                echo "
                                    <h4><b><i class='fas fa-map-marker-alt' style='color: #FF6666;'></i> Address</b></h4>    
                                    <p>
                                        $row[address_area], $row[address_locality]<br>
                                        <b>$row[address_city]</b> $row[address_state]<br>
                                        $row[address_pin]
                                    </p>";
                            }
                            ?>
                        </div>
                        <div class="col-sm-5 shadow-sm mr-4 p-4">
                            <h3><b>About</b></h3>
                            <h4><?php echo $row['about']; ?></h4>
                        </div>
                        <div class="col-sm-3 shadow-sm p-4">
                            <h3><b>Checkout Details</b></h3>
                            <div class="row">
                                <div class='col-sm-8'>
                                    Ticket Price &#x20B9;<br>
                                    No of Tickets<br><br>
                                    <b>Total Price &#x20B9;</b>
                                </div>
                                <div class='col-sm-4'>
                                    <div class='float-right text-right'>
                                        <?php echo $row['price']; ?><br>
                                        <?php echo $row['no_of_tickets']; ?><br><br>
                                        <?php echo $row['total_price']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/footer.php');
	?>
</body>

</html>