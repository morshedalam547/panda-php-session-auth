<?php
session_start();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="index.php"></a>
            <img src="../assets/img/panda.png" alt="Panda Logo" style="height: 60px; margin-right: 10px;">
            Panda Auth
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                <?php } ?>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-danger ms-2" href="logout.php">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary ms-2" href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-success ms-2" href="login.php">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>