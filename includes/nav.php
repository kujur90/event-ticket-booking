<!-- header -->
<header>
    <!-- header inner -->
    <div class="header shadow-sm">
        <div class="container">
            <div class="row" style='margin-top: 10px; margin-bottom: -20px;'>
                <div class="col-sm-2 col logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo"> <a href="//localhost/event-ticket-booking/index"><img
                                        src="//localhost/event-ticket-booking/images/logo.jpg" alt="logo" /></a> </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 search-box">
                    <form action="//localhost/event-ticket-booking/search.php" method='GET'>
                        <input type="text" placeholder="Search" name='query'>
                        <button type='submit'><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <?php
                    $filename = basename($_SERVER["SCRIPT_FILENAME"], '.php');
                ?>
                <div class="col-sm-4" style='margin-right: 20px;'>
                    <div class="menu-area">
                        <div class="limit-box">
                            <nav class="main-menu">
                                <ul class="menu-area-main">
                                    <li <?php echo ($filename == 'index') ? 'class="active"' : ''; ?>> <a
                                            href="//localhost/event-ticket-booking/index">Home</a>
                                    </li>
                                    <li <?php echo ($filename == 'about') ? 'class="active"' : ''; ?>> <a
                                            href="//localhost/event-ticket-booking/about">About</a> </li>
                                    <li <?php echo ($filename == 'contact') ? 'class="active"' : ''; ?>> <a
                                            href="//localhost/event-ticket-booking/contact">Contact</a> </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1 loginButton">
                    <?php
                    if(isset($_SESSION['user_id'])) {
                        echo"
                        <div class='dropdown show mt-3'>
                            <div class='dropdown'>
                            <button class='btn btn-warning dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                Hi! $_SESSION[firstname]
                            </button>
                            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                <a class='dropdown-item' href='//localhost/event-ticket-booking/user/bookings'>Bookings</a>
                                <a class='dropdown-item' href='#'>Another action</a><hr>
                                <form action='//localhost/event-ticket-booking/includes/logout.script.php' method='POST'>
                                    <button style='background:none; width: 100%; text-align:center;' name='submit'><i class='fas fa-power-off'></i> Logout</button>
                                </form>
                            </div>
                        </div>
                        </div>
                        ";
                    } 
                    else if(isset($_SESSION['organizer_id'])) {
                        echo"
                        <div class='dropdown show mt-3'>
                            <div class='dropdown'>
                            <button class='btn btn-warning dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                Hi! $_SESSION[firstname]
                            </button>
                            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                <a class='dropdown-item' href='//localhost/event-ticket-booking/organizer/dashboard'>Dashboard</a><hr>
                                <form action='//localhost/event-ticket-booking/includes/logout.script.php' method='POST'>
                                    <button style='background:none; width: 100%; text-align:center;' name='submit'><i class='fas fa-power-off'></i> Logout</button>
                                </form>
                            </div>
                        </div>
                        </div>";
                    }
                    else if(isset($_SESSION['admin_id'])) {
                        echo"
                        <div class='dropdown show mt-3'>
                            <div class='dropdown'>
                            <button class='btn btn-warning dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                Hi! $_SESSION[firstname]
                            </button>
                            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                <a class='dropdown-item' href='//localhost/event-ticket-booking/admin/dashboard'>Dashboard</a><hr>
                                <form action='//localhost/event-ticket-booking/includes/logout.script.php' method='POST'>
                                    <button style='background:none; width: 100%; text-align:center;' name='submit'><i class='fas fa-power-off'></i> Logout</button>
                                </form>
                            </div>
                        </div>
                        </div>";
                    }
                    else{
                       echo "<li><a class='buy' href='//localhost/event-ticket-booking/user/login'>Login</a></li>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- end header inner -->
</header>
<!-- end header -->