<?php 
session_start();



if(isset($_POST['login'])){

    $log_email = $_POST['email'];
    $log_password = $_POST['password'];

    $file = fopen('users.csv', 'r');
     while(($data = fgetcsv($file)) !== false) {
        if($data[2] == $log_email ){
            if($data[3] == $log_password){
                header("location: admin.php");
            }else{
                $error =  "The password is wrong";
            }
        }else{
            $error =  "Email doesn't match";
        }



    }


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
				<h2>Welcome to the Log In Page</h2>
					<h4>You are successfully registered, please Login below.</h4>
			</div>
		</div>
		<div class="row">
			<div class="area-form">
				<form action="" method="POST">
									

                    <label for="email">Email Address</label> <br>
					<input type="email" name="email" id="email"> <br>	

					<label for="password">Password</label> <br>
					<input type="password" name="password" id="password"> <br>
					
					
					<input type="submit" value="Log In" name="login">
				</form>

                <div class="error">
                    <?php 
                        if(isset($error)){
                            echo "<p>".$error."</p>";
                        }

                    ?>
                </div>

			</div>
		</div>
	</div>
</body>
</html>