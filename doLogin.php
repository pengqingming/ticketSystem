<?php 
require_once 'connect.php';
require_once 'hanshu.php';

session_start();
@$username=$_POST['username'];
$username=addslashes($username);
@$password=$_POST['password'];
$sql="select * from admin where username='{$username}' and password='{$password}'";
$row=checkAdmin($sql);

if($row){
	$_SESSION['adminName']=$row['username'];
	$_SESSION['adminId']=$row['id'];
	// print_r($_SESSION['adminId']);
	alertMes("登陆成功","index.php");
}else{
  	alertMes("登陆失败，重新登陆","login.php");
}


?>








