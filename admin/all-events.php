<?php

	include ($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/header.php');
	echo "<title>Admin Dashboard</title>";
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
                    $sql = "SELECT * FROM events";
                    $result = $conn->query($sql);
                    if (mysqli_num_rows($result) > 0) {
                        if (isset($_GET['pageno'])) {
                            $pageno = $_GET['pageno'];
                        } else {
                            $pageno = 1;
                        }
                        $no_of_records_per_page = 8;
                        $offset = ($pageno-1) * $no_of_records_per_page;

                        $total_pages_sql = "SELECT COUNT(*) FROM events";
                        $result = mysqli_query($conn,$total_pages_sql);
                        $total_rows = mysqli_fetch_array($result)[0];
                        $total_pages = ceil($total_rows / $no_of_records_per_page);

                        $sql = "SELECT * FROM events ORDER BY event_id DESC LIMIT $offset, $no_of_records_per_page";
                        $res_data = mysqli_query($conn,$sql);
                        echo "
                        <table class='table shadow-sm rounded'>
                            <thead class='thead-dark'>
                                <tr>
                                    <th scope='col'>Event ID</th>
                                    <th scope='col'>Event Name</th>
                                    <th scope='col'>Event Type</th>
                                    <th scope='col'>Hosted By</th>
                                    <th scope='col'>Tickets Sold</th>
                                </tr>
                            </thead>
                            <tbody>";
                        while($row = mysqli_fetch_array($res_data)){
                            echo"<tr>
                                <th>$row[event_id]</th>
                                <th><a href='event-details?eventid=$row[event_id]'>$row[event_name]</a></th>
                                <td>$row[event_type]</td>
                                <td>$row[hosted_by]</td>";
                                $sql2 = "SELECT COUNT(*) as tickets_sold FROM bookings WHERE event_id = $row[event_id]";
                                $result2 = $conn->query($sql2);
                                $row2 = mysqli_fetch_assoc($result2);
                                echo "<td>$row2[tickets_sold]</td>
                            </tr>";
                        }
                        echo "</tbody>
                        </table>";
                    ?>
                    <div class="pagi">
                        <ul class="pagination">
                            <li><a href="?pageno=1">First</a></li>
                            <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                                <a
                                    href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
                            </li>
                            <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                                <a
                                    href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
                            </li>
                            <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                        </ul>
                    </div>

                    <?php 
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