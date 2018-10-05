<html>
<head>
	<title>Phone Data App</title>
	<!-- Latest compiled and minified CSS For bootstrap-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Out custom internal styles -->
	<style type="text/css">
		
		body{
			background-color: #3498db;
		}

		.title{
			color: #fff;
		}

		.glyphicon{
		    margin-right: 5px;
		    color: #fff;
		    font-size: 27px;
		}

	</style>
</head>
<body>
	<div class="container">

		<div class="title">
		<h1><b><span class="glyphicon glyphicon-phone"></span>Phone Data App</b></h1>
		<p>Connect And Get Information Using <i><b>fonoAPI</b></i></p>
		</div>	

		<!-- phones search form -->
		<form method="post" action="#">
			<input name="brand" class="form-control" placeholder="type the brand name" required>
			<br>
			<button type="submit" name="submit" class="btn btn-primary">Search</button>
		</form>
		
		<br>
		
		<?php 
			include 'functions.php';

			if (isset($_POST['submit'])){

				// get the brand from the posted form
				$brand = $_POST['brand'];
				// pass the brand to the request function from the functions.php file
				$phones = request($brand);
				
				echo '<h3 class="title">search result for brand ' . '"' . $brand . '"</h3>';
				// count the returned phones
				echo '<div class="label label-primary">'.count($phones).' founded</div><hr>';
				
				// if there is data available returned from the request	
				if(!isset($phones['status'])):
					// foreach returned phone create the structure and print it to the screen
					foreach ( $phones as $key => $phone):
						echo mobileTable($phone);
					endforeach;
				else:
					echo '<i class="title">no data available</i>';	 
				endif;  
			}
		?>


	</div>
</body>
</html>			