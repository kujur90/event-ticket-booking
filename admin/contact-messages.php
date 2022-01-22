<?php

	include ($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/header.php');
	echo "<title>Organizers</title>";
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
                    ?>
            </div>
            <div class="col-sm-10">
                <div class="row">
                    <?php
                        include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/database_connection.php');
                        $sql = "SELECT * FROM contact ORDER BY id DESC";
                        $result = $conn->query($sql);
                        if (mysqli_num_rows($result) > 0) {
                            echo "
                            <table class='table shadow-sm rounded'>
                                <thead class='thead-dark'>
                                    <tr>
                                        <th scope='col'>Name</th>
                                        <th scope='col'>Email</th>
                                        <th scope='col'>Phone</th>
                                        <th scope='col'>Message</th>
                                    </tr>
                                </thead>
                                <tbody>";
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo"<tr>
                                            <th>$row[name]</th>
                                            <th>$row[email]</th>
                                            <td>$row[phone]</td>                                            
                                            <td>$row[message]</td>                                            
                                        </tr>";
                                }
                                echo"
                                </tbody>
                                </table>";
                                    
                        } else {
                            echo "<img class='image-center' src='//localhost/event-ticket-booking/images/empty.svg' alt='empty'>
                            <h3 class='text-center mt-3 font-weight-bold'>No Events Found!</h3>";
                        
                        }
                        ?><br>
                </div>
            </div>
        </div>
    </div>
    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/footer.php');
	?>
</body>

</html>