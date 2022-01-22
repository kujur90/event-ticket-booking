<?php
    session_start();

    if (isset($_POST['submit'])) {

        include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/database_connection.php');

        $event_id = mysqli_real_escape_string($conn, $_POST['event_id']);
        $ticket_price = mysqli_real_escape_string($conn, $_POST['ticket_price']);
        $no_of_tickets = mysqli_real_escape_string($conn, $_POST['no_of_tickets']);
        $total_price = mysqli_real_escape_string($conn, $_POST['total_price']);

        $payment_reference_id = mt_rand(10000000, 1000000000);
        //insrting booking data to database
        $sql = "INSERT INTO bookings ( event_id, user_id, no_of_tickets, total_price, payment_reference_id)
        VALUES ('$event_id', '$_SESSION[user_id]',  '$no_of_tickets', '$total_price', '$payment_reference_id')";
        $result = $conn->query($sql);
        if($conn->affected_rows != 0){
            header ("Location: //localhost/event-ticket-booking/payment-success");
        }else {
            echo "Internal Error 500!";
        }

    } else {
        header("location:javascript://history.go(-1)");
    }

?>