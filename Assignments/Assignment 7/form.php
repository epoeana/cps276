<?php
$output= "";
if (count($_POST) > 0){
    require_once 'fileUpload.php';
    $upload = new FileUpload();
    $output = $upload->upload();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>File Upload Assignment 7</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    
  </head>
    <body>
        <div class="container">
            <h1>File Upload</h1>
            <form method="post" action="form.php">
                <p><a href ="fileList.php">Show File List</a><?php echo $output;?></p>
                <div class="mb-3">
                <label for="fileName">File Name</label>
                <input type="text" class="form-control" id="fileName" name="fileName">
                </div>
                <div class="mb-3">
                <input type="file" id="fileUpload" name="fileUpload">
                </div>
                <div class="btn btn-primary">
                <button type="submit" class="btn btn-primary" name="upload">Upload</button>
                </div>
            </form>
        </div>
    </body>
</html>