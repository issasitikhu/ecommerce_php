<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Not logged in, redirect to login page
    header("Location: login.php");
    exit;
}

include('header.php');
?>

<div style="text-align:center; margin-top:50px;">
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['admin_name']); ?>!</h1>
    <p>This is the admin home page.</p>
    <a href="logout.php">Logout</a>
</div>

<?php include('footer.php'); ?>
