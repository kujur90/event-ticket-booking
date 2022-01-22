<?php
    $filename = basename($_SERVER["SCRIPT_FILENAME"], '.php');
?>

<div class="side_nav shadow-sm rounded">
    <ul>
        <a href="dashboard">
            <li <?php echo ($filename == 'dashboard') ? 'class="side-nav-active"' : ''; ?>><i
                    class="fas fa-tachometer-alt"></i> Dashboard</li>
        </a>
        <a href="all-events">
            <li <?php echo ($filename == 'all-events') ? 'class="side-nav-active"' : ''; ?>><i
                    class="fas fa-ticket-alt"></i> All Events
            </li>
        </a>
        <a href="organizers">
            <li <?php echo ($filename == 'organizers') ? 'class="side-nav-active"' : ''; ?>><i
                    class="fas fa-user-tie"></i> Organizers
            </li>
        </a>
        <a href="contact-messages">
            <li <?php echo ($filename == 'contact-messages') ? 'class="side-nav-active"' : ''; ?>><i
                    class="fas fa-comment-dots"></i>
                Messages</li>
        </a>
        <a href="account">
            <li <?php echo ($filename == 'account') ? 'class="side-nav-active"' : ''; ?>><i class="fas fa-user"></i>
                Account</li>
        </a>
    </ul>
</div>