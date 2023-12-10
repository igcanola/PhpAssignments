<?php
    require_once 'config.php';
    require_once 'session.php';

	$error = '';
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = trim($_POST['email']);
        if (empty($email)) {
			echo "Email is required.";
			exit;
		}

		$password = trim($_POST["password"]);
    	if (empty($password)) {
        	echo "Password is required.";
         exit;
		}
        
        //if (empty($error)){
			if ($query = $db->prepare("SELECT * FROM users1 WHERE email = ?")){
				$query->bind_param('s', $email);
				$query->execute();

				$result = $query->get_result();
				$row = $result->fetch_assoc();

				if ($row) {
					if (!empty($row['password'])) {
						if (password_verify($password, $row['password'])) {
							echo "Login successful.";
							header("location: access.php");
							exit;
						} else {
							echo "Invalid email or password.";
							$error .= '<p class="error"> The password is not valid </p>';
						}
					} else {
						$error .= '<p class="error"> No user exists with that email address </p>';
					}
				} else {
					$error .= '<p class="error"> No user exists with that email address </p>';
				}
		
				$query->close();

			}else {
				$error .= '<p class="error"> Database query error </p>';
			}
	//	}
        mysqli_close($db); 
      }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
	</head>
	<body>
	<header>
    <nav class="navbar navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="./img/subscribe1.png" height="110" width="150" alt="header logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
			<li class="nav-item"><a class="nav-link active" aria-current="page" href="register.php">Register</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
		<div class="login">
			<h1>Login</h1>
			<form action="" method="post">
				<label for="email">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="email" placeholder="email" id="email" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" name="submit" value="Submit">
				
    			<p>Don't have an account? <a href="register.php" style="color:dodgerblue">Register here</a>.</p>
  
			</form>
		</div>
	</body>
</html>