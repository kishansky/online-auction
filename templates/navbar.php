<div class="sticky-top ">
  <nav class="navbar navbar-expand-lg navbar-light rounded-1 m-0 p-1" style="background-color: #e3f2fd;">
  <div class="container-fluid ">
    <a class="navbar-brand p-0 m-0 logo-img" href="index.php" ><img style="height: 3rem; width: 3rem;" src="./public/img/icon.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?=  $page == 'index.php'? 'active':'' ?>"  href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $page == 'wishlist.php'? 'active':'' ?>" href="wishlist.php">Wishlist</a>
        </li>
       
          <?php    
          if (isset($_SESSION["name"])) {
            ?>
             <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Profile
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item <?= $page == 'profile.php'? 'active':'' ?> "href="profile.php">Profile Details</a></li>
            <li><a class="dropdown-item <?= $page == 'add-item.php'? 'active':'' ?>" href="add-item.php">Add New Item</a></li>
            <li><a class="dropdown-item <?= $page == 'your-items.php'? 'active':'' ?>" href="your-items.php">Your Item</a></li>
            <li><a class="dropdown-item <?= $page == 'purchase.php'? 'active':'' ?>" href="purchase.php">Purchase Item</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="./classes/auth/logout.php">Logout</a></li>
          </ul>
          </li>
          <?php
          }else{
            ?>
            <li class="nav-item">
          <a class="nav-link" href="./classes/auth/login.php">Login</a>
        </li>
          <?php
          }
          ?>
   
      </ul>
      <div class="d-flex" data-aos="fade-left" data-aos-delay="1000" data-aos-duration="1000">
        <input class="form-control me-2" id="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" onclick="search()" type="submit">Search</button>
      </div>
    </div>
  </div>
</nav>
</div>

