<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Get Pokemon from ID</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <script>
  function validateForm(){
  	var idEntered = document.forms["pokeForm"]["id"].value;
  	if (idEntered > 721 || idEntered < 1){
  		document.getElementById('errors').innerHTML="Enter number between 1 and 721.";
  		return false;
  	}
  	if (isNaN(idEntered)==true){
  		document.getElementById('errors').innerHTML="Must enter a number.";
  		return false;
  	}
  }
  </script>

</head>
<body>	

  <h2>Get Pokemon From ID</h2>
  <p>Enter a pokemon ID:</p>
  <form name="pokeForm" action="" onsubmit="return validateForm()" method="get">
  	<fieldset class="form-group">
  		<input type="text" name="id" required />
  		<div id="errors"></div>
  	</fieldset>  	
  	<input type="submit" class="btn btn-primary" />
  </form>

  <hr>

  <?php

	if(ISSET($_GET['id'])){

		$pokemonId = $_GET['id'];
		$apiUrl = 'http://pokeapi.co/api/v2/pokemon/';
		$pokemon = $apiUrl.$pokemonId;
		$response = file_get_contents($pokemon);
		$response = json_decode($response, true);
		$sprite = $response['sprites']['front_default'];
		echo "<img src='$sprite'/><br>";
		echo 'ID: '.$response['id'].'<br>Name: '.$response['name'];
		echo "<hr>";		
	}

	 ?>


</body>
</html>



