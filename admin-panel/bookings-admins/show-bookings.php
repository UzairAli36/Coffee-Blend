<?php
ob_start();
require "../layouts/header.php";
require "../../config/config.php";

//  Redirect user to login page if not signed in
if (!isset($_SESSION['admin_name'])) {
  header("location: " . ADMINURL . "/admins/login-admins.php");
}

// Displaying all bookings from database
$bookings = $conn->query("SELECT * FROM bookings");
$bookings->execute();

$allBookings = $bookings->fetchAll(PDO::FETCH_OBJ);

ob_end_flush();
?>

<div class="container-fluid">

  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Bookings</h5>

          <table class="table">
            <thead>
              <tr>
                <!-- <th scope="col">#</th> -->
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Phone</th>
                <th scope="col">Message</th>
                <th scope="col">Status</th>
                <th scope="col">Update Status</th>
                <th scope="col">Created</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($allBookings as $booking) : ?>
                <tr>
                  <!-- <th scope="row"><?php echo $booking->id; ?></th> -->
                  <td><?php echo $booking->first_name; ?></td>
                  <td><?php echo $booking->last_name; ?></td>
                  <td><?php echo $booking->date; ?></td>
                  <td><?php echo $booking->time; ?></td>
                  <td><?php echo $booking->phone; ?></td>
                  <td><?php echo $booking->message; ?></td>
                  <td><?php echo $booking->status; ?></td>
                  <td><a href="change-status.php?id=<?php echo $booking->id; ?>" class="btn btn-warning text-white text-center ">Update Status</a></td>
                  <td><?php echo $booking->created_at; ?></td>
                  <td><a href="delete-bookings.php?id=<?php echo $booking->id; ?>" class="btn btn-danger  text-center ">Delete</a></td>
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