<?php

$pageTitle = "Login Page";

// header
include 'includes/header.php';


//  Nav Bar 
include 'includes/navbar.php';



?>

<!-- Registration Form -->

<div class="row mt-5">
    <div class="col-6 offset-md-3">

        <h1 class="text-success">
            <?php
            if (isset($_SESSION["logged_in_user"])) {
                echo $_SESSION["logged_in_user"];
            }
            ?>
        </h1>

    </div>
</div>


<?php
// footer
include 'includes/footer.php';
?>