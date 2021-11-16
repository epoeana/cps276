<?php
require 'PdoMethods.php';
if (isset( $_POST["sendFile"])){
	processFile();
}
else {
	$output = "";
}

function processFile(){
    global $output;
	//Check to see if a file was uploaded.  Error equals 4 means no file uploaded
	if ($_FILES["file"]["error"] == 4){
		$output = "No file was uploaded. Make sure you choose a file to upload.";
	}

	//Check file size less than 1000000 bytes
	elseif($_FILES["file"]["size"] > 100000 || $_FILES["file"]["error"] == 1){
		$output = "The file is too large";
	}

	//Check to make sure it is the correct file type, PDF
	elseif ($_FILES["file"]["type"] != "application/pdf" ) {
		$output = "<p>PDF files only, thanks!</p>";
	}
    //Add file
	else {	
        addFile();
		$output = "<p>File has been added</p>";
	}
}

function addFile(){
	
    $pdo = new PdoMethods();

    //SQL statement and binding
    $sql = "INSERT INTO files (file_name, file_path) VALUES (:fileID, :filePath)";
    $file=$_POST['filename'];
    $filePath = "files/{$_FILES['file']['name']}";
    $bindings = [
        [':fileID',$file,'str'],
        [':filePath',$filePath,'str']
    ];

    //OtherBinding method
    $result = $pdo->otherBinded($sql, $bindings);

    //We have success or an error
    if($result === 'error'){
        return 'There was an error adding the name';
    }
    else {
        return 'File has been added';
    }
}

?>