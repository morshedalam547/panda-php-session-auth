<?php
$pageTitle = "Delete Page Page";

//   header
include 'includes/header.php';

// Nav Bar 
include 'includes/navbar.php';


include 'includes/db.php';


$product_id = $_GET['id'] ?? null;


if (isset($product_id)) {
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = :id");
    if($stmt->execute(['id' => $product_id])){
        header('Location: dashboard.php');
        exit;
    }
}


// footer
include 'includes/footer.php';
?>