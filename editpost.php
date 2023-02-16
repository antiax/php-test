<?php 
   
    require_once 'db/conn.php';

    if (isset($_GET['submit'])){
        //extract values the $_GET array
        $id = $_GET['id'];
        $fname = $_GET['firstname'];
        $lname = $_GET['lastname'];
        $dob = $_GET['dob'];
        $email = $_GET['email'];
        $contact = $_GET['phone'];
        $specialty = $_GET['specialty'];

        $result = $crud->editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty);

        //Redirect to index.php
        if($result){
            header("Location: viewrecords.php");
        }
    }
    include 'includes/errormessage.php';
    
?>