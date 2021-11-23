<?php
$output="";
if (count($_POST) > 0){
    require_once 'Date_time.php'; 
    $dateOb = new Date_time(); 
    $output = $dateOb->formValidateFunc();
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Note</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    
  </head>
    <body>
        <div class="container">
            <h1>Add Note</h1>
            <form method="post" action="#">
                <p><a href ="note.php">Display Notes<br><br></a><?php echo $output;?></p>

                <div class="mb-2">
                <label for="dateTime">Date and Time</label>
                <input type="datetime-local" class="form-control shadow-lg p-3 mb-2 bg-body rounded" id="dateTime" name="dateTime">
                </div>

                <div class="mb-2">
                <label for="note">Note</label>
                <textarea class="form-control shadow-lg bg-body rounded" name="note" id="note" style="height: 300px"></textarea>
                </div>

                <div class="btn btn-primary">
                <button type="submit" class="btn btn-primary" name="addNote">Add Note</button>
                </div>
                
                <!-- Open issues
                     *Having issue getting datebase to work properly -->
            
            </form>
        </div>
    </body>
</html>
