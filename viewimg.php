<?php
  $pageTitle = 'View Images';
  $pageDesc = 'On this page we will be able to view the images that we have uploaded';

  require 'config.php';

  $stmt = $conn->prepare('select * from images');
  $stmt->execute();
  $imagelist = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form subscribe| Read</title>
	<meta name="description" content="Dynamic Web Site with Database Integration">
	<meta name="robots" content="noindex, nofollow">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" >
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="stylesheet" href="./css/style.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
</head>
<body>
	<header>
    <nav class="navbar navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="./img/subscribe1.png" alt="header logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="access.php">Insert Data</a></li>
            <li class="nav-item"><a class="nav-link" href="view.php">View Data</a></li>
			      <li class="nav-item"><a class="nav-link active" aria-current="page" href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <section class="view-masthead">
    <div>
      <h1>View Images</h1>
    </div>
  </section>
  <section class="image-row row">

<?php
  foreach($imagelist as $image) {
    $valid_extension = array("pdf");
    $file_extension = pathinfo($image['image'], PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);

    if(in_array($file_extension, $valid_extension)) {
?>     
    <div class="col-sm-12 col-md-3 col-lg-3"> 

      <a href=”<?=$image['name']?>”><?php echo $image["name"]; ?></a>
    </div>
<?php      
    }
    else{
 ?>
    <div class="col-sm-12 col-md-3 col-lg-3"> 
      <img src="<?=$image['image']?>" alt="<?=$image['name'] ?>" class="img-fluid" >
      <p><?php echo $image["name"]; ?></p>
    </div>
<?php
   }
}
?>
  </section>
  </body>
</html>
