<?php
    ob_start();
	include 'includes/header.php';
	echo "<title>Payment Success</title>";
?>

</head>
<!-- body -->

<body class="main-layout">

    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/nav.php');
    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    <img src="//localhost/event-ticket-booking/images/payment-success.png" style="width: 100px;" alt="">
                    <h2 class='mt-4'>Payment Success</h2>
                    <a href='//localhost/event-ticket-booking/user/bookings'>
                        <button class='mt-4 btn btn-warning'>View Booking</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/footer.php');
	?>
</body>

</html>