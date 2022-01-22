<?php
    ob_start();
	include 'includes/header.php';
	echo "<title>Payment</title>";
?>

</head>
<!-- body -->

<body class="main-layout">

    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/nav.php');
    ?>
    <?php
        if (isset($_POST['submit'])) {

            include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/database_connection.php');
    
            $event_id = mysqli_real_escape_string($conn, $_POST['event_id']);
            $ticket_price = mysqli_real_escape_string($conn, $_POST['ticket_price']);
            $no_of_tickets = mysqli_real_escape_string($conn, $_POST['no_of_tickets']);
            $total_price = mysqli_real_escape_string($conn, $_POST['total_price']);

            

        } else {
            header("location:javascript://history.go(-1)");
        }
    
    ?>

    <?php
    if(isset($_SESSION['user_id'])) {
    echo "
    <div class='container shadow-sm rounded p-3'>
        <div class='row'>
            <div class='col-sm-7 m-3 p-3 bg-light'>
                <div class='row'>
                    <div class='col-sm-12'>
                        <h1>Debit/Credit Card</h1>
                        <form>
                            <div class='form-group'>
                            <input type='text' class='form-control' placeholder='Card Number'>
                            </div>
                        
                            <div class='form-group'>
                                <input type='text' class='form-control'  placeholder='Name on card'>
                            </div>
                            <div class='form-row'>
                                <div class='form-group col-md-8'>
                                    <input type='text' class='form-control' placeholder='Valid till (MM/YY)'>
                                </div>
                                <div class='form-group col-md-4'>
                                    <input type='text' class='form-control' placeholder='CVV'>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class='col-sm-4 m-3 p-3 bg-light'>
                <h4>Price Details</h4>
                <div class='row'>
                    <div class='col-sm-8'>
                        Ticket Price<br>
                        No of Tickets<br><br>
                        <b>Total Price</b>
                    </div>
                    <div class='col-sm-4'>
                        <div class='float-right text-right'>
                            <form action='//localhost/event-ticket-booking/user/includes/book.script.php' method='POST'>
                                <input type='hidden' name='event_id' value='$event_id'>
                                <input type='text' name='ticket_price' value='$ticket_price' readonly
                                    style='border:none; text-align:right; background:none;'>
                                <input type='text' name='no_of_tickets' value='$no_of_tickets' readonly
                                    style='border:none; text-align:right; background:none;'>
                                <br><br>
                                <input type='text' name='total_price' id='total_price' value='$total_price' readonly
                                    style='border:none; text-align:right; background:none; font-weight: bold;'>
                                <button type='submit' name='submit' class='btn btn-warning float-right mt-3'>Pay
                                    Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ";}
    
    ?>



</body>

</html>