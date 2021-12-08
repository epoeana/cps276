<?php
//Welcome Page
function init(){
    $name = $_SESSION['userName'];
    return ["<h1>Welcome</h1>","<p>Welcome {$name}</p>"];
}

?>