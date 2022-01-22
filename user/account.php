<?php
    ob_start();
	include ($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/header.php');
	echo "<title>Account</title>";
?>

</head>
<!-- body -->

<body class="main-layout">
    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/nav.php');
        if(!isset($_SESSION['user_id'])){
            header ("Location: //localhost/event-ticket-booking/user/login?not-loggedin");
        }
	?>

    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-2">
                <?php
                    include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/user/includes/side-nav.php');
                    include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/database_connection.php');
                    $sql = "SELECT * FROM users WHERE u_id = '$_SESSION[user_id]'";
                    // $sql = "SELECT * FROM citys LEFT JOIN comments ON comments.city=citys.city WHERE citys.id=$id";
                    $result = $conn->query($sql);
                    $row = mysqli_fetch_assoc($result);
                ?>
            </div>
            <div class="col-sm-10">
                <div class="shadow p-5 rounded">
                    <h2>Personal Information</h2>
                    <form action="includes/create-event-script.php" method="POST" enctype='multipart/form-data'>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="event_name"
                                    value='<?php echo $row['firstname'] ?>' disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Lastname</label>
                                <input type="text" name="hosted_by" class="form-control"
                                    value='<?php echo $row['lastname'] ?>' disabled>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="text" class="form-control" value='<?php echo $row['email'] ?>' disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Phone</label>
                                <input type="text" class="form-control" value='<?php echo $row['phone'] ?>' disabled>
                            </div>
                        </div>
                    </form>
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