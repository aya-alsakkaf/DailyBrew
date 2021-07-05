<?PHP
	//DATABASE CONNECTION INFORMATION
		$host = "localhost";
		$user = "id16595707_animals";
		$password = "WebProgramming2021#";
		$dbname = "id16595707_cs335";
		$db = mysqli_connect($host, $user, $password, $dbname);
		// Check connection
        if (mysqli_connect_errno()) {
            echo "Connection failed: " . mysqli_connect_error();
            exit();
        }
        //echo "Connected successfully";
?>