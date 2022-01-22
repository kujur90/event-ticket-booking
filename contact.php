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

   <div class="brand_color">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h2>Contact Us</h2>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- contact -->
   <div class="contact">
      <div class="container">
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
            } else if (strpos($url, 'success')!== false) {
               echo "
                  <div class='alert alert-info alert-dismissible fade show' role='alert'>
                     Message sent successfully!
                     <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                           <span aria-hidden='true'>&times;</span>
                     </button>
                  </div>";
         } 
         ?>
         <div class="row">
            <div class="col-md-12">

               <form action='includes/contact.script.php' method='post' class="main_form">
                  <div class="row">
                     <div class="col-sm-12">
                        <input class="form-control" placeholder="Your name" type="text" name="name" required>
                     </div>
                     <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <input class="form-control" placeholder="Email" type="text" name="email" required>
                     </div>
                     <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <input type='digit' maxlength='10' class="form-control" placeholder="Phone" name="phone"
                           required>
                     </div>
                     <div class="col-md-12">
                        <textarea class="textarea" placeholder="Message" name='message' required></textarea>
                     </div>
                     <div class=" col-md-12">
                        <button class="send" type='submit' name='submit'>Send</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!-- end contact -->

   <?php
		include($_SERVER['DOCUMENT_ROOT'].'/event-ticket-booking/includes/footer.php');
	?>
</body>

</html>