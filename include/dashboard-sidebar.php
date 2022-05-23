<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!--<meta charset="UTF-8">-->
<meta charset="utf-8">
<meta http-equiv>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/stylenav.css">
    <link rel="stylesheet" href="css/dashstyle.css">
    <link rel="stylesheet" href="css/style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
    body{
        font-family:Arial;
    }
</style>
   </head>
<body>
    <?php header('Content-Type: text/html; charset=utf-8'); ?>
  <div class="sidebar">
    <div class="logo-details">
      <span class="logo_name">Family tree</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="{{ (request()->is('admin/dashboard*')) ? 'active' : '' }}">
            <i class='bx bx-home-circle' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="peoples.php" class="{{ (request()->is('admin/bookings*')) ? 'active' : '' }}">
            <i class='bx bxs-user-badge'></i>
            <span class="links_name">Peoples</span>
          </a>
        </li>
        <li>
          <a href="reports.php" class="{{ (request()->is('admin/services*')) ? 'active' : '' }}">
          <i class='bx bxs-report'></i>
            <span class="links_name">Reports</span>
          </a>
        </li>
        <li>
          <a href="tree.php" class="{{ (request()->is('admin/services*')) ? 'active' : '' }}">
            <i class='bx bx-network-chart' ></i>
            <span class="links_name">Graph</span>
          </a>
        </li>
        <li>
          <a href="admins.php" class="{{ (request()->is('admin/services*')) ? 'active' : '' }}">
          <i class='bx bxs-user-circle'></i>
                      <span class="links_name">Admins</span>
          </a>
        </li>    
        <li class="log_out">
          <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
