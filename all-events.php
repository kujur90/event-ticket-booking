<?php

	include 'includes/header.php';
	echo "<title>All Events</title>";
?>

</head>
<!-- body -->

<body class="main-layout">

   <?php
		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/nav.php');
	?>

   <div class="events mt-5">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <div class="title"><?php echo $_GET['event_type'] ?> Events</div>
               <div class="row">
                  <?php
                        include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/database_connection.php');
                        if(empty($_GET['event_type'])){
                           $sql = "SELECT * FROM events ORDER BY event_id DESC ";
                        }else {
                           $sql = "SELECT * FROM events WHERE event_type = '$_GET[event_type]' ORDER BY event_id DESC ";
                        }
                        $result = $conn->query($sql);
                        while($row = mysqli_fetch_array($result)) {
                        echo"
                        <div class='col-sm-3 mt-5'>
                           <a href='event-details.php?eventid=$row[event_id]'>
                              <div class='event-card'>
                                 <div class='card' style='width: 15rem; border:none;'>
                                    <img src='images/event-images/$row[event_id].jpg' class='card-img-top'>
                                    <div class='card-body' style='padding: 0px;'>
                                       <h5 class='card-title'>$row[event_name]</h5>
                                       <p class='card-text'>$row[event_type] - $row[hosted_by]</p>
                                    </div>
                                 </div>
                              </div>
                           </a>
                        </div>";
                     }
                  ?>
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