<?php
    include_once('database.php');
    session_start();
    $data = $users->find();
    $sessionhistory = $session->find();
    $array = iterator_to_array($data);
    $sessionhistoryarray = iterator_to_array($sessionhistory);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">


<head>
    <meta charset="UTF-8">
    <title> Admin Dashboard </title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<script>
$(document).ready(function() {
    setInterval(function() {
        $("#session-users").load("sessionrecord.php");
        $("#numbers").load("noofstudents.php");
    }, 3000);
}); 
</script>


<body>
    <div class="sd">
        <div class="logo-details">
            <i class='bx bx-qr-scan' style='color:#ffffff'></i>
            <span class="logo_name">Attendance Monitoring</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="index.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#"  class="active">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Session History</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Setting</span>
                </a>
            </li>
            <li class="log_out">
                <a href="#">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>

    <section class="home-section">
        <nav>
            <div class="sd-button">
                <i class='bx bx-menu sdBtn'></i>
                <span class="dashboard">Dashboard</span>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div>
            <div class="profile-details">
                <img src="images/Blue.png" alt="">
                <span class="admin_name">Thirumalai</span>
                <i class='bx bx-chevron-down'></i>
            </div>
        </nav>

        <div class="home-content">
            <div class="overview-boxes">
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Students</div>
                        <div id = "numbers">
                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="session-boxes">
                <div class="recent-session box" id='session-users'>
            </div>
    </section>
    <script>
    let sd = document.querySelector(".sd");
    let sdBtn = document.querySelector(".sdBtn");
    sdBtn.onclick = function() {
        sd.classList.toggle("active");
        if (sd.classList.contains("active")) {
            sdBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else
            sdBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
    </script>

</body>
</html>