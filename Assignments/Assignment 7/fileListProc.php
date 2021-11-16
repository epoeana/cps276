<?php
require 'PdoMethods.php';
$output = getFiles();


function getFiles(){
		
    //PDOMETHOD
    $pdo = new PdoMethods();

    //SQL
    $sql = "SELECT * FROM files";
    $records = $pdo->selectNotBinded($sql);

    //Display Error
    if($records == 'error'){
        return 'There has been and error processing your request';
    }
    else {
        if(count($records) != 0){
          return(createList($records));
        }
        else {
            return 'No files found';
        }
    }
}

function createList($records){
    $list = '<ul>';
    foreach ($records as $row){
        $list .= "<li><a target='_blank' href='{$row['file_path']}'>{$row['file_path']}</a></li>";
    }
    $list .= '</ul>';
    return $list;
}

?>  