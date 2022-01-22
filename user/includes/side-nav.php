<?php
    $filename = basename($_SERVER["SCRIPT_FILENAME"], '.php');
?>
<div class="side_nav shadow-sm rounded">
    <ul>
        <a href="bookings">
            <li <?php echo ($filename == 'bookings') ? 'class="side-nav-active"' : ''; ?>><i
                    class="fas fa-ticket-alt"></i>
                Bookings
            </li>
        </a>
        <a href="account">
            <li <?php echo ($filename == 'account') ? 'class="side-nav-active"' : ''; ?>><i class="fas fa-user"></i>
                Account</li>
        </a>
    </ul>
</div>