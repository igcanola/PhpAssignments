<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form | Assignment - Ingrid Canola</title>
	<meta name="description" content="Dynamic Web Site with Database Integration">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
  	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
</head>
<body>
  <header>
    <nav class="navbar navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="./img/subscribe.png" height="100" width="150" alt="header logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="view.php">View</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
	<section class="masthead">
		<div>
			<h1>Person details</h1>
		</div>
	</section>
  <main class="container">
	   <section class="form-row row justify-content-center">
		     <form method="post" class="form-horizontal col-md-6 col-md-offset-3">
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
					 <div></div>
					 <div class="form-group">
						 <input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="Subscribe">
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
							$res   = $database->create($fname, $email, $fphone, $faddress, $postal, $country);
							if($res){
								echo "<p>Successfully inserted data</p>";
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
