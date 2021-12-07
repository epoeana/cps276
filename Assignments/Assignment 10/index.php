<?php
/* THIS ENTIRE PAGE IS JUST A PLACEHOLDER PAGE WHICH THE FORM WILL BE INJECTED INTO */
/*I REQUIRE IN THE ROUTES PAGE WHICH IS ACTUALLY DOES THE WORK FOR GETTING THE PAGES.*/ 
require_once('pages/routes.php');

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PHP Form Validation Example</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

		
	</head>

	<body class="container">
		<?php
			/* THIS IS THE PHP PAGE  */
			echo $nav;
			
			/* THE ACKNOWLEDGEMENT GOES HERE AS THE FIRST INDEX OF THE ARRAY  */
			echo $result[0]; 

			/* THE FORM GOES HERE.  LOOK AT THE FORM.PHP PAGE TO SEE HOW THE RETURN IN DONE. */
			echo $result[1]; 
		?>
	</body>
</html> 