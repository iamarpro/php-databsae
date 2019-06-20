<?php
$servername = "localhost";
$username   =  "root";
$password   =  "";
$dbname     =  "class";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
if (isset($_REQUEST['submit']))
{
	if (($_REQUEST['name'] == "" ) || ($_REQUEST['roll']=="") || ($_REQUEST['address'== ""])) 
	{
		echo "<small>Fill All The fields </small><hr>";
	}
	else
	{
		$name    =$_REQUEST['name'];
		$roll    =$_REQUEST['roll'];
		$address =$_REQUEST['address'];
		$sql = "INSERT INTO student (NAME, ROLL_NO, ADDRESS) VALUE('$name', '$roll', '$address')";
		if(mysqli_query($conn,$sql))
		{
			echo "New record inserted";

		}
		else
		{
			echo "unable to insert data";
		}
	}
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello</title>
  </head>
  <body>
    
    <div class="container">
    	<div class="row">
    		<div class="col-sm-4">
    			<form action="" method="POST">
    				<div class="form-group">
    					<label for="name">Name</label>
    					<input type="text" name="name" class="form-control" id="name">	
    				</div>
    				<div class="form-group">
    					<label for="roll">Roll No</label>
    					<input type="text" name="roll" class="form-control" id="roll">	
    				</div>
    				<div class="form-group">
    					<label for="name">ADDRESS</label>
    					<input type="text" name="address" class="form-control" id="address">	
    				</div>
    				<button type="submit" class="btn btn-primary" name="submit">Submit</button>
    			</form>
    		</div>
    		<div class="col-sm-6 offset-sm-4S">
    			<?php
    			$sql="SELECT * FROM student";
    			$result=mysqli_query($conn,$sql);
    			if(mysqli_num_rows($result)>0){
    				echo '<table class="table">';
    				echo "<thead>";
    					echo "<tr>";
    						echo "<th>ID</th>";
    						echo "<th>NAME</th>";
    						echo "<th>ROLL_NO</th>";
    						echo "<th>ADDRESS</th>";
    					echo "</tr>";
    				echo "<thead>";
    				echo "<tbody>";
    					while($row =mysqli_fetch_assoc($result))

    					{
    						echo "<tr>";
    						echo "<td>" .$row["ID"]      .   "</td>";
    						echo "<td>" .$row["NAME"]    .   "</td>";
    						echo "<td>" .$row["ROLL_NO"]    .   "</td>";
    						echo "<td>" .$row["ADDRESS"] .   "</td>";
    						echo "</tr>";
    					}
    					
    			}
    			?>
    				</tbody>
    				</table>

    		</div>
    	</div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>