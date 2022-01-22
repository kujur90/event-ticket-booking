<?php
    ob_start();
	include ($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/header.php');
	echo "<title>Event Ticket Booking System</title>";
?>

</head>
<!-- body -->

<body class="main-layout">

    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/nav.php');

        if(isset($_SESSION['user_id'])){
            header ("Location: //localhost/event-ticket-booking/user/bookings");
        } else  if(isset($_SESSION['organizer_id'])){
            header ("Location: //localhost/event-ticket-booking/organizer/dashboard");
        }  if(isset($_SESSION['admin_id'])){
            header ("Location: //localhost/event-ticket-booking/admin/dsahboard");
        }
	?>

    <div class="container pt-3">
        <?php
            $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            if (strpos($url, 'error')!== false) {
                echo "
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Something went wrong!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
            } elseif (strpos($url, 'success')!== false) {
                echo "
                    <div class='alert alert-info alert-dismissible fade show' role='alert'>
                        Registration Successful. Login Now
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
            } 
            elseif (strpos($url, 'wrong')!== false) {
                echo "
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Email or password is wrong!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
            } 
        ?>
        <div class="row mt-3">
            <div class="col-sm-6 shadow p-5 rounded">
                <form action="includes/login.script.php" method="POST">
                    <h2>User Login</h2>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-warning">Login</button>
                    &nbsp; &nbsp; Don't have an account? Register <a
                        href="//localhost/event-ticket-booking/user/register.php">here</a>
                </form>
            </div>

            <div class="col-sm-6 shadow p-5 rounded">
                <form action="//localhost/event-ticket-booking/organizer/includes/login.script.php" method="POST">
                    <h2>Organizer Login</h2>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-warning">Login</button>
                    &nbsp; &nbsp; Don't have an account? Register <a
                        href="//localhost/event-ticket-booking/organizer/register.php">here</a>
                </form>
            </div>
        </div>
    </div>
    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/footer.php');
	?>
</body>

</html>