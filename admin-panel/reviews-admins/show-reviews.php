<?php
ob_start();
require "../layouts/header.php";
require "../../config/config.php";

//  Redirect user to login page if not signed in
if (!isset($_SESSION['admin_name'])) {
  header("location: " . ADMINURL . "/admins/login-admins.php");
}

// Displaying all reviews from database
$reviews = $conn->query("SELECT * FROM reviews");
$reviews->execute();

$allReviews = $reviews->fetchAll(PDO::FETCH_OBJ);

ob_end_flush();
?>

<div class="container-fluid">

  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Reviews</h5>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Review</th>
                <th scope="col">Username</th>
                <th scope="col">Created</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($allReviews as $review) : ?>
                <tr>
                  <th scope="row"><?php echo $review->id; ?></th>
                  <td><?php echo $review->review; ?></td>
                  <td><?php echo $review->username; ?></td>
                  <td><?php echo $review->created_at; ?></td>
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