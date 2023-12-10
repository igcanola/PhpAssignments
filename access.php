<?php
  require "config.php";
  $uploadSuccess = false; 
  $valid_file=true;
  if(!empty($_POST['submit'])) {
    $countfiles = count($_FILES['files']['name']);
    $query = "INSERT INTO images (name,image) 
    VALUES(?,?)";
    $statement = $conn->prepare($query);
    // Loop all files
    for($i = 0; $i < $countfiles; $i++) {
      // File name
      $filename = $_FILES['files']['name'][$i];
      // Location
      $target_file = './uploads/'.$filename;
      // file extension
      $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
      $file_extension = strtolower($file_extension);
      // Valid image extension
      $valid_extension = array("png","jpeg","jpg","pdf");
      if(in_array($file_extension, $valid_extension)) {
        // Upload file
        if(move_uploaded_file($_FILES['files']['tmp_name'][$i], $target_file)){
          // Execute query
          try {
          $statement->execute(
          array($filename,$target_file));
          $uploadSuccess = true; 
        } catch (Exception $e) {
          echo "Error>";
}
        }  
      }
      else{
        $valid_file=false;
      }
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form | Assignment - Ingrid Canola</title>
	<meta name="description" content="Dynamic Web Site with Database Integration">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
	<!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet"> -->
</head>
<body>
  <header>
    <nav class="navbar navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="access.php"><img src="./img/subscribe1.png" height="110" width="150" alt="header logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="view.php">View Data</a></li>
			<li class="nav-item"><a class="nav-link" href="viewimg.php">View Images</a></li>
			<li class="nav-item"><a class="nav-link active" aria-current="page" href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
	<section class="masthead">
		<div>
			<h1 style="background-color: black; color: white;">Document Delivery Form</h1>
			<p>To reserve your delivery complete and submit the booking form</p>
		</div>
	</section>
  <main class="container">

  <?php
      if (isset($_GET['msg1'])) {  // == "insert"
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Your Registration added successfully
            </div>";
      }
      if (isset($_GET['msg2']) == "update") {
        echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Your Registration updated successfully
            </div>";
      }
      if (isset($_GET['msg3']) == "delete") {
       echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Record deleted successfully
            </div>";
      }
    ?>
	   <section class="form-row row justify-content-center">
		     <form method="post" action='' class="form-horizontal col-md-6 col-md-offset-3" enctype="multipart/form-data">
					 <h2>Step 1: Your details</h2>
					 <div class="form-group">
						 <label for="input1" class="col-sm-2 control-label">Name</label>
						 <div class="col-sm-10">
							 <input type="text" name="fname" class="form-control" id="input1">
						 </div>
					 </div>
					 <div class="form-group">
						 <label for="input2" class="col-sm-2 control-label">Email</label>
						 <div class="col-sm-10">
							 <input type="email" name="email" class="form-control" id="input2">
						 </div>
					 </div>
					 <div class="form-group">
						 <label for="input3" class="col-sm-2 control-label">Phone</label>
						 <div class="col-sm-10">
							 <input type="tel" name="fphone" class="form-control" id="input3">
						 </div>
					 </div>

					 <h2>Step 2: Delivery address</h2>
					 <div class="form-group">
						 <label for="input4" class="col-sm-2 control-label">Address</label>
						 <div class="col-sm-10">
							 <input type="text" name="faddress" class="form-control" id="input4">
						 </div>
					 </div>
					 <div class="form-group">
						 <label for="input5" class="col-sm-2 control-label">Post code</label>
						 <div class="col-sm-10">
							 <input type="text" name="fpost" class="form-control" id="input5">
						 </div>
					 </div>
					 <div class="form-group">
						 <label for="input6" class="col-sm-2 control-label">Country</label>
						 <div class="col-sm-10">
							 <input type="text" name="fcountry" class="form-control" id="input6">
						 </div>
					 </div>
					 <div class="form-group">
						 <label for="input7" class="col-sm-2 control-label">Image</label>
						 <div class="col-sm-10">
							 <input type="file" name="files[]" multiple>
						 </div>
					 </div>
					 <div></div>
					 <div class="form-group">
						 <input type="submit" class="btn btn-primary col-md-3 col-md-offset-10" value="Submit" name='submit'>
					 </div>
		     </form>
         <div class="form-group submit-message">
           <?php
					 	require_once('database.php');
						
						if(!empty($_POST)){
							$fname = $_POST['fname'];
							$email = $_POST['email'];
							$fphone = $_POST['fphone'];
							$faddress = $_POST['faddress'];
							$postal = $_POST['fpost'];
							$country = $_POST['fcountry'];
							$res   = $rObj->create($fname, $email, $fphone, $faddress, $postal, $country);
							if($res){
								echo "<p>Successfully inserted data</p>";
								header("Location: view.php"); // Redirect to a success page
								exit();
							}else{
								echo "<p>Failed to insert data</p>";
							}
						}
					 ?>
        </div>
      </section>
     </main>
   </body>
</html>
