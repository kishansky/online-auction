<?php
include("config.php");
ob_start();
session_start();


    $name = strip_tags($_POST['name']);
    $email = strip_tags($_POST['email']);
    $password = strip_tags(md5($_POST['password']));
    $otp = strip_tags($_POST['otp']);
    $genOtp = strip_tags($_POST['genOtp']);
    $output = "";
if (empty($name) || empty($email) || empty($password) || empty($otp) || empty($genOtp)) {
    $output = "<div class='alert alert-danger'>All fields are requried.</div>";
}else if($otp == $genOtp){

        $sql = "SELECT email FROM users WHERE email = '{$email}'";
        $result = mysqli_query($conn, $sql) or die("Query failed.");
     
        if(mysqli_num_rows($result) >0){
            $output= "Email Already Exists";
        } else {
            $sql1 = "INSERT INTO users (name,email,password)
                 VALUES ('{$name}','{$email}','{$password}')";
            if(mysqli_query($conn,$sql1)) {
                $sql2 = "SELECT id,name,email,role FROM users WHERE email = '{$email}'";
                $result1 = mysqli_query($conn, $sql2) or die("Query failed.");
                if(mysqli_num_rows($result1)>0){
                
                    while($row =mysqli_fetch_assoc($result1)){
                        $_SESSION["name"] = $row['name'];
                        $_SESSION["email"] = $row['email'];
                        $_SESSION["id"] = $row['id'];
                        $_SESSION["role"] = $row['role'];
                        $output = "success";
                    } 
                }
            }
        }
        

    }else{
        $output = "<div class='alert alert-danger'>OTP not matched.</div>";
    }
echo $output;
?>