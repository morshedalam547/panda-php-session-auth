<?php
$pageTitle = "Edit Page";

//   header
include 'includes/header.php';

// Nav Bar 
include 'includes/navbar.php';


include 'includes/db.php';


$product_id = $_GET['id'] ?? null;


if (isset($product_id)) {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->execute(['id' => $product_id]);
    $product = $stmt->fetch();
}

$messageText = '';
$messageType = '';

// Logical Section
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE ? null : $_FILES['image'];

    // validate the form

    if (empty($title) || empty($description)) {
        $messageText = 'All fields are required';
        $messageType = 'danger';
    } else {
        if ($image) {
            $imgDirectiory = "uploads/";

            // check if the directioy exists
            if (!is_dir($imgDirectiory)) {
                mkdir($imgDirectiory, 0777, true);
            }

            $imgName = uniqid() . "_" . basename($image['name']);
            $imgPath = $imgDirectiory . $imgName;

            if (move_uploaded_file($image['tmp_name'], $imgPath)) {

                $stmt = $pdo->prepare("UPDATE products SET title = :title, description = :description, image = :image WHERE id = :id");

                if ($stmt->execute(['title' => $title, 'description' => $description, 'image' => $imgPath, 'id' => $product_id])) {
                    $messageText = 'Product Updated Successfully';
                    $messageType = 'success';
                } else {
                    $messageText = 'Database Insertion Failed';
                    $messageType = 'danger';
                }
            } else {
                $messageText = 'Image Upload Failed';
                $messageType = 'danger';
            }
        }else {
            $stmt = $pdo->prepare("UPDATE products SET title = :title, description = :description, image = :image WHERE id = :id");

            if ($stmt->execute(['title' => $title, 'description' => $description, 'image' => $product['image'], 'id' => $product_id])) {
                $messageText = 'Product Updated Successfully';
                $messageType = 'success';
            } else {
                $messageText = 'Database Insertion Failed';
                $messageType = 'danger';
            }
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
            <input type="text" class="form-control" name="title" value="<?php echo $product['title'] ?? ''; ?>">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Product Description</label>
            <textarea class="form-control" name="description" rows="3">
                <?php echo $product['description'] ?? ''; ?>
            </textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" class="form-control" name="image"></input>
            <img src="<?php echo $product['image'] ?? ''; ?>" alt="Product Image" class="img-thumbnail mt-2"
                style="width: 100px; height: 100px;">
        </div>
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
</div>

<?php
// footer
include 'includes/footer.php';
?>