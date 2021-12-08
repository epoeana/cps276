<?php

//Logout of session
function logout(){
    session_unset();
    header('Location: index.php?page=login');
}

?>