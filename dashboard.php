<?php
$pageTitle = "Dashboard";

// header
include 'includes/header.php';

// Nav Bar 
include 'includes/navbar.php';



// all products

$products = [
    [
        'title' => 'Panda T-Shirt',
        'description' => 'This is dedicated to all panda fans. Get your panda t-shirt now.',
        'image' => 'https://placehold.co/400x400'
    ],
    [
        'title' => 'Fox T-Shirt',
        'description' => 'This is dedicated to all Fox fans. Get your Fox t-shirt now.',
        'image' => 'https://placehold.co/400x400'
    ],
    [
        'title' => 'Cat T-Shirt',
        'description' => 'This is dedicated to all Cat fans. Get your Cat t-shirt now.',
        'image' => 'https://placehold.co/400x400'
    ],
    [
        'title' => 'Lion T-Shirt',
        'description' => 'This is dedicated to all Lion fans. Get your Lion t-shirt now.',
        'image' => 'https://placehold.co/400x400'
    ],
    [
        'title' => 'Cat T-Shirt',
        'description' => 'This is dedicated to all Cat fans. Get your Cat t-shirt now.',
        'image' => 'https://placehold.co/400x400'
    ],
    [
        'title' => 'Lion T-Shirt',
        'description' => 'This is dedicated to all Lion fans. Get your Lion t-shirt now.',
        'image' => 'https://placehold.co/400x400'
    ],
    [
        'title' => 'Lion T-Shirt',
        'description' => 'This is dedicated to all Lion fans. Get your Lion t-shirt now.',
        'image' => 'https://placehold.co/400x400'
    ],
    [
        'title' => 'Cat T-Shirt',
        'description' => 'This is dedicated to all Cat fans. Get your Cat t-shirt now.',
        'image' => 'https://placehold.co/400x400'
    ],
    [
        'title' => 'Lion T-Shirt',
        'description' => 'This is dedicated to all Lion fans. Get your Lion t-shirt now.',
        'image' => 'https://placehold.co/400x400'
    ],
    [
        'title' => 'Lion T-Shirt',
        'description' => 'This is dedicated to all Lion fans. Get your Lion t-shirt now.',
        'image' => 'https://placehold.co/400x400'
    ],
    [
        'title' => 'Cat T-Shirt',
        'description' => 'This is dedicated to all Cat fans. Get your Cat t-shirt now.',
        'image' => 'https://placehold.co/400x400'
    ],
    [
        'title' => 'Lion T-Shirt',
        'description' => 'This is dedicated to all Lion fans. Get your Lion t-shirt now.',
        'image' => 'https://placehold.co/400x400'
    ],
    [
        'title' => 'Lion T-Shirt',
        'description' => 'This is dedicated to all Lion fans. Get your Lion t-shirt now.',
        'image' => 'https://placehold.co/400x400'
    ],
    [
        'title' => 'Cat T-Shirt',
        'description' => 'This is dedicated to all Cat fans. Get your Cat t-shirt now.',
        'image' => 'https://placehold.co/400x400'
    ],
    [
        'title' => 'Lion T-Shirt',
        'description' => 'This is dedicated to all Lion fans. Get your Lion t-shirt now.',
        'image' => 'https://placehold.co/400x400'
    ],
];



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
        $counter = 0;
        $colNum = 12;

        foreach ($_SESSION['products'] as $product) {

            if ($counter == 1) {
                $colNum = 6;
            } elseif ($counter == 2) {
                $colNum = 4;
            } elseif ($counter > 3 && $counter < 5) {
                $colNum = 3;
            } elseif ($counter > 6 && $counter < 11) {
                $colNum = 2;
            }

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
                    </div>
                </div>
            </div>


            <?php
            $counter++;
            }
        ?>


        <p>
            <?php
            echo $counter;
            ?>
        </p>


    </div>
</div>

<?php
// footer
include 'includes/footer.php';
?>