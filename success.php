<?php 
        $title = 'Success';
        require_once 'includes/header.php';
        require_once 'db/conn.php';
        require_once 'sendemail.php';

        if (isset($_POST['submit'])){
          //extract values the $_POST array
          $fname = $_POST['firstname'];
          $lname = $_POST['lastname'];
          $dob = $_POST['dob'];
          $email = $_POST['email'];
          $contact = $_POST['phone'];
          $specialty = $_POST['specialty'];

          $target_dir = 'uploads/';
          
          if(!empty($_FILES["avatar"]["name"])){
            $orig_file = $_FILES["avatar"]["tmp_name"];
            $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);  
            //$destination = $target_dir . basename($_FILES["avatar"]["name"]);
            $destination = "$target_dir$contact.$ext";
            move_uploaded_file($orig_file, $destination);
          } else {
            $destination = "images/no-user-profile-picture.jpg";
          }

          //Call function to insert and track if success or not
          $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty, $destination);
          $SpecialtyName = $crud->getSpecialtyById($specialty);
          
          if($isSuccess){
            SendEmail::sendmail($email, 'welcome to IT conference', 'You have successfully registered for this year\' IT conference');
            include 'includes/successmessage.php';
          }else{
            include 'includes/errormessage.php';
          } 
        }else{
          include 'includes/errormessage.php';
        }
?>
 
 <div class="card" style="width: 18rem;">
  <div class="card-body">
  <img src="<?php echo $destination; ?>" class="img-thumbnail" alt="no picture">
    <h5 class="card-title mt-1">
      <?php echo $_POST['firstname'].' '.$_POST['lastname']; ?>
    </h5>
    <h6>
      <?php //echo $SpecialtyName['name']; ?>
    </h6>
    <p class="card-text">
      Date of Birth: <?php echo $_POST['dob']?>;
    </p>
    <p class="card-text">
      Email Adress: <?php echo $_POST['email']?>;
    </p>
    <p class="card-text">
      Contact Number: <?php echo $_POST['phone']?>;
    </p>
  </div>
</div>

<br>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>  