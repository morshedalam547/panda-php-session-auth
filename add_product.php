<?php
$pageTitle = "Add Page";

//   header
include 'includes/header.php';

// Nav Bar 
include 'includes/navbar.php';


include 'includes/db.php';

$messageText = '';
$messageType = '';

// Logical Section
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image'];

    // validate the form

    if (empty($title) || empty($description) || $image['error'] != UPLOAD_ERR_OK) {
        $messageText = 'All fields are required';
        $messageType = 'danger';
    } else {
        $imgDirectiory = "uploads/";

        // check if the directioy exists
        if (!is_dir($imgDirectiory)) {
            mkdir($imgDirectiory, 0777, true);
        }

        $imgName = uniqid() . "_" . basename($image['name']);
        $imgPath = $imgDirectiory . $imgName;

        if (move_uploaded_file($image['tmp_name'], $imgPath)) {

            $stmt = $pdo->prepare("INSERT INTO products (title, description, image) VALUES (:title, :description, :image)");


            if ($stmt->execute(['title' => $title,'description' => $description,'image' => $imgPath])) {
                $messageText = 'Product Added Successfully';
                $messageType = 'success';
            } else {
                $messageText = 'Database Insertion Failed';
                $messageType = 'danger';
            }
        } else {
            $messageText = 'Image Upload Failed';
            $messageType = 'danger';
        }
    }
}
?>

<!-- Registration Form -->
<div class="row mt-5"></div>
<div class="col-6 offset-md-3">
    <?php if ($messageText != '') { ?>
        <div class="alert alert-<?php echo $messageType ?> my-2" role="alert">
            <?php echo $messageText ?>
        </div>
    <?php } ?>

    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Product Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Product Description</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" class="form-control" name="image"></input>
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>
</div>

<?php
// footer
include 'includes/footer.php';
?>