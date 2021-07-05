<?php

	// Place cleanup code here to prevent malicious code
	if(isset($_POST['submit'])  && $_POST['submit']=="Submit")  // determine if submit button is clicked
	{
		$name = cleanData($_POST['name']);
		$email = cleanData($_POST['email']);
		$password = cleanData($_POST['password']);
		$phone = cleanData($_POST['tel']);
		addData($name, $email, $password, $phone);
	}else{
	    page();
	}
	function cleanData($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = trim($data);
		$data = htmlspecialchars($data);
		$data = strip_tags($data);
		return $data;
	}

	function addData($name, $email, $password, $phone){
		include("dbinfo.php");
		$checkId = mysqli_query($db, "SELECT * FROM Users WHERE username='$name' LIMIT 1");
		$num_rows = mysqli_num_rows($checkId);

		if ($num_rows > 0) {
		    
  			print "<h1 align = 'center'>The Username Already Exists</h1>";

		}
		else {

			//Create sql statement of what to add to db
		   $sql = "INSERT INTO `Users`(`username`, `email`, `password`, `phone`) ('$name', '$email', '$password', '$phone')";

			$result = mysqli_query($db, $sql); // or die(mysql_error());

print<<<HERE

            <h1> Your account has been created <h1>
            
HERE;
		}
	}
	
	function page(){
	    print<<<HERE
            <!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
          <link rel="stylesheet" type="text/css" href="main.css">
          <link rel="stylesheet" type="text/css" href="sign-in.css">
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
          integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
          
          <link rel="icon" href="../img/dblogo4.png" type="image/x-icon">
      
      <title>Daily Brew|Sign up</title>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.html">
        <img src="../img/dblogo4.png" width="40" height="40" class="d-line-block align-top" alt="Logo">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav justify-content-end">
          <li class="nav-item">
            <a class="nav-link" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="history.html">History</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Coffee
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../src/brewingM.html">Brewing methods</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../src/products.html">Shop</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="../src/sign-in.html">Sign In/Up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../src/cart.html">
              <i class="fas fa-shopping-cart" aria-hidden="true"></i>
            </a>
          </li>
          <form class="form-inline">
            <input class="form-control mr-sm-2 search-bar" type="search" placeholder="Search" aria-label="Search">
            <i class="fas fa-search" aria-hidden="true"></i>
          </form>
        </ul>
      </div>
    </nav>
      
    <div class="sidenav">
      <div class="login-main-text">
        <img src="../img/dblogo4.png" alt="Daily Brew Logo">
        <h2>Daily Brew <br>Sign up</h2>
        <p>Already have an account? <a href="../src/sign-in.html">Sign in</a></p>
      </div>
    </div>

    <div class="main">
      <div class="col-md-6 col-sm-12">
        <div class="register-form">
            <form method="post" name="signUpForm" onsubmit="return formVal()" >
                <div class="form-group">
                  <label>User name</label>
                  <input name="name" id="name" type="text" class="form-control" placeholder="Username">
                  <div id="uname"></div>
                </div>
                
                <div class="form-group">
                  <label>Email</label>
                  <input name="email" id="email" type="text" class="form-control" placeholder="name@domain.com" />
                  <div id="uemail"></div>
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input name="password" id="password" type="password" class="form-control" placeholder="Password" />
                  <div id="upass"></div>
                </div>
                
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input name="repass" id="repass" type="password" class="form-control" placeholder="Confirm Password" >
                  <div id="urepass"></div>
                </div>
                      
                <div class="form-group">
                  <label>Mobile Number</label><br>
                  <input type="text" id = "tel" name="tel" placeholder="(965) ####-####"/>
                <div id="utel"></div>
                </div>
                
                <input type="submit" name = "submit" value="Submit" class="btn hvr-right">
                <button type="reset" class="btn hvr-right">Clean Up</button>
            </form>
        </div>
      </div>
    </div>

    <script src="signupVal.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"></script>
  </body>
</html>	    
HERE;
	}

?>












