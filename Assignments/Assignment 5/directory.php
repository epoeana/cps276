<?php

Class Directories{
    
    public function addDirectory($POST){
    
        if(isset($POST['submit'])){
            $directoryName = $POST['directory'];
            // check/create directory and add permissions
            if(!is_dir('directories/' . $directoryName)){
                if(mkdir('directories/' . $directoryName, 0777, true)){
                    chmod('directories/' . $directoryName, 0777);
                    $path = 'directories/' . $directoryName . "/";
                    $file = fopen($path . "readme.txt","w");
                    if(!fwrite($file, $POST['filecontent'])){
                        fclose($file);
                        $validation = '<p style="color: red;">File could not be created.</p>';
                    }
                    else {  // display that file and directory was created successfull with path link
                        $validation = "File and Directory were created.";
                        $filePath = "<a href='directories/{$directoryName}/readme.txt'>Path where file is located</a>";
                        return $validation.$filePath;
                    }
                }
                else {  // throw an error if directory could not be created
                  /*echo '<script language="javascript">';
			        echo 'alert("Error: Directory could not be made.")';
			        echo '</script>';*/
                    $validation = '<p style="color: red;">Error: Directory could not be made.</p>';
                    return $validation;
                }
            }
            else {  // display a message if directory already exits
                  /*echo '<script language="javascript">';
			        echo 'alert("A directory already exists with that name.")';
			        echo '</script>';*/
                    $validation = '<p style="color: red;">A directory already exists with that name.</p>';
                    return $validation;
            }
        }
    }
}  
?>
