<?php require "layouts/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php

//  Redirect user to login page if not signed in
if (!isset($_SESSION['admin_name'])) {
  header("location: " . ADMINURL . "/admins/login-admins.php");
}


// Products
$products = $conn->query("SELECT COUNT(*) AS count_products FROM products");
$products->execute();

$productsCount = $products->fetch(PDO::FETCH_OBJ);

// Orders
$orders = $conn->query("SELECT COUNT(*) AS count_orders FROM orders");
$orders->execute();

$ordersCount = $orders->fetch(PDO::FETCH_OBJ);

// Bookings
$bookings = $conn->query("SELECT COUNT(*) AS count_bookings FROM bookings");
$bookings->execute();

$bookingsCount = $bookings->fetch(PDO::FETCH_OBJ);

// Admins
$admins = $conn->query("SELECT COUNT(*) AS count_admins FROM admins");
$admins->execute();

$adminsCount = $admins->fetch(PDO::FETCH_OBJ);

// Reviews
$reviews = $conn->query("SELECT COUNT(*) AS count_reviews FROM reviews");
$reviews->execute();

$reviewsCount = $reviews->fetch(PDO::FETCH_OBJ);

// Users
$users = $conn->query("SELECT COUNT(*) AS count_users FROM users");
$users->execute();

$usersCount = $users->fetch(PDO::FETCH_OBJ);

?>

<div class="container-fluid">
  <div class="row">

    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Products</h5>

          <p class="card-text">number of products: <?php echo $productsCount->count_products; ?></p>

        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Orders</h5>

          <p class="card-text">number of orders: <?php echo $ordersCount->count_orders; ?></p>

        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Bookings</h5>

          <p class="card-text">number of bookings: <?php echo $bookingsCount->count_bookings; ?></p>

        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Admins</h5>

          <p class="card-text">number of admins: <?php echo $adminsCount->count_admins; ?></p>

        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Reviews</h5>

          <p class="card-text">number of reviews: <?php echo $reviewsCount->count_reviews; ?></p>

        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Users</h5>

          <p class="card-text">number of users: <?php echo $usersCount->count_users; ?></p>

        </div>
      </div>
    </div>

  </div>
</div>

<?php require "layouts/footer.php"; ?>