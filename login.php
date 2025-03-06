<?php

session_start();

$pageTitle = "Login Page";

// header
include 'includes/header.php';


//  Nav Bar 
include 'includes/navbar.php';


//
$messageText = '';
$messageType = '';

// Logical Section

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];


    // validation 
    if (empty($email) || empty($password)) {
        echo $email, $password;
        $message = 'All fields are required';
        $messageType = 'danger';
    }

    if (isset($_SESSION["users"][$email])) {
        $user_email = $_SESSION["users"][$email];
        
        if($user_email == $password) {
            $messageText = "Login Success";
            $messageType = "success";

            $_SESSION['logged_in_user'] = "Hello You are logged in";

            header("Location: dashboard.php");
        }
        else {
            $messageText = "Invalid Email or Password";
            $messageType = "danger";
        }
    }
    else {
        $messageText = "Invalid Email or Password";
        $messageType = "danger";
    }
}


?>

<!-- Registration Form -->

<div class="row mt-5">
    <div class="col-6 offset-md-3">

        <?php if ($messageText != '') { ?>
            <div class="alert alert-<?php echo $messageType ?> my-2" role="alert">
                <?php echo $messageText ?>
            </div>
        <?php } ?>

        <form method="POST" action="">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>


<?php
// footer
include 'includes/footer.php';
?>