<?php
ob_start();
require "../layouts/header.php";
require "../../config/config.php";

//  Redirect user to login page if not signed in
if (!isset($_SESSION['admin_name'])) {
  header("location: " . ADMINURL . "/admins/login-admins.php");
}

// Displaying all products from database
$products = $conn->query("SELECT * FROM products");
$products->execute();

$allProducts = $products->fetchAll(PDO::FETCH_OBJ);

ob_end_flush();
?>

<div class="container-fluid">

  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Products</h5>
          <a href="create-products.php" class="btn btn-primary mb-4 text-center float-right">Add New Product</a>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($allProducts as $product) : ?>
                <tr>
                  <th scope="row"><?php echo $product->id; ?></th>
                  <td><?php echo $product->name; ?></td>
                  <td><img src="../../images/<?php echo $product->image; ?>" style="width: 60px; height: 60px;"></td>
                  <td>$<?php echo $product->price; ?></td>
                  <td><?php echo $product->category; ?></td>
                  <td><a href="delete-products.php?id=<?php echo $product->id; ?>" class="btn btn-danger  text-center ">Delete</a></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require "../layouts/footer.php"; ?>