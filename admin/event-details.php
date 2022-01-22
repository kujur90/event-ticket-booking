<?php
    ob_start();
	include ($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/header.php');
	echo "<title>Event Details</title>";
?>

</head>
<!-- body -->

<body class="main-layout">
    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/nav.php');
        if(!isset($_SESSION['admin_id'])){
            header ("Location: //localhost/event-ticket-booking/user/login?not-loggedin");
        }
	?>

    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-2">
                <?php
                    include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/admin/includes/side-nav.php');
                    include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/database_connection.php');
                    $event_id = $_GET['eventid'];
                    $sql = "SELECT * FROM events WHERE event_id = '$_GET[eventid]' ORDER BY event_id DESC";
                    $result = $conn->query($sql);
                    $row = mysqli_fetch_assoc($result);
                    
                ?>
            </div>
            <div class="col-sm-10">
                <div class="shadow p-5 rounded">
                    <h2>Event Details</h2>
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
                            <h3><b>Approve this event</b></h3>
                            <div class="row">
                                <div class='col-sm-8'>
                                    <?php 
                                    if($row['status'] == "Pending"){
                                        echo "
                                            <form action='includes/approve-reject.script.php' method='post'>
                                            <input type='hidden' name='event_id' value='$row[event_id]'>
                                    <button class='btn btn-success' value='Approve'
                                        name='status'>Approve</button><br><br>
                                    <button class='btn btn-danger' value='Reject' name='status'>Reject</button>
                                    </form>
                                    ";
                                    } else {
                                        if($row['status'] == 'Approve'){
                                            echo " <i class='fas fa-check' style='color: green;'></i> Approved";
                                        } else if($row['status'] == 'Reject'){
                                            echo "<i class='fas fa-times' style='color: red';></i> Rejected";
                                        } else {
                                            echo "$row[status]";
                                        }
                                    }
                                    ?>
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