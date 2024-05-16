<?php


?>

<div class="sticky-top ">
    <nav class="navbar navbar-expand-lg navbar-light rounded-1 mt-1" style="background-color: #e3f2fd;">
        <div class="container-fluid">
        <a class="navbar-brand p-0 m-0 logo-img" href="index.php" ><img style="height: 3rem; width: 3rem;" src="../../public/img/icon.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active <?= $page == 'index.php'? 'active"':'' ?>" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'users.php'? 'aactive':'' ?>" href="users.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'reports.php'? 'aactive':'' ?>" href="reports.php">
                            Reports
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>