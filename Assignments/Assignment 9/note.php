<?php
$table="";
if (count($_POST) > 0){
 require_once 'Date_time.php'; 
 $dateOb = new Date_time(); 
 $table = $dateOb->filterDates(); 
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
            <h1>Display Notes</h1>
            <form method="post" action="#">
                <p><a href ="form.php">Add Note<br><br></a>

                <div class="mb-2">            
                <label for="begDate" class="mb-2">Beginning Date</label>  
                <input type="date" class="form-control shadow-lg p-3 mb-2 bg-body rounded" id="begdate" name="begDate">
                </div>

                <div class="mb-2">
                <label for="endDate" class="mb-2">Ending Date</label>
                <input type="date" class="form-control shadow-lg p-3 mb-2 bg-body rounded" id="endDate" name="endDate">
                </div>

                <div class="btn btn-primary">
                <button type="submit" class="btn btn-primary" name="getNotes">Get Notes</button>
                </div>  
    
            </form>
            <br>
            <p><?php echo $table ?></p>
    
        </div>
    </body>
</html>