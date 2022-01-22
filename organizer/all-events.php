<?php

	include ($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/header.php');
	echo "<title>Admin Dashboard</title>";
?>

</head>
<!-- body -->

<body class="main-layout">
    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/nav.php');
        if(!isset($_SESSION['organizer_id'])){
            header ("Location: //localhost/event-ticket-booking/user/login?not-loggedin");
        }
	?>

    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-2">
                <?php
                    include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/organizer/includes/side-nav.php');
                ?>
            </div>
            <div class="col-sm-10">
                <div class="row">
                    <?php
                    include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/database_connection.php');
                    $sql = "SELECT * FROM events WHERE organized_by = '$_SESSION[organizer_id]' ORDER BY event_id DESC";
                    $result = $conn->query($sql);
                    if (mysqli_num_rows($result) > 0) {
                        echo "
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
                        echo "
                        <div  class='image-center'>
                            <img src='//localhost/event-ticket-booking/images/empty.svg' alt='empty'>
                            <h3 class='text-center mt-3 font-weight-bold'>No Events Found!</h3>
                        </div>";
                    }
                    ?><br>
                </div>
            </div>
        </div>
    </div>
    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/footer.php');
	?>
</body>

</html>