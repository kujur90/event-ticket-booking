<?php

	include 'includes/header.php';
	echo "<title>Search</title>";
?>

</head>
<!-- body -->

<body class="main-layout">

    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/nav.php');
	?>

    <!-- latest events -->
    <div class="events mt-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title">Search Results</div>
                    <div class="row">
                        <?php
                            include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/database_connection.php');
                            $query = mysqli_real_escape_string($conn, $_GET['query']);  
                            if(empty($query)){
                                echo "
                                    <div class='no-result'>
                                        <img src='images/no-result.png'>
                                        <h4>No Results Found</h4>
                                    </div>
                                ";
                            }else {
                                $sql = "SELECT * FROM events WHERE event_name LIKE '%".$query."%' OR event_type LIKE '%".$query."%' ";
                                $result = $conn->query($sql);
                                $result2 = $conn->query($sql);
                                if($row = mysqli_fetch_assoc($result) !=0 ){
                                    while($row2 = mysqli_fetch_assoc($result2)){
                                        echo "
                                        <a href='//localhost/event-ticket-booking/event-details.php?eventid=$row2[event_id]' style='color: #222;'>
                                            <div class='search-card'>
                                                <div class='row'>
                                                    <div class='col-sm-3'>
                                                        <img src='images/event-images/$row2[event_id].jpg'>
                                                    </div>
                                                    <div class='col-sm-9'>
                                                        <div class='title'>
                                                            $row2[event_name]
                                                        </div>
                                                        <p>Hosted by: $row2[hosted_by] - $row2[event_mode]</p>
                                                        <p>$row2[event_type] - &#8377; $row2[price] per person</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        ";
                                    }
                                } else {
                                    echo "
                                        <div class='no-result'>
                                            <img src='images/no-result.png'>
                                            <h4>No Results Found</h4>
                                        </div>
                                    ";
                                }
                                
                            }
                        ?>
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