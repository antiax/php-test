<?php

    $title = 'Edit Record';

    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();

    if (!isset($_GET['id'])){
        include 'includes/errormessage.php';
    }else{
        $id = $_GET['id'];
        $attendee = $crud->getAttendeeDetails($id);

?>
    
<h1 class="text-center"><?php echo $title; ?></h1>

    <form method="post" action="editpost.php"  enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $attendee['attendee_id'] ?>" />
        <div class="mb-3">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['firstname'] ?>" id="firstname" name="firstname">
        </div>
        <div class="mb-3">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['lastname'] ?>"  id="lastname" name="lastname">
        </div>
        <div class="mb-3">
            <label for="dob">Date Of Birth</label>
            <input type="text" class="form-control" value="<?php echo $attendee['dateofbirth'] ?>"  id="dob" name="dob" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="specialty">Area Of Expertise</label>
            <select class="form-control" id="specialty" name="specialty" aria-label="Area Of Expertise">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['specialty_id'] ?>"
                            <?php if($r['specialty_id'] == $attendee['specialty_id']) echo 'selected' ?> >
                        <?php echo $r['name']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control"  value="<?php echo $attendee['emailadress'] ?>" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Contact Number</label>
            <input type="text" class="form-control"  value="<?php echo $attendee['contactnumber'] ?>" id="phone" name="phone" aria-describedby="phoneHelp">
            <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="avatar" class="form-label">Upload Image (Optional)</label>
            <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar">
            <!--<label class="custom-file-label">Choose File</label>-->
        </div>
        <div class="d-grid gap-2">
            <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>

    <?php } ?>

<?php require_once 'includes/footer.php'; ?>