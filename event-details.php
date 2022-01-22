<?php

	include 'includes/header.php';
	echo "<title>Event Ticket Booking System</title>";
?>

</head>
<!-- body -->

<body class="main-layout">

    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/nav.php');
	?>

    <div class="container bg-light shadow-sm rounded mt-4 p-3">
        <div class="row">
            <div class="col-sm-12">
                <?php
                    include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/database_connection.php');
                    $event_id = $_GET['eventid'];
                    $sql = "SELECT * FROM events WHERE event_id = '$event_id'";
                    $result = $conn->query($sql);
                    $row = mysqli_fetch_assoc($result);

                    $sql2 = "SELECT * FROM bookings WHERE event_id = '$event_id'";
                    $result2= $conn->query($sql2);
                    $tickets_left = 0;
                    while($row2 = mysqli_fetch_assoc($result2)) {
                        $tickets_left = $tickets_left + $row2['no_of_tickets'];
                    }
                    $total_tickets_left = $row['max_tickets'] - $tickets_left;
                    
                    echo "
                    <img class='mb-4' src='images/event-images/$row[event_id].jpg' style='width: 100%;'><br/>
                    <h2 class='d-inline'>$row[event_name]</h2>
                    <div class='float-right d-inline'>
                        <h3 class='d-inline font-weight-bold'> &#x20B9; $row[price] &nbsp;</h3>";
                ?>
                <?php
                    if($total_tickets_left == 0){
                        echo "
                                <button type='button' class='btn btn-disabled pr-4 pl-4' style='cursor: no-drop;' data-toggle='tooltip' data-placement='top' title='Tickets have sold out'>
                                Book
                                </button>
                            ";
                    } else {
                        echo "
                        <a href='checkout.php?eventid=$row[event_id]'>
                            <button class='btn btn-warning  pr-4 pl-4'>Book</button>
                        </a>";
                    }
                    echo"
                        
                        <br/>
                    </div>
                    <h4>$row[event_type] | $row[duration] Hour  <div class='tickets-left'>$total_tickets_left ticket(s) left!</div></h4>
                    <hr>'
                    <h4><i class='far fa-calendar-alt'></i> $row[date] - <i class='far fa-clock'></i> "; 
                        $time = $row['time'];
                        echo date('h:i a', strtotime($time));                        
                    echo "</h4>
                    <br>
                    <div class='row'>
                        <div class='col-sm-2 bg-white m-2 p-3 shadow-sm'>
                            <h4><b>Hosted By</b></h4>
                            <h3>$row[hosted_by]</h3><br>
                            <h4 class='text-secondary'><b>Share this event</b></h4>
                            <h1 class='text-secondary'>
                                <i class='fab fa-twitter mr-3'></i> 
                                <i class='fab fa-facebook-f mr-3'></i> 
                                <i class='mr-3 fab fa-whatsapp'></i>
                            </h1>
                        </div>
                        <div class='col-sm-6 bg-white p-3 m-2 rounded shadow-sm'>
                            <h4><b>About the event</b></h4>
                            <p>$row[about]</p>
                        </div>
                        <div class='col-sm-3 bg-white p-3 m-2 rounded shadow-sm'>";
                       ?>
                <?php
                            if($row['address_area'] == null){
                                echo "
                                    <h4><b><i class='fas fa-film' style='color: #FF6666;'></i> Online Event</b></h4>
                                    <p>
                                        Link will be shared after booking on your registered email.
                                    </p>
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
                        
                        echo"
                        </div>
                    </div>            
                    ";
                ?>
            </div>
        </div>
    </div>




    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/footer.php');
	?>
</body>

</html>