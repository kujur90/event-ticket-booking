<?php

	include 'includes/header.php';
	echo "<title>Event Ticket Booking System</title>";
?>

</head>
<!-- body -->

<body class="main-layout">

   <?php
		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/nav.php');
	?>

   <section class="slider_section">
      <div id="main_slider" class="carousel slide banner-main" data-ride="carousel">

         <div class="carousel-inner">
            <div class="carousel-item active text-center">
               <img class="first-slide" src="images/slides/2.jpg" style='width: 100%;'>
            </div>
            <div class="carousel-item">
               <img class="second-slide" src="images/slides/1.jpg" style='width: 100%;'>
            </div>
         </div>
         <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <i class='fa fa-angle-right'></i>
         </a>
         <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <i class='fa fa-angle-left'></i>
         </a>

      </div>

   </section>

   <!-- latest events -->
   <div class="events mt-5">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <div class="title">Latest Events</div>
               <div class="see-all">
                  <a href='//localhost/event-ticket-booking/all-events?event_type='>See All ></a>
               </div>
               <div class="row">
                  <?php
                     include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/database_connection.php');
                     $sql = "SELECT * FROM events ORDER BY event_id DESC LIMIT 4";
                     $result = $conn->query($sql);
                     while($row = mysqli_fetch_assoc($result)) {
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

   <!-- Music Events -->
   <div class="events mt-5" style='background-color: #f1f1f1; padding: 30px 0px;'>
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <div class="title">Musical Events</div>
               <?php
                  $sql = "SELECT * FROM events WHERE event_type = 'Music' ORDER BY event_id DESC LIMIT 4";
                  $result = $conn->query($sql);
                  $result2 = $conn->query($sql);
                  $row = mysqli_fetch_assoc($result);
               ?>
               <div class="see-all">
                  <a href="//localhost/event-ticket-booking/all-events.php?event_type=<?php echo $row['event_type'] ?>">See
                     All ></a>
               </div>
               <div class="row">
                  <?php
                     
                     while($row = mysqli_fetch_assoc($result2)) {
                        if($row['date'] > date('Y-m-d')){
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
                     }
                  ?>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Stand Up Events -->
   <div class="events mt-5">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <div class="title">Stand Up</div>
               <?php
                  $sql = "SELECT * FROM events WHERE event_type = 'Stand Up' ORDER BY event_id DESC LIMIT 4";
                  $result = $conn->query($sql);
                  $result2 = $conn->query($sql);
                  $row = mysqli_fetch_assoc($result);
               ?>
               <div class="see-all">
                  <a
                     href="//localhost/event-ticket-booking/all-events.php?event_type=<?php echo $row2['event_type'] ?>">See
                     All ></a>
               </div>
               <div class="row">
                  <?php                     
                     while($row = mysqli_fetch_array($result2)) {
                        if($row['date'] > date('Y-m-d')){
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
                     }
                  ?>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Talk Events -->
   <div class="events mt-5" style='background-color: #f1f1f1; padding: 30px 0px;'>
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <div class="title">Talks</div>
               <?php
                  $sql = "SELECT * FROM events WHERE event_type = 'Talks' ORDER BY event_id DESC LIMIT 4";
                  $result = $conn->query($sql);
                  $result2 = $conn->query($sql);
                  $row = mysqli_fetch_assoc($result);
               ?>
               <div class="see-all">
                  <a href="//localhost/event-ticket-booking/all-events.php?event_type=<?php echo $row['event_type'] ?>">See
                     All ></a>
               </div>
               <div class="row">
                  <?php
                     
                     while($row = mysqli_fetch_assoc($result2)) {
                        if($row['date'] > date('Y-m-d')){
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
                     }
                  ?>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Plays -->
   <div class="events mt-5">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <div class="title">Plays</div>
               <?php
                  $sql = "SELECT * FROM events WHERE event_type = 'Play' ORDER BY event_id DESC LIMIT 4";
                  $result = $conn->query($sql);
                  $result2 = $conn->query($sql);
                  $row = mysqli_fetch_assoc($result);
               ?>
               <div class="see-all">
                  <a href="//localhost/event-ticket-booking/all-events.php?event_type=<?php echo $row['event_type'] ?>">See
                     All ></a>
               </div>
               <div class="row">
                  <?php                     
                     while($row = mysqli_fetch_array($result2)) {
                        if($row['date'] > date('Y-m-d')){
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
                     }
                  ?>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Workshop -->
   <div class="events mt-5">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <div class="title">Workshop</div>
               <?php
                  $sql = "SELECT * FROM events WHERE event_type = 'Workshop' ORDER BY event_id DESC LIMIT 4";
                  $result = $conn->query($sql);
                  $result2 = $conn->query($sql);
                  $row = mysqli_fetch_assoc($result);
               ?>
               <div class="see-all">
                  <a href="//localhost/event-ticket-booking/all-events.php?event_type=<?php echo $row['event_type'] ?>">See
                     All ></a>
               </div>
               <div class="row">
                  <?php                     
                     while($row = mysqli_fetch_array($result2)) {
                        if($row['date'] > date('Y-m-d')){
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
                     }
                  ?>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Exhibition -->
   <div class="events mt-5" style='background-color: #f1f1f1; padding: 30px 0px;'>
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <div class="title">Exhibitions</div>
               <?php
                  $sql = "SELECT * FROM events WHERE event_type = 'Exhibition' ORDER BY event_id DESC LIMIT 4";
                  $result = $conn->query($sql);
                  $result2 = $conn->query($sql);
                  $row = mysqli_fetch_assoc($result);
               ?>
               <div class="see-all">
                  <a href="//localhost/event-ticket-booking/all-events.php?event_type=<?php echo $row['event_type'] ?>">See
                     All ></a>
               </div>
               <div class="row">
                  <?php
                     
                     while($row = mysqli_fetch_assoc($result2)) {
                        if($row['date'] > date('Y-m-d')){
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