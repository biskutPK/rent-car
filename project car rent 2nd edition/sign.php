<?php
$username = $_POST['username'];
$phone_no = $_POST['phone_no'];
$email = $_POST['email'];
$password = $_POST['password'];


$conn = new mysqli('localhost','root','','rent_car');
if($conn->connect_error){
    die('Connection Failed: '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into user_info(username,phone_no,email,password)
                values(?,?,?,?)");
    $stmt->bind_param("siss",$username,$phone_no,$email,$password);
    $stmt->execute();
    $stmt->close(); 
    $conn->close();
    header('Location:welcome.html');
    exit();
}

?>