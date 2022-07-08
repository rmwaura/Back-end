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
		<a href="index.php" class="w3-bar-item w3-button"> <i class="fa fa-home" aria-hidden="true"></i>Home</a> | 
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
		
		<h3>Add mission </h3> <!-- heading to add missions-->
	
		<form method="post" action="addmission.php"> <!-- this is a form to input data and submit to the database-->
		
			<br>
			<label>Mission name:</label>
			<input type="text" name="mission_name">
			<br>
			<br>
			<label>Mission destination:</label>
			<input type="text" name="mission_destination">
			<br>
			<br>
            <label>launch date:</label>
			<input type="date" name="launch_date">
			<br>
			<br>
            <label>Mission type:</label>
			<input type="text" name="mission_type">
			<br>
			<br>
            <label>crew size:</label>
			<input type="number" name="crew_size">
			<br>
			<br>
            <label>launch site:</label>
			<input type="text" name="launch_site">
			<br>
			<br>
            <label>launch vehicle:</label>
			<input type="text" name="launch_vehicle">
			<br>
			<br>
            <label>operation time:</label>
			<input type="number" name="operation_time">
			<br>
			<br>

            <br>
			
			<label>Select astronaut:</label>
			<select name="astronaut_id">
				<?php
				$sql = mysqli_query($link, "SELECT astronaut_id, astronaut_name FROM astronaut");//this statement selects the data from the database
				while ($row = $sql->fetch_assoc()){
				echo "<option value='{$row['astronaut_id']}'>{$row['astronaut_name']}</option>";
				}
				?>
			</select>
            <br>
			
			<label>Select target:</label>
			<select name="target_id">
				<?php
				$sql = mysqli_query($link, "SELECT target_id, target_name FROM target"); //this sends a query to the active database associated with the link
				while ($row = $sql->fetch_assoc()){ //this function fetches the row results
				echo "<option value='{$row['target_id']}'>{$row['target_name']}</option>";
				}
			?>
			</select>
			
			<br>
			<input type="submit" name="submit">
			
		
		</form>
		
		<?php
		
		if (isset($_POST['submit'])) { //this is to declare a variable and makes sure it's not null
		
            $mission_name = $_POST['mission_name'];
            $destination = $_POST['mission_destination'];
            $launch_date = $_POST['launch_date'];
            $mission_type = $_POST['mission_type'];
            $crew_size = $_POST['crew_size'];
            $launch_site = $_POST['launch_site'];
            $launch_vehicle = $_POST['launch_vehicle'];
            $operation_time = $_POST['operation_time'];
			$astronaut_id = $_POST['astronaut_id'];
			$target_id = $_POST['target_id'];

			
			$sql = "INSERT INTO mission (mission_name, mission_destination, launch_date, mission_type, crew_size, astronaut_id, launch_site, launch_vehicle, operation_time, target_id) VALUES 
            ('$mission_name', '$destination', '$launch_date',  '$mission_type', '$crew_size', '$astronaut_id', '$launch_site', '$launch_vehicle', '$operation_time', '$target_id')";
			if (mysqli_query($link, $sql)) {
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
