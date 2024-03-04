<?php
include "header.php";
?>
<div class="col-12 col-sm-6">
    <div class="row vh-100 text-center  justify-content-center align-items-center px-2">
        <div class="chaudai w-sm-50 border border-1 h-auto m-2 rounded-3 bg-white shadow-lg" data-aos="flip-left" data-aos-duration="2000">
            <div data-aos="fade" data-aos-duration="2000" data-aos-delay="1000">
                <form action="">
                    <div class="my-2 p-2">
                        <input class="w-100 p-3 rounded-2 border border-1 form-control" type="text" placeholder="Full Name" name="name">
                    </div>
                    <div class="my-2 p-2">
                        <input class="w-100 p-3 rounded-2 border border-1 form-control" type="email" placeholder="Email" name="email">
                    </div>
                    <div class="my-2 p-2">
                        <input class="w-100 p-3 rounded-2 border border-1 form-control" type="password" placeholder="Password" name="password">
                    </div>
                    <div class="my-2 p-2">
                        <button class="btn btn-success w-100 p-2" name="login">Signup</button>
                    </div>
                </form>
                <div class="my-2 p-2">
                    <a href="./login.php">Have Already Account?</a>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
include "footer.php";
?>