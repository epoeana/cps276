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
        
        <h2>Display Notes</h2> 
        </nav>
        <div class="container">
        <h5 class="mb-4"><a href="form.php">Add Note</a></h5>

    <form action="#" method="post">

        <div class="mb-2">            
            <label for="begDate" class="mb-2"><b>Beginning Date</b></label>  
            <input type="date" class="form-control shadow-lg p-3 mb-2 bg-body rounded" id="begdate" name="begDate">

        </div>

        
        <div class="mb-2">
            <label for="endDate" class="mb-2"><b>Ending Date</b></label>
            <input type="date" class="form-control shadow-lg p-3 mb-2 bg-body rounded" id="endDate" name="endDate">
        </div>

  <div class="mb-3">

        <span class="badge rounded-pill bg-primary">
             <button type="submit" class="btn btn-primary " name="getNotes" value="getNotes">Get Notes</button>                
        </span>   
    
    </form>

    <br>
    <p><?php echo $table ?></p>
    

    </body>
</div>
</html>