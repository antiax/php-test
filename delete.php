<?php
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    if(isset($_GET['id'])){
        // Get ID value
        $id = $_GET['id'];

        // Call Delete function
        $result = $crud->deleteAttendee($id);

        //Redirect to list
        if ($result){
            header ("Location: viewrecords.php");
        }
    }
    include 'includes/errormessage.php';
?>