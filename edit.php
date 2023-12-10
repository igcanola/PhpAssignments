<?php
session_start();
include 'database.php';


if(!empty($_SESSION['editId'])) {
  $editId = $_SESSION['editId'];
  $r = $rObj->displayRecordById($editId);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD With PDO</title>
  <meta name="description" content="Edit Page">
  <meta name="robots" content="noindex, nofollow">
  <!--  Add our Google fonts  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
  <!--  Add our Bootstrap  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" >
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!--  Add our custom CSS  -->
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>
  <header>
    <h1>Edit Data</h1>
  </header>
  <section class="container">
    <div class="row">
      <div class="col-md-5 mx-auto">
        <div class="card">
          <div class="card-header bg-primary">
          <h4 class="text-white">Update Records</h4>
          </div>
          <div class="card-body bg-light">
            <form method="POST">
             
              <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="fname" value="<?php echo $r['fname']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $r['email']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" name="address" value="<?php echo $r['faddress']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" name="phone" value="<?php echo $r['phone']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" class="form-control" name="country" value="<?php echo $r['country']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="postal_code">Postal Code:</label>
                <input type="text" class="form-control" name="postal_code" value="<?php echo $r['postal_code']; ?>" required="">
              </div>
              <div class="form-group">
                <input type="hidden" name="id_person" value="<?php echo $r['id_person']; ?>">
                <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
              </div>
            </form>
            <?php
              if(!empty($_POST)) {
                $fname = $_POST['fname'];
							  $email = $_POST['email'];
							  $fphone = $_POST['phone'];
							  $faddress = $_POST['faddress'];
							  $postal = $_POST['postal_code'];
							  $country = $_POST['country'];
                $id_person = $_POST['id_person'];
                $rObj->updateRecord($fname, $email, $fphone, $faddress, $postal, $country, $id_person);
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>