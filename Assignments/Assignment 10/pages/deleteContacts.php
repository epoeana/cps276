<?php
function init(){

    require_once 'classes/Pdo_methods.php';

    if(isset($_POST['delete'])){
        if(isset($_POST['chkbx'])){
            $error = false;
            foreach($_POST['chkbx'] as $id){
                $pdo = new PdoMethods();

                $sql = "DELETE FROM contacts WHERE contact_id=:id";
                
                $bindings = [
                    [':id', $id, 'int'],
                ];
                $result = $pdo->otherBinded($sql, $bindings);

                if($result === 'error'){
                    $error = true;
                    break;
                }
            }
        }
    }
    
    $output = "";
    
    $pdo = new PdoMethods();

    /* HERE I CREATE THE SQL STATEMENT I AM BINDING THE PARAMETERS */
    $sql = "SELECT * FROM contacts";

    $records = $pdo->selectNotBinded($sql);

    if(count($records) === 0){
        $output = "<p>There are no records to display</p>";
        return [$output,""];
    }
    else {
        $output = "<form method='post' action='index.php?page=deleteContacts'>";
        $output .= "<input type='submit' class='btn btn-danger' name='delete' value='Delete'/><br><br><table class='table table-striped table-bordered'>
    <thead>
        <tr>
        <th>Name</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Date of Birth</th>
        <th>Password</th>
        <th>Contact Types</th>
        <th>Age Range</th>
        </tr>
    </thead><tbody>";

    foreach($records as $row){
        date_default_timezone_set('America/Detroit');
        $tempTime =$row['contact_dob'];
        $time2 = date("m\/j\/Y", $tempTime);
        $output .= "<tr><td>{$row['contact_name']}</td>
        <td>{$row['contact_address']}</td>
        <td>{$row['contact_city']}</td>
        <td>{$row['contact_state']}</td>
        <td>{$row['contact_email']}</td>
        <td>{$row['contact_phone']}</td>
        <td>$time2</td>
        <td>{$row['contact_password']}</td>
        <td>{$row['contact_types']}</td>
        <td>{$row['contact_age']}</td>
        <td><input type='checkbox' name='chkbx[]' value='{$row['contact_id']}' /></td></tr>";
    }

    $output .= "</tbody></table></form>";

    if(isset($error)){
        if($error){
            $msg = "<p>Could not delete the contact(s)</p>";
        }
        else {
            $msg = "<p>Contact(s) deleted</p>";
        }
    }
    else {
        $msg="";
    }
    return [$msg, $output];
    }
}