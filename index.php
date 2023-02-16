    <?php 
        $title = 'Index';

        require_once 'includes/header.php';
        require_once 'db/conn.php';

        $results = $crud->getSpecialties();
    ?>
    <!--
        - First Name
        - Last Name
        - Date of Birth (Use DatePicker)
        - Specialty (Database Admin, Software Developer, Web Administrator, Other)
        - Email Address
        - Contact Number
    -->
    <h1 class="text-center">Registration for IT conference</h1>

    <form method="post" action="success.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="firstname">First Name</label>
            <input required type="text" class="form-control" id="firstname" name="firstname">
        </div>
        <div class="mb-3">
            <label for="lastname">Last Name</label>
            <input required type="text" class="form-control" id="lastname" name="lastname">
        </div>
        <div class="mb-3">
            <label for="dob">Date Of Birth</label>
            <input type="text" class="form-control" id="dob" name="dob" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="specialty">Area Of Expertise</label>
            <select class="form-control" id="specialty" name="specialty" aria-label="Area Of Expertise">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['specialty_id'] ?>"><?php echo $r['name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
            <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="avatar" class="form-label">Upload Image (Optional)</label>
            <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar">
            <!--<label class="custom-file-label">Choose File</label>-->
        </div>
        <div class="d-grid gap-2">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
<br>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>