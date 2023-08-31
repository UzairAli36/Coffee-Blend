<?php
ob_start();

require "../layouts/header.php";
require "../../config/config.php";

//  Redirect user to login page if not signed in
if (!isset($_SESSION['admin_name'])) {
  header("location: " . ADMINURL . "/admins/login-admins.php");
}

// Displaying all Admins
$admins = $conn->query("SELECT * FROM admins");
$admins->execute();

$allAdmins = $admins->fetchAll(PDO::FETCH_OBJ);

ob_end_flush();
?>

<div class="container-fluid">

  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Admins</h5>
          <a href="create-admins.php" class="btn btn-primary mb-4 text-center float-right">Create New Admin</a>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>      
                <th scope="col">Delete Admin</th>      
              </tr>
            </thead>
            <tbody>
              <?php foreach ($allAdmins as $admin) : ?>
                <tr>
                  <th scope="row"><?php echo $admin->id; ?></th>
                  <td><?php echo $admin->adminname; ?></td>
                  <td><?php echo $admin->email; ?></td>
                  <td><a href="delete-admins.php?id=<?php echo $admin->id; ?>" class="btn btn-danger  text-center ">Delete</a></td>
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