<?php
$pageTitle = "Login Page";

// header
include 'includes/header.php';

  //  Nav Bar 
include 'includes/navbar.php';

$messageText = '';
$messageType = '';

// Logical Section

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

     $email = $_POST['email'];
     $password = $_POST['password'];

    // validation 
    if (empty($email) || empty($password)) {
         $messageText = 'All fields are required';
         $messageType = 'danger';
    } else {
        if (isset($_SESSION["users"][$email])) {

            $hashed_password = $_SESSION["users"][$email];
            
            if (password_verify($password, $hashed_password)) {
                $messageText = "Login Success";
                $messageType = "success";

                 $_SESSION['logged_in_user'] = $email;
                $_SESSION['loggedin'] = true;

                // Redirect to dashboard after 2 seconds using js setTimeout function
                echo "<script>
                        setTimeout(function() {
                            window.location.href = 'dashboard.php';
                        }, 2000);
                      </script>"
                    ;
            } else {
                $messageText = "Invalid Email or Password";
                $messageType = "danger";
            }
        } else {
            $messageText = "Invalid Email or Password";
            $messageType = "danger";
        }
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
