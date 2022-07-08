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
		<a href="index.php" class="w3-bar-item w3-button"> <i class="fa fa-home" aria-hidden="true"></i>Home</a>
		<a href="addmission.php"><button class="button1"><strong>Add mission</strong></button></a>&nbsp; | 
		<a href="addastronaut.php"><button class="button1"><strong>Add astronaut</strong></button></a>&nbsp; | 
		<a href="addtarget.php"><button class="button1"><strong>Add target</strong></button></a>&nbsp; | 
		<a href="seemission.php"><button class="button1"><strong>See mission</strong></button></a>&nbsp;
        <a href="seetarget.php"><button class="button1"><strong>See target</strong></button></a>&nbsp;
        <a href="seeastronaut.php"><button class="button1"><strong>See astronaut</strong></button></a>&nbsp;
	
		<?php
		
		$link = mysqli_connect("localhost", "root", "", "esa_database");//link to the database
		if ($link === false) {
			die("Connection failed: ");// Check connection
	
		}
		?>
	
		<hr>
		
		<h3>See astronaut</h3> <!-- heading to see astronauts-->
	
		<table> 
		
			<tr>
				<th width="250px">Astronaut Name<br><hr></th>
				<th width="150px">No of Missions<br><hr></th>
			</tr>
					
			<?php
			$sql = mysqli_query($link, "SELECT astronaut_id, astronaut_name, no_missions FROM astronaut");//this statement selects the data from the database
			while ($row = $sql->fetch_assoc()){ //this function fetches the row results
			echo "
			<tr>
				<th>{$row['astronaut_id']}</th>
				<th>{$row['astronaut_name']}</th>
				<th>{$row['no_missions']}</th>
			</tr>
			"; //echo outputs the data
			}
			?>
			
		</table>
		
		<?php
		$link->close();
		?>
	
		<hr>
		

	
	</body>

</html>