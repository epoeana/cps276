<?php

class Date_time {

    public function formValidateFunc() {

        date_default_timezone_set('America/Detroit');
        require_once 'Pdo_methods.php';
                

        if(isset($_POST['addNote'])) {
            if($_POST['note'] != null and $_POST['dateTime'] != null){
                            
                $pdo = new PdoMethods;
                $timestamp = strtotime($_POST['dateTime']);           
                
                $sql = "INSERT INTO notes (date, note) VALUES (:date,:note)";
                
                $bindings = [
                    [':date',$timestamp,'int'],
                    [':note',$_POST['note'],'str']
                ];
                
                $result = $pdo->otherBinded($sql, $bindings);
                return "<h3 style='color:green'><b>Success!<br>Your note was added to the Database!</b></h3>";
                
            }
            else{
                return "<h3 style='color:red'><b>Friendly reminder,<br>Please ensure all fields are filled before adding note!</b></h3>";
            }

        }
    }

    public function filterDates() {

        date_default_timezone_set('America/Detroit');
        require_once 'Pdo_methods.php';

        $begDate = null;
        $endDate = null;

        if(isset($_POST['getNotes'])){

                $begDate = strtotime($_POST['begDate']);
                $endDate = strtotime($_POST['endDate']);
            
                if($begDate != null and $endDate != null){

                    $pdo = new PdoMethods;          
                    $sql = "SELECT * FROM notes WHERE (date >= $begDate AND date <= $endDate) ORDER BY date DESC";
                    $records = $pdo->selectNotBinded($sql);

                }
                else{

                return "<h3 style='color:red'><b>Please select a date range!</b></h3>";

                }        
            
            if(count($records) != 0){
                $output = "<table class='table table-striped shadow-lg bg-body rounded'>";
                $output .= "<th scope='col'>Date and Time</th><th scope='col'>Note</th><tr>";

                foreach($records as $row) {

                    $date = date('m/d/Y h:i A',$row['date']);
                    $note = $row['note'];
                    
                    $output .= "<tr><td style='padding: 20px;'>" . $date . "</td><td style='padding: 20px;'>" . $note . "</td></tr>";
                }
                
                $output .= "</table>";
                
                return $output;
        }
        else {
            return "<h3 style='color:red'><b>No notes were found from ". date('m/d/Y',$begDate) . " to " . date('m/d/Y',$endDate) ."!<br>Please try a different range!</b></h3>";
        }

        }
    }
}  
?>