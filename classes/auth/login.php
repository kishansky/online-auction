<?php
include "header.php";

?>

<div class="col-12 col-sm-6">
    <div class="row vh-100 text-center  justify-content-center align-items-center px-2">
        <div class="chaudai w-sm-50 border border-1 h-auto m-2 rounded-3 bg-white shadow-lg" data-aos="flip-left" data-aos-duration="2000">
            <div data-aos="fade" data-aos-duration="2000" data-aos-delay="1000">

                <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" autocomplete="off">
                    <div class="my-2 p-2">
                        <!-- <label for="email">Email</label><br> -->
                        <input class="w-100 p-3 rounded-2 border border-1 form-control" type="email" placeholder="Email" name="email">
                    </div>
                    <div class="my-2 p-2">
                        <!-- <label for="email">Password</label><br> -->
                        <input class="w-100 p-3 rounded-2 border border-1 form-control" type="password" placeholder="Password" name="password">
                    </div>
                    <div class="my-2 p-2">
                    <a href="./forget-pass.php">Forgotten Password?</a>
                </div>
                    <div class="my-2 p-2">
                        <button class="btn btn-primary w-100 p-2" name="login">Login</button>
                    </div>
                </form>
                <?php 
if(isset($_POST['login'])){
    $email = strip_tags($_POST['email']);
    $password = strip_tags(md5($_POST['password']));
    
    $sql = "SELECT id,name,email FROM users WHERE email = '{$email}' AND password ='{$password}'";
    $result = mysqli_query($conn,$sql) or die("Query Failed.".$email." ". $password);
    if(mysqli_num_rows($result) > 0){

        while($row =mysqli_fetch_assoc($result)){
            // session_start();
            $_SESSION["name"] = $row['name'];
            $_SESSION["email"] = $row['email'];
            $_SESSION["id"] = $row['id'];
            $_SESSION["role"] = $row['role'];
            header("Location:{$hostname}/index.php");
        }
    }else{
        echo '<script>alert("Username and Password are not match.")</script>';
    }
}
            ?>
               
                <hr class="mx-2">
                <div class="my-2 p-2">
                    <a href="./signup.php"><button class="btn btn-success w-100 p-2 fw-semibold  ">Create New Account</button></a>
                </div>
            </div>
           
        </div>

    </div>
</div>
<?php
include "footer.php";

?>