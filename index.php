<?php
    include_once('database.php');
    session_start();
?>

<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Admin Dashboard </title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx'></i>
      <span class="logo_name">Attendance Monitoring</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-cog' ></i>
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
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <img src="images/Blue.png" alt="">
        <span class="admin_name">Thirumalai</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Students</div>
            <div class="number">10</div>
          </div>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Previous Session</div>
            <div class="number">36</div>
          </div>
        </div>
        <!-- <div class="box">
          <div class="right-side">
            <div class="box-topic"></div>
            <div class="number">$12,876</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bx-cart cart three' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Return</div>
            <div class="number">11,086</div>
            <div class="indicator">
              <i class='bx bx-down-arrow-alt down'></i>
              <span class="text">Down From Today</span>
            </div>
          </div>
          <i class='bx bxs-cart-download cart four' ></i>
        </div> -->
      </div>

      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Logins</div>
          <div class="sales-details">
            <ul class="details">
              <?php
              $data = $users->findOne(['rollNumber' => '63322']);
              if($data == NULL){
                echo'
                <li class="topic">Reg No</li>
               
              </ul>
              <ul class="details">
                <li class="topic">Name</li>
              </ul>
              <ul class="details">
                <li class="topic">Login Time</li>
              </ul>
              <ul class="details">
                <li class="topic">Total Time Spent(min)</li>
              </ul>
            </div>
            <div class="button">
              <a href="#">See All</a>
            </div>
          </div>';
        }
        else{
          $data = $users->findOne(['rollNumber' => '63322']);
          foreach($data as $key){
            echo'
            <li class="topic">Reg No</li>
            <li><a href="#">'.$key->regNumber.'</a></li>
          </ul>
          <ul class="details">
          <li class="topic">Name</li>
          <li><a href="#">'.$key->regNumber.'</a></li>
        </ul>
        <ul class="details">
          <li class="topic">Login Time</li>
          <li><a href="#">'.$key->regNumber.'</a></li>
        </ul>
        <ul class="details">
          <li class="topic">Total Time Spent(min)</li>
          <li><a href="#">'.$key->regNumber.'</a></li>
        </ul>
        </div>
            ';
          }
        }
        ?>
              <li class="topic">Reg No</li>
              <li><a href="#">20IT112</a></li>
            </ul>
            <ul class="details">
            <li class="topic">Name</li>
            <li><a href="#">Alex Doe</a></li>
          </ul>
          <ul class="details">
            <li class="topic">Login Time</li>
            <li><a href="#">9:00</a></li>
          </ul>
          <ul class="details">
            <li class="topic">Total Time Spent(min)</li>
            <li><a href="#">60</a></li>
          </ul>
          </div>
          <div class="button">
            <a href="#">See All</a>
          </div>
        </div>
        <!-- <div class="top-sales box">
          <div class="title">Top Seling Product</div>
          <ul class="top-sales-details">
            <li>
            <a href="#">
              <img src="images/sunglasses.jpg" alt="">
              <span class="product">Vuitton Sunglasses</span>
            </a>
            <span class="price">$1107</span>
          </li>
          <li>
            <a href="#">
              <img src="images/jeans.jpg" alt="">
              <span class="product">Hourglass Jeans </span>
            </a>
            <span class="price">$1567</span>
          </li>
          <li>
            <a href="#">
              <img src="images/nike.jpg" alt="">
              <span class="product">Nike Sport Shoe</span>
            </a>
            <span class="price">$1234</span>
          </li>
          <li>
            <a href="#">
              <img src="images/scarves.jpg" alt="">
              <span class="product">Hermes Silk Scarves.</span>
            </a>
            <span class="price">$2312</span>
          </li>
          <li>
            <a href="#">
              <img src="images/blueBag.jpg" alt="">
              <span class="product">Succi Ladies Bag</span>
            </a>
            <span class="price">$1456</span>
          </li>
          <li>
            <a href="#">
              <img src="images/bag.jpg" alt="">
              <span class="product">Gucci Womens's Bags</span>
            </a>
            <span class="price">$2345</span>
          <li>
            <a href="#">
              <img src="images/addidas.jpg" alt="">
              <span class="product">Addidas Running Shoe</span>
            </a>
            <span class="price">$2345</span>
          </li>
<li>
            <a href="#">
              <img src="images/shirt.jpg" alt="">
              <span class="product">Bilack Wear's Shirt</span>
            </a>
            <span class="price">$1245</span>
          </li>
          </ul>
        </div> -->
      </div>
    </div>
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>
