<?php 
session_start();

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
				<h2>Welcome to the Admin Page</h2>
				<h4><a href="index.php">Log Out</a></h4>
			</div>
		</div>
		<div class="row">
			<div class="area-form">


            <table>
		<thead>
			<tr>
				<th>First Name</th>
				
			</tr>
		</thead>
		<tbody>



            
                <?php 
                $file = fopen('users.csv', 'r');
                while(($data = fgetcsv($file)) !== false) {
                    echo "<tr>";

                echo "<td> {$data[0]}</td>";
                echo "</tr>";
                
                }
                fclose($file);
                ?>
             
		</tbody>
	</table>
				

			</div>
		</div>
	</div>
</body>
</html>