<?php
ob_start();
require "../layouts/header.php";
require "../../config/config.php";

//  Redirect user to login page if not signed in
if (!isset($_SESSION['admin_name'])) {
  header("location: " . ADMINURL . "/admins/login-admins.php");
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
  header_remove();
  header("location: show-products.php");

  if (empty($_POST['name']) or empty($_FILES['image']) or empty($_POST['description']) or empty($_POST['price']) or empty($_POST['category'])) {
    echo "<script>alert('one or more inputs are empty')</script>";
  } else {
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    // Moving image to a new location when submitted
    // $dir = "images/" . basename($image);

    $insert = $conn->prepare("INSERT INTO products (name, image, description, price, category)
     VALUES (:name, :image, :description, :price, :category)");

    $insert->execute([
      ":name" => $name,
      ":image" => $image,
      ":description" => $description,
      ":price" => $price,
      ":category" => $category
    ]);
  }
}
ob_end_flush();
?>

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-5 d-inline">Create Product</h5>
          <form method="POST" action="create-products.php" enctype="multipart/form-data">

            <!-- Name input -->
            <div class="form-outline mb-4 mt-4">
              <input type="text" name="name" id="form2Example1" class="form-control" placeholder="Name" />
            </div>

            <!-- Image input -->
            <div class="form-outline mb-4 mt-4">
              <input type="file" name="image" id="form2Example1" class="form-control" />
            </div>

            <!-- Description input -->
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Description</label>
              <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter text"></textarea>
            </div>

            <!-- Price input -->
            <div class="form-outline mb-4 mt-4">
              <input type="text" name="price" id="form2Example1" class="form-control" placeholder="Price" />
            </div>

            <!-- Category input -->
            <div class="form-outline mb-4 mt-4">
              <select name="category" class="form-select  form-control" aria-label="Default select example">
                <option selected>Choose Type</option>
                <option value="Drink">Drink</option>
                <option value="Dessert">Dessert</option>
                <option value="Dish">Dish</option>
                <option value="Fast Food">Fast Food</option>
              </select>
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