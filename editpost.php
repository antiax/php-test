<?php 
   
    require_once 'db/conn.php';

    if (isset($_POST['submit'])){
        //extract values the $_GET array
        $id = $_POST['id'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];

        if(empty($_FILES["avatar"]["name"])){
            $result = $crud->editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty, null);
        }else{
            $target_dir = 'uploads/';
            $orig_file = $_FILES["avatar"]["tmp_name"];
            $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);  
            //$destination = $target_dir . basename($_FILES["avatar"]["name"]);
            $destination = "$target_dir$contact.$ext";
            move_uploaded_file($orig_file, $destination);

            $result = $crud->editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty, $destination);
        }

        //Redirect to index.php
        if($result){
            header("Location: viewrecords.php");
        }
    }
    include 'includes/errormessage.php';
    
?>