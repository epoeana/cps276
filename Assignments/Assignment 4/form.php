<?php
	require_once 'addNameProc.php'; 
	$addName = new AddNamesProc(); 
	$output = $addName->formValidateFunc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    
	<title>Add Names Form</title>

</head>
  
<body>
  	<div class="container">  
		<form action="form.php" method="post">	
		<h1>Add Names</h1> 
		<div class="form-group">
			<input type="submit" class="btn btn-primary" name="addName" id="B1" value="Add Name">
			<input type="submit" class="btn btn-primary" name="clearNames" id="B2" value="Clear Names">
		</div>
		<div class="col-md-12">
			<label for="fullName" class="form-label">Enter Name</label>
			<input type="text" class="form-control" id="fullName" name="fullName" alt="Form input for new name">
		</div>
		<div class="col-md-12">
			<label for="nameList" class="form-label">List of Name</label>
			<textarea style="height: 500px" class="form-control" id="nameList" name="nameList">
		
				<?php echo $output ?>
				
			</textarea>
		</div>
		</form>
	</div>
</body>
</html>