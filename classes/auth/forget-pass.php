<?php
include "header.php";
$genOtp = rand(1000, 9999);
?>
<div class="col-12 col-sm-6">
    <div class="row vh-100 text-center  justify-content-center align-items-center px-2">
        <div class="chaudai w-sm-50 border border-1 h-auto m-2 rounded-3 bg-white shadow-lg" data-aos="flip-left" data-aos-duration="2000">
            <div data-aos="fade" data-aos-duration="2000" data-aos-delay="1000">
                <form action="" autocomplete="off">
                    <div class="my-2 p-2">
                        <!-- <label for="email">Email</label><br> -->
                        <input id="email" class="w-100 p-3 rounded-2 border border-1 form-control" type="email" placeholder="Email" name="email">
                    </div>

                    <div class="my-2 p-2">
                        <li id="f-otp" class="btn btn-primary w-100 p-2">Send OTP</li>
                    </div>
                </form>

                    <div id="hide" class="d-none">
                        <span class="my-2 p-2" id="massage">
                            <div style="font-size:14px;color:red;">OTP has been sent to your email...</div>
                        </span>

                        <div class="my-2 p-2">
                            <input id="code" class="w-100 p-3 rounded-2 border border-1 form-control" type="password" placeholder="OTP" name="otp">
                        </div>
                        <div class="my-2 p-2">
                            <!-- <label for="email">Password</label><br> -->
                            <input id="password" class="w-100 p-3 rounded-2 border border-1 form-control" type="password" placeholder="Password" name="password">
                        </div>
                        <div class="my-2 p-2">
                            <!-- <label for="email">Password</label><br> -->
                            <input id="cpassword" class="w-100 p-3 rounded-2 border border-1 form-control" type="text" placeholder="Conform Password" name="password">
                        </div>
                        <div class="my-2 p-2">
                            <button id="change" name="signup" type="submit" value="Submit" class="btn btn-success w-100 p-2">Change</button>
                        </div>
                    </div>

            </div>
        </div>

    </div>
</div>
<script>
	function next(){
		var element = document.getElementById("hide");
  		element.classList.remove("d-none");
	}
	</script>
<script> 
    $(document).ready(function(){
           
        $("#f-otp").click(function(){
            var email = $("#email").val();
            var otp = <?= json_encode($genOtp, JSON_UNESCAPED_UNICODE); ?>;
            
            $.ajax({
                url : "forget-otp.php",
                type : "POST",
                data : {email:email,otp:otp},
                success : function(data){
                    if (data == 'Success') {
						next();
					} else {
						alert(data);
					}
                }
              
            });
        });
        $("#change").click(function(){
            var email = $("#email").val();
            var name = $("#name").val();
            var password = $("#password").val();
            var cpassword = $("#cpassword").val();
            var otp = $("#code").val();
            var genOtp = <?= json_encode($genOtp, JSON_UNESCAPED_UNICODE); ?>;
            
            $.ajax({
                url : "change-password.php",
                type : "POST",
                data : {email:email,otp:otp,password:password,cpassword:cpassword,genOtp:genOtp},
                success : function(data){
                    if (data == "success") {
						window.location.href = 'http://localhost/online-auction/classes/auth/login.php';
					} else {
						alert(data);
					}
                }
              
            });
        });
    });
</script>

<?php
include "footer.php";
?>