<?php

session_start();

$_SESSION['signin']=false;
$_SESSION['signup']=false;
$_SESSION['showAlert']=false;

$server = "localhost";
$username = "root";
$password = "";
$database="hackdatabase"; 

   
$conn=mysqli_connect($server, $username, $password,$database);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email=$_REQUEST['email'];
    $contact=$_REQUEST['contact'];

    if(!$conn){
        echo 'SERVER NOT RESPONDING, We regret for the inconvenience.';
    }
    else{
        $sql="SELECT * FROM `signup` where `email`='$email' AND `contact`='$contact'";

        $result=mysqli_query($conn, $sql);
        $num= mysqli_num_rows($result);
        $_SESSION['signin']=true;
        if($num){
            $_SESSION['email']=$email;
            $_SESSION['contact']=$contact;

            $_SESSION['signin']=true;
            $_SESSION['showAlert']=true;
        }
    
    }
    header('Location:index.php');
}
?>

