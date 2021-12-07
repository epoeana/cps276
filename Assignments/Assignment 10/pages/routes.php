<?php

//session_start();


function security(){
if ($_SESSION['access'] !== "accessGranted") {
    header('location: index.php?page=logout');
}
}

function adminCheck(){

    if ($_SESSION['privilege'] !== "admin") {
        header('location: index.php?page=logout');
    }

}

$path = "index.php?page=login";
$nav = navBar();

function navBar()
{

if(session_status() !== PHP_SESSION_ACTIVE){
    $nav ="";
        return $nav;
      
} else if ($_SESSION['privilege'] === "admin") {

        $nav = <<<HTML
    <nav class="nav">
        <ul class="nav">
            <li class="nav-item"><a class="nav-link" href="index.php?page=welcome">Welcome</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?page=addContact">Add Contact Information</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?page=deleteContacts">Delete contact(s)</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?page=addAdmin">Add Admin</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?page=deleteAdmin">Delete admin(s)</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?page=logout">Logout</a></li>
        </ul>
    </nav>
HTML;

        return $nav;
    } else if ($_SESSION['privilege'] === "staff") {


        $nav = <<<HTML
    <nav class="nav">
        <ul class="nav">
            <li class="nav-item"><a class="nav-link" href="index.php?page=welcome">Welcome</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?page=addContact">Add Contact Information</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?page=deleteContacts">Delete contact(s)</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?page=logout">Logout</a></li>
        </ul>
    </nav>
HTML;

        return $nav;
    }else{
        $nav ="";
        return $nav;
    }
}

if (isset($_GET)) {
    if ($_GET['page'] === "addContact") {
        require_once('pages/addContact.php');
        session_start();
        security();
        $nav = navBar();
        $result = init();
    } else if ($_GET['page'] === "deleteContacts") {
        require_once('pages/deleteContacts.php');
        session_start();
        security();
        $nav = navBar();
        $result = init();
    } else if ($_GET['page'] === "welcome") {
        require_once('pages/welcome.php');
        session_start();
        $nav = navBar();
        security();
        $result = init();
    } else if ($_GET['page'] === "addAdmin") {
        require_once('pages/addAdmin.php');
        session_start();
        adminCheck();
        $nav = navBar();
        $result = init();
    } else if ($_GET['page'] === "deleteAdmin") {
        require_once('pages/deleteAdmin.php');
        session_start();
        adminCheck();
        $nav = navBar();
        $result = init();
    } else if ($_GET['page'] === "logout") {
        session_start();
        require_once('pages/logout.php');
        logout();
    }else if ($_GET['page'] === "login") {
            require_once('pages/login.php');
            $result = init();
        }
     else {
        //header('Location: http://russet.php?page=form');
        header('location: ' . $path);
    }
}else {
    //header('Location: http://198.199.80.235/cps276/cps276_assignments/assignment10_final_project/solution/index.php?page=form');
    header('location: ' . $path);
}