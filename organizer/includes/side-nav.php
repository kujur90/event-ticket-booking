<?php
    $filename = basename($_SERVER["SCRIPT_FILENAME"], '.php');
?>

<div class="side_nav shadow-sm rounded">
    <ul>
        <a href="dashboard">
            <li <?php echo ($filename == 'dashboard') ? 'class="side-nav-active"' : ''; ?>><i
                    class="fas fa-tachometer-alt"></i> Dashboard</li>
        </a>
        <a href="create-event">
            <li <?php echo ($filename == 'create-event') ? 'class="side-nav-active"' : ''; ?>><i
                    class="fas fa-ticket-alt"></i> Create Event
            </li>
        </a>
        <a href="all-events">
            <li <?php echo ($filename == 'all-events') ? 'class="side-nav-active"' : ''; ?>><i
                    class="fas fa-layer-group"></i> All Events
            </li>
        </a>
        <a href="account">
            <li <?php echo ($filename == 'account') ? 'class="side-nav-active"' : ''; ?>><i class="fas fa-user"></i>
                Account</li>
        </a>
    </ul>
</div>