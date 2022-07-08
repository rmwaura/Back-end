<html>

	<head><title>European Space Agency</title>
	
	<link rel="stylesheet" href="style.css"> <!-- links css in the pages-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

	<body>

	<style>
			}
  .home{
	width: 90vh;
	height: 100%;
	background-position: top 25% right 0;
	background-size: cover;
  }
  body{
    background-color: rgb(109, 211, 214);
  }
  h3 {
    color: rgb(167, 101, 14);
    text-align: left;
    margin: 12px;
  }

        </style> <!-- css styling -->

	    <h2>Welcome to European Space Agency</h2>
		<!-- Float links to the right. hide them on small screens-->
		<p>Choose what you would like to do:</p>
		<a href="index.php" class="w3-bar-item w3-button"> <i class="fa fa-home" aria-hidden="true"></i>Home</a>| 
		<a href="addmission.php"><button class="button1"><strong>Add mission</strong></button></a>&nbsp; | 
		<a href="addastronaut.php"><button class="button1"><strong>Add astronaut</strong></button></a>&nbsp; | 
		<a href="addtarget.php"><button class="button1"><strong>Add target</strong></button></a>&nbsp; | 
		<a href="seemission.php"><button class="button1"><strong>See mission</strong></button></a>&nbsp;
        <a href="seetarget.php"><button class="button1"><strong>See target</strong></button></a>&nbsp;
        <a href="seeastronaut.php"><button class="button1"><strong>See astronaut</strong></button></a>&nbsp;
	
		<?php
		
		$link = mysqli_connect("localhost", "root", "", "esa_database");//link to the database
		// Check connection
		if ($link === false) {
			die("Connection failed: ");
		}
		?>
	
		<hr>
		
		<h3>Add astronaut</h3> <!-- heading to add astronauts-->
	
		<form method="post" action="addastronaut.php"> <!-- this is a form to input data and submit to the database-->
		
			<label>Astronaut Name:</label>
			<input type="text" name="astronaut_name">
			<br>
			<br>
			<label>Number of Missions</label>
			<input type="number" name="no_missions">
			<br>
			<br>
			<input type="submit" name="submit">

		</form>
		
		<?php
		
		if (isset($_POST['submit'])) { //this is to declare a variable and makes sure it's not null
		
			$astronaut_name = $_POST['astronaut_name'];
			$no_missions = $_POST['no_missions'];
			
			
			$sql = "INSERT INTO astronaut (astronaut_name, no_missions) VALUES ('$astronaut_name', '$no_missions')";//this statement inserts new record in the table
			if (mysqli_query($link, $sql)) { //this sends a query to the active database associated with the link
			  echo "New record created successfully";
			} else {
			  echo "Error adding record "; //echo outputs the data
			}
		}
		
		$link->close();
		?>
	
		<hr>
	</body>

</html>