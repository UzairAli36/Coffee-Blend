<?php
ob_start();
require "../layouts/header.php";
require "../../config/config.php";


//  Redirect user to login page if not signed in
if (!isset($_SESSION['admin_name'])) {
  header("location: login-admins.php");
}

// Check if the form is submitted
if (isset($_POST['submit'])) {

  if (empty($_POST['adminname']) or empty($_POST['email']) or empty($_POST['password'])) {
    echo "<script>alert('one or more inputs are empty')</script>";
  } else {
    $adminname = $_POST['adminname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $insert = $conn->prepare("INSERT INTO admins (adminname, email, password)
     VALUES (:adminname, :email, :password)");

    $insert->execute([
      ":adminname" => $adminname,
      ":email" => $email,
      ":password" => $password
    ]);

    header("location: admins.php");
  }
}
ob_end_flush();
?>

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-5 d-inline">Create Admins</h5>
          <form method="POST" action="create-admins.php" enctype="multipart/form-data">

            <!-- Adminname input -->
            <div class="form-outline mb-4">
              <input type="adminname" name="adminname" id="form2Example1" class="form-control" placeholder="admin name" />
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4 mt-4">
              <input type="email" name="email" id="form2Example1" class="form-control" placeholder="email" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" name="password" id="form2Example1" class="form-control" placeholder="password" />
            </div>

            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Create</button>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<?php require "../layouts/footer.php"; ?>