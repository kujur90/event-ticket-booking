<?php

	include ($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/header.php');
	echo "<title>Organizer Register</title>";
?>

</head>
<!-- body -->

<body class="main-layout">

    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/nav.php');
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
            } elseif (strpos($url, 'email-exists')!== false) {
                echo "
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Email already exists!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
            } 
            elseif (strpos($url, 'phone-exists')!== false) {
                echo "
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Phone already exists!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
            } 
        ?>
        <div class="row mt-3">
            <div class="col-sm-12 shadow p-5 rounded">
                <form action="includes/register.script.php" method="POST">
                    <h2>Organization Registration</h2>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Firstname</label>
                            <input type="text" class="form-control" name="firstname" placeholder="Firstname" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Lastname</label>
                            <input type="text" class="form-control" name="lastname" placeholder="Lastname" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Company</label>
                            <input type="text" class="form-control" name="company" placeholder="Company (Optional)">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="text" class="form-control" name="phone" placeholder="Phone" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Area</label>
                            <input type="text" class="form-control" name="area" placeholder="Area" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Locality</label>
                            <input type="text" class="form-control" name="locality" placeholder="Locality" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>City</label>
                            <input type="text" class="form-control" name="city" placeholder="City" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>State</label>
                            <input type="text" class="form-control" name="state" placeholder="State" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Pin</label>
                            <input type="text" class="form-control" name="pin" placeholder="PIN" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>

                    <button type="submit" name="submit" class="btn btn-warning">Register</button>
                    &nbsp; &nbsp; Already have an account? Login <a
                        href="//localhost/event-ticket-booking/user/login.php">here</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>