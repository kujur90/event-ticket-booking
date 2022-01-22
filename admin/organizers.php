<?php

	include ($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/header.php');
	echo "<title>Organizers</title>";
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
                ?>
            </div>
            <div class="col-sm-10">
                <div class="row">
                    <?php
                    include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/database_connection.php');
                    $sql = "SELECT * FROM organizer_details ORDER BY o_id DESC";
                    $result = $conn->query($sql);
                    if (mysqli_num_rows($result) > 0) {
                        echo "
                        <table class='table shadow-sm rounded'>
                            <thead class='thead-dark'>
                                <tr>
                                    <th scope='col'>Organizer ID</th>
                                    <th scope='col'>Organizer Name</th>
                                    <th scope='col'>Company</th>
                                    <th scope='col'>Events Created</th>
                                </tr>
                            </thead>
                            <tbody>";
                            while($row = mysqli_fetch_assoc($result)) {
                                echo"<tr>
                                        <th>$row[o_id]</th>
                                        <th><a href='organizer-details?oid=$row[o_id]'>$row[firstname] $row[lastname]</a></th>
                                        <td>$row[company]</td>
                                        <td>"; 
                                        $sql2 = "SELECT COUNT(*) AS events_created FROM events WHERE organized_by = $row[o_id]";
                                        $result2 = $conn->query($sql2);
                                        $row2 = mysqli_fetch_assoc($result2);
                                        echo "$row2[events_created] </td>
                                        
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
    </div>
    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/footer.php');
	?>
</body>

</html>