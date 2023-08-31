<?php
ob_start();
require "../layouts/header.php";
require "../../config/config.php";

//  Redirect user to login page if not signed in
if (!isset($_SESSION['admin_name'])) {
  header("location: " . ADMINURL . "/admins/login-admins.php");
}

// Displaying all orders from database
$orders = $conn->query("SELECT * FROM orders");
$orders->execute();

$allOrders = $orders->fetchAll(PDO::FETCH_OBJ);
ob_end_flush();
?>


<div class="container-fluid">

  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Orders</h5>

          <table class="table">
            <thead>
              <tr>
                <!-- <th scope="col">#</th> -->
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Town</th>
                <th scope="col">State</th>
                <th scope="col">Zip Code</th>
                <th scope="col">Phone</th>
                <th scope="col">Street Address</th>
                <th scope="col">Total Price</th>
                <th scope="col">Status</th>
                <th scope="col">Update Status</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($allOrders as $order) : ?>
                <tr>
                  <!-- <th scope="row"><?php echo $order->id; ?></th> -->
                  <td><?php echo $order->first_name; ?></td>
                  <td><?php echo $order->last_name; ?></td>
                  <td><?php echo $order->town; ?></td>
                  <td><?php echo $order->state; ?></td>
                  <td><?php echo $order->zip_code; ?></td>
                  <td><?php echo $order->phone; ?></td>
                  <td><?php echo $order->street_address; ?></td>
                  <td>$<?php echo $order->total_price; ?></td>
                  <td><?php echo $order->status; ?></td>
                  <td><a href="change-status.php?id=<?php echo $order->id; ?>" class="btn btn-warning text-white text-center ">Update Status</a></td>
                  <td><a href="delete-orders.php?id=<?php echo $order->id; ?>" class="btn btn-danger  text-center ">Delete</a></td>
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