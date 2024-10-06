<?php 
function isAdmin() {
    return ($_SESSION['role'] == 1);
}
function adminCanView() {
    if(!isAdmin()) {
        die('<p class="alert alert-danger">You Are not authorized to view this page!</p>');
    }
}

function firstDateOfCurrentMonth () {
    return date('Y-m-01');
}

function lastDateOfCurrentMonth () {
    return date('Y-m-t');
}

function getCurrentDate() {
    return $date = date('Y-m-d');
}
?>