<div class="sticky-top ">
  <nav class="navbar navbar-expand-lg navbar-light rounded-1 mt-1" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand text-primary fw-bold " href="#" >AUCTION</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Wishlist</a>
        </li>
       
          <?php    
          if (isset($_SESSION["name"])) {
            ?>
             <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Profile
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="profile.php">Profile Details</a></li>
            <li><a class="dropdown-item" href="add-item.php">Add New Item</a></li>
            <li><a class="dropdown-item" href="your-items.php">Your Item</a></li>
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
      <form class="d-flex" data-aos="fade-left" data-aos-delay="1000" data-aos-duration="1000">
        <input class="form-control me-2" id="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</div>
