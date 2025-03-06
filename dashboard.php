<?php
$pageTitle = "Dashboard";

// header
include 'includes/header.php';

// Nav Bar 
include 'includes/navbar.php';
?>

<!-- Dashboard Content -->
<div class="row mt-5">
    <div class="col-6 offset-md-3">
        <?php if (isset($_SESSION["logged_in_user"])): ?>
            <h1 class="text-success">
                Welcome, <?php echo $_SESSION["logged_in_user"]; ?>
            </h1>
        <?php else: ?>
            <h1 class="text-danger">
                You are not logged in.
            </h1>
        <?php endif; ?>
    </div>
</div>

<?php
// footer
include 'includes/footer.php';
?>
