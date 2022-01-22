<?php
    ob_start();
	include ($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/header.php');
	echo "<title>Organizer Register</title>";
?>

</head>
<!-- body -->

<body class="main-layout">
    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/nav.php');
        if(!isset($_SESSION['organizer_id'])){
            header ("Location: //localhost/event-ticket-booking/user/login");
        }
	?>

    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-2">
                <?php
                    include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/organizer/includes/side-nav.php');
                    include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/database_connection.php');
                    $sql = "SELECT * FROM events JOIN bookings on bookings.event_id = events.event_id  WHERE organized_by = '$_SESSION[organizer_id]'";
                    $result= $conn->query($sql);
                    $total_tickets_sold = 0;
                    $total_income = 0;
                    while($row = mysqli_fetch_assoc($result)) {
                        $total_tickets_sold = $total_tickets_sold + $row['no_of_tickets'];
                        $total_income = $total_income + $row['total_price'];
                    }
                    // num of tickets created
                    $sql = "SELECT * FROM events WHERE organized_by = '$_SESSION[organizer_id]'";
                    $result= $conn->query($sql);
                    $total_tickets_created=mysqli_num_rows($result);

                ?>
            </div>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card p-3" style="width: 18rem; background-color: #4d4cac;">
                            <div style='color: #fff;'>
                                <div class="row">
                                    <div class="col-sm-4 ml-2">
                                        <div class="float-right dashboard-top-card-icon"
                                            style='background-color: #7776d7;'>
                                            <i class="fas fa-ticket-alt"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="float-left">
                                            <span style='font-size: 20px;'><?php echo $total_tickets_sold ?></span> <br>
                                            Total Tickets Sold
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card p-3" style="width: 18rem; background-color: #9698d6;">
                            <div style='color: #fff;'>
                                <div class="row">
                                    <div class="col-sm-4 ml-2">
                                        <div class="float-right dashboard-top-card-icon"
                                            style='background-color: #7776d7;'>
                                            <i class="fas fa-rupee-sign"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="float-left">
                                            <span style='font-size: 20px;'><?php echo $total_income ?></span> <br>
                                            Total Income
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card p-3" style="width: 18rem; background-color: #ff808b;">
                            <div style='color: #fff;'>
                                <div class="row">
                                    <div class="col-sm-4 ml-2">
                                        <div class="float-right dashboard-top-card-icon"
                                            style='background-color: #f3adb3;'>
                                            <i class="fas fa-microphone"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="float-left">
                                            <span style='font-size: 20px;'><?php echo $total_tickets_created ?></span>
                                            <br>
                                            Tickets Created
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>
                <?php
                $sql = "SELECT * FROM events WHERE organized_by = '$_SESSION[organizer_id]' ORDER BY event_id DESC LIMIT 5";
                $result = $conn->query($sql);
                if (mysqli_num_rows($result) > 0) {
                    echo "
                    <h3>Latest Events</h3>
                    <table class='table shadow-sm rounded'>
                        <thead class='thead-dark'>
                            <tr>
                                <th scope='col'>Event ID</th>
                                <th scope='col'>Event Name</th>
                                <th scope='col'>Event Type</th>
                                <th scope='col'>Hosted By</th>
                                <th scope='col'>Status</th>
                            </tr>
                        </thead>
                        <tbody>";
                        while($row = mysqli_fetch_assoc($result)) {
                            echo"<tr>
                                    <th>$row[event_id]</th>
                                    <th><a href='event-details?eventid=$row[event_id]'>$row[event_name]</a></th>
                                    <td>$row[event_type]</td>
                                    <td>$row[hosted_by]</td>
                                    <td>$row[status]</td>
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