<?php

	include ($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/header.php');
	echo "<title>Event Ticket Booking System</title>";
?>

</head>
<!-- body -->

<body class="main-layout">

    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/nav.php');
	?>

    <div class="container">
        <div class="row mt-3" style='width: 200px; margin: auto;
            width: 50%;
            padding: 10px;'>
            <div class="col-sm-12 shadow p-5 rounded">
                <form action="includes/login.script.php" method="POST">
                    <h2>Admin Login</h2>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                    <!-- &nbsp; &nbsp; Don't have an account? Register <a
                        href="//localhost/event-ticket-booking/admin/register.php">here</a> -->
                </form>
            </div>
        </div>
    </div>
    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/footer.php');
	?>
</body>

</html>