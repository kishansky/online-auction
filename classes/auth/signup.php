<?php
include "header.php";

$genOtp = rand(1000, 9999);
?>
<div class="col-12 col-sm-6">
    <div class="row vh-100 text-center  justify-content-center align-items-center px-2">
        <div class="chaudai w-sm-50 border border-1 h-auto m-2 rounded-3 bg-white shadow-lg" data-aos="flip-left" data-aos-duration="2000">
            <div data-aos="fade" data-aos-duration="2000" data-aos-delay="1000">
                <form action="">
                    <div class="my-2 p-2">
                        <input id="name" class="w-100 p-3 rounded-2 border border-1 form-control" type="text" placeholder="Full Name" name="name">
                    </div>
                    <div class="my-2 p-2">
                        <input id="email" class="w-100 p-3 rounded-2 border border-1 form-control" type="email" placeholder="Email" name="email">
                    </div>
                    <div class="my-2 p-2">
                        <input id="password" class="w-100 p-3 rounded-2 border border-1 form-control" type="password" placeholder="Password" name="password">
                    </div>
                    <span class="my-2 p-2" id="massage">
                    </span>
                    <div class="my-2 p-2">
                        <li id="otp" class="btn btn-primary w-100 p-2">Send OTP</li>
                    </div>
                    <div id="hide" class="d-none">
                    <div class="my-2 p-2">
                        <input id="code" class="w-100 p-3 rounded-2 border border-1 form-control" type="password" placeholder="OTP" name="otp">
                    </div>
                        <div class="my-2 p-2">
                            <button id="signup" name="signup" type="submit" value="Submit" class="btn btn-success w-100 p-2" >Signup</button>
                        </div>
                    </div>

                </form>
                <div class="my-2 p-2">
                    <a href="./login.php">Have Already Account?</a>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
	function next() {
		var element = document.getElementById("hide");
		element.classList.remove("d-none");
	}
</script>
<!-- <script type="text/javascript" src="./js/jquery.js"></script> -->
<script>
	$(document).ready(function() {

		$("#otp").click(function() {
			var email = $("#email").val();
			var name = $("#name").val();
			var otp = <?= json_encode($genOtp, JSON_UNESCAPED_UNICODE); ?>;

			$.ajax({
				url: "otp.php",
				type: "POST",
				data: {
					name: name,
					email: email,
					otp: otp
				},
				success: function(data) {
					$("#massage").html(data);
                    next();
				}

			});
		});
		$("#signup").click(function() {
			var email = $("#email").val();
			var name = $("#name").val();
			var password = $("#password").val();
			var otp = $("#code").val();
			var genOtp = <?= json_encode($genOtp, JSON_UNESCAPED_UNICODE); ?>;

			$.ajax({
				url: "conform-signup.php",
				type: "POST",
				data: {
					name: name,
					email: email,
					otp: otp,
					password: password,
					genOtp: genOtp
				},
				success: function(data) {
					if (data == "success") {
						window.location.href = 'http://localhost/online-auction/index.php';
					} else {
						$("#response").html(data);
					}
				}

			});
		});
	});
</script>

<?php
include "footer.php";
?>