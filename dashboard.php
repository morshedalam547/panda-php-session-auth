<?php
$pageTitle = "Dashboard";

// header
include 'includes/header.php';

// Nav Bar 
include 'includes/navbar.php';

include 'includes/db.php';
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


<div class="mt-5">
    <div class="row g-5">

        <?php

        $stmt = $pdo->query("SELECT * FROM products");
        $products = $stmt->fetchAll();

        foreach ($products as $product) {

        ?>

            <div class="col-md-<?php echo $colNum ?>">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"> <?php echo $product['title']; ?></h5>
                        <p class="card-text">
                            <?php echo $product['description']; ?>
                        </p>
                        <a href="#" class="btn btn-primary">View Details</a>
                        <a href="edit_product.php?id=<?php echo $product['id'] ?>" class="btn btn-primary">Edit Product</a>
                        <a href="delete_product.php?id=<?php echo $product['id'] ?>" class="btn btn-danger">Delete Product</a>
                    </div>
                </div>
            </div>


        <?php
        }
        ?>
    </div>
</div>

<?php
// footer
include 'includes/footer.php';
?>