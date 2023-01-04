
<?php
function prevent(){
    $url != 'search_form.php';

if ($_SERVER['HTTP_REFERER'] == $url) {
//   header('Location: login.php'); //redirect to some other page
  header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");


  $url = '';
  exit();
}

}
?>

<?php 
@prevent();
?>

<?php 
	include("config.php");
?>
<html>
<head>
	<title>SEARCH BY NAME AND COLLAGE</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
	<script>
	$(document).ready(function(){
		load_data();
		function load_data(query)
		{
			$.ajax({
			url:"searchLive.php",
			method:"POST",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
			});
		}
		$('#search').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();
		}
		});
	});
	</script>
	<style>
		#search{
			position: fixed; 
		} 
		
	</style>
</head>
<body>
<div class="container-fluid">       
<div class="content-wrapper">
	<div class="container">
		<h1>Search By And Collage</h1>
		<div class="row">
		<div class="col-xs-12">
			<input type="text" name="search" id="search" placeholder="Search by name Or Collage..." class="form-control"  />
			<div id="result"></div>
		</div>
		</div>	
	</div>
</div>
</div>
</body>
</html>
