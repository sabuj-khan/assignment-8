<?php 

    if(isset($_POST['submit'])){
        // validate form inputs
    if ( empty( $_POST['fname'] ) || empty( $_POST['lname'] ) || empty( $_POST['email'] ) || empty( $_POST['password'] ) || empty( $_POST['cpassword'] ) ) {
        die( 'All fields are required.' );
    }

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // validate email format
    if ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
        die( 'Invalid email format.' );
    }
    // Matching password and confirm password
    if($password !== $cpassword){
        die( 'Two passwords do not match.' );
    }



     // save user's data to CSV file
     $data = array( $fname, $lname, $email, $password );
     $file = fopen( 'users.csv', 'a' );


     if ( fputcsv( $file, $data ) === false ) {
        die( 'Error writing to file.' );
    }
    fclose( $file );


     // start session and set cookie
     session_start();
     setcookie( 'username', $name );
 
     // redirect to success page
     header( 'Location: login.php' );
     exit();


    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment - 8</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
		<div class="row" style="margin-bottom: 55px;">
			<div class="heading">
				<h2>Project - Assignment Eight</h2>
					<p>If you are not registered, please register below first.</p>
			</div>
		</div>
        <a href=""></a>
        <img src="" alt="">
		<div class="row">
			<div class="area-form">
				<form action="" method="POST" enctype="multipart/form-data">
					<label for="fname">First Name</label> <br>
					<input type="text" name="fname" id="fname"> <br>		
                    
                    <label for="lname">Last Name</label> <br>
					<input type="text" name="lname" id="lname"> <br>	

                    <label for="email">Email Address</label> <br>
					<input type="email" name="email" id="email"> <br>	

					<label for="password">Password</label> <br>
					<input type="password" name="password" id="password"> <br>

                    <label for="cpassword">Confirm Password</label> <br>
					<input type="password" name="cpassword" id="cpassword"> <br>
					
					
					<input type="submit" value="Submit" name="submit">
				</form>

			</div>
		</div>
	</div>
</body>
</html>