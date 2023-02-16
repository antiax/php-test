<?php 
  ini_set('display_errors', '1');
  ini_set('display_startup_errors', '1');
  error_reporting(E_ALL);
?>

<?php
  include_once "includes/session.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Attendace - <?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/site.css" />
</head>
  <body>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
          <div class="d-flex justify-content-between w-100">
            <a class="navbar-brand" href="index.php">IT Conference</a>
            <!--<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>-->
            <!--<div class="collapse navbar-collapse" id="navbarNav">-->
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="viewrecords.php">View Attendees</a>
              </li>
            </ul>
            <ul class="navbar-nav">
              <li class="nav-item">
                <?php if (!isset($_SESSION['userid'])){?>
                  <a class="nav-link active" aria-current="page" href="login.php">Login</a>
                <?php }else{ ?>
                  <div class="d-flex">
                    <span class="nav-link">Hello <?php echo $_SESSION['username']; ?></span>
                    <a class="nav-link active" aria-current="page" href="logout.php"> Logout</a>
                </div>
                <?php } ?>
              </li>
            </ul>
          <!--</div>-->
          </div>
        </div>
      </nav>
      </br>
      </br>
