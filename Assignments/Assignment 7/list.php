<?php
require_once 'fileListProc.php';
$listFiles = new FileList();
$output = $listFiles->ListFiles();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>List Files</title>
    
  </head>
  <body>
    <main class="container">
        <h1>List Files</h1>
        <a href="form.php">Back to File Upload Form</a><br>
		<div> <?php echo $output; ?></div>
    </main>
</body>
</html>