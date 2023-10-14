<?php
	require_once('database.php');
	$res = $database->read();
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
        <a class="navbar-brand" href="index.php"><img src="./img/subscribe.png" alt="header logo"></a>
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
<div class="container">
	<div class="row">
		<table class="table">
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Phone</th>
				<th>Address</th>
				<th>Postal Code</th>
				<th>Country</th>
			</tr>
			<?php

				while($r = mysqli_fetch_assoc($res)){
			?>
					<tr>
						<td><?php echo $r['id_person']; ?></td>
						<td><?php echo $r['fname'] ; ?></td>
						<td><?php echo $r['phone'] ?></td>
						<td><?php echo $r['faddress'] ?></td>
						<td><?php echo $r['postal_code'] ?></td>
						<td><?php echo $r['country'] ?></td>
					</tr>
				<?php
				}
			?>
		</table>
	</div>
</div>
</body>
</html>
