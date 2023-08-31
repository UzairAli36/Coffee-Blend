<?php
ob_start();
require "../layouts/header.php";
require "../../config/config.php";

//  Redirect user to login page if not signed in
if (!isset($_SESSION['admin_name'])) {
    header("location: " . ADMINURL . "/admins/login-admins.php");
}

// Check if the 'id' parameter is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        if (empty($_POST['status'])) {
            echo "<script>alert('one or more inputs are empty')</script>";
        } else {
            $status = $_POST['status'];
            
            $update = $conn->prepare("UPDATE bookings SET status = :status WHERE id='$id'");
            
            $update->execute([
                ":status" => $status,
            ]);
            
            header("location: show-bookings.php");
        }
    }
}

ob_end_flush();
?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Update Status</h5>
                    <form method="POST" action="change-status.php?id=<?php echo $id; ?>">

                        <!-- Update status box -->
                        <div class="form-outline mb-4 mt-4">
                            <select name="status" class="form-select  form-control" aria-label="Default select example">
                                <option value="Pending">Pending</option>
                                <option value="Confirmed">Confirmed</option>
                                <option value="Done">Done</option>
                            </select>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php require "../layouts/footer.php"; ?>