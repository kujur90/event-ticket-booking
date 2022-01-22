<?php
    ob_start();
	include 'includes/header.php';
	echo "<title>Checkout</title>";
?>

</head>
<!-- body -->

<body class="main-layout">

    <?php
		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/nav.php');

        include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/database_connection.php');
        $event_id = $_GET['eventid'];
        $sql = "SELECT * FROM events WHERE event_id = '$event_id'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);

        if(isset($_SESSION['user_id'])) {
            echo "
                <div class='container shadow-sm rounded p-3'>
                    <div class='row'>
                        <div class='col-sm-7 m-3 p-3 bg-light'>
                            <div class='row'>
                                <div class='col-sm-8'>
                                    <div class='row'>
                                        <div class='col-sm-1'>
                                            <i class='fas fa-ticket-alt'></i>
                                        </div>
                                        <div class='col-sm-10'>
                                            <h4>$row[event_name]</h4>
                                            <h6>$row[hosted_by] - $row[event_type]</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-sm-4'>
                                    <div class='float-right'>
                                        <div style='color: black; font-weight:bold;'>
                                            &#x20B9; $row[price]
                                        </div>
                                    </div>
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
                                        
                                        <form action='payment.php' method='POST'>
                                            <input type='hidden' name='event_id' value='$event_id'>
                                            <input type='text' name='ticket_price' value='$row[price]' readonly
                                                style='border:none; text-align:right; background:none;'>
                                            <select name='no_of_tickets' style='height: 20px !important;' onchange='updatePrice(this.value)'>
                                                <option selected>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                            <br><br>
                                            <input type='text' name='total_price' id='total_price' value='$row[price]' readonly
                                                style='border:none; text-align:right; background:none; font-weight: bold;'>
                                            <button class='btn btn-warning float-right mt-3' type='submit' name='submit'>Continue</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ";
        } else {    
            header ("Location: //localhost/event-ticket-booking/user/login.php");
        }
		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/footer.php');
	?>

    <script type="text/javascript">
        function updatePrice(val) {
            let total_price = val * "<?php echo $row['price']; ?>";
            document.getElementById("total_price").value = total_price;
        }
    </script>
</body>

</html>