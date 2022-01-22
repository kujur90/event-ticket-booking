<?php

	include ($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/header.php');
	echo "<title>Organizer Details</title>";
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
                    include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/database_connection.php');

                    $sql = "SELECT * FROM organizer_details JOIN organizer_login on organizer_login.o_id = organizer_details.o_id WHERE organizer_details.o_id = '$_GET[oid]'";
                    $result = $conn->query($sql);
                    $row = mysqli_fetch_assoc($result);
                ?>
            </div>
            <div class="col-sm-10">
                <div class="shadow p-5 rounded">
                    <h2>Organizer Information</h2>
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Organizer Id</label>
                                <input type="text" class="form-control" value='<?php echo $row['o_id'] ?>' disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="text" class="form-control" value='<?php echo $row['email'] ?>' disabled>
                            </div>
                        </div>
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
                                <label>Company</label>
                                <input type="text" class="form-control" name="event_name"
                                    value='<?php echo $row['company'] ?>' disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Phone</label>
                                <input type="text" class="form-control" value='<?php echo $row['phone'] ?>' disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Area</label>
                                <input type="text" class="form-control" value='<?php echo $row['address_area'] ?>'
                                    disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Locality</label>
                                <input type="text" class="form-control" value='<?php echo $row['address_locality'] ?>'
                                    disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>City</label>
                                <input type="text" class="form-control" value='<?php echo $row['address_city'] ?>'
                                    disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label>State</label>
                                <input type="text" class="form-control" value='<?php echo $row['address_state'] ?>'
                                    disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>PIN</label>
                                <input type="text" class="form-control" value='<?php echo $row['address_pin'] ?>'
                                    disabled>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script type='text/javascript'>
        function viewAddressField(mode) {
            if (mode === "Choose...") {
                document.getElementById("addressFields").style.display = "none";
            } else if (mode === 'Offline') {
                document.getElementById("addressFields").style.display = "block";
            } else if (mode === "Online") {
                document.getElementById("addressFields").style.display = "none";
            }
        }
    </script>
    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/footer.php');
	?>
</body>

</html>