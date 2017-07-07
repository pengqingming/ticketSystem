<?php 
require_once '../connect.php';
require_once '../hanshu.php';
require_once '../page.func.php';

 	$idnum = $_REQUEST['idnum'];
 	$arr = $_POST;
	$where = "idnum={$idnum}";
	if (update("ticket",$arr,$where)){
		alertMes("修改成功",'../../index.php');
	}else{
		alertMes("修改失败",".././index.php");
	}


	// $id = $_REQUEST['id'];
	// $idnum = $_POST['idnum'];
	// $p_department = $_POST['p_department'];
	// $p_name = $_POST['p_name'];
	// $payment = $_POST['payment'];
	// $money = $_POST['money'];
	// $ticketname = $_POST['ticketname'];
	// $ticketcompany = $_POST['ticketcompany'];
	// $ticketnote  = $_POST['ticketnote'];
	// $dateline = $_POST['dateline'];
	// $tickettype = $_POST['tickettype'];
	// $updatesql = "update ticket set idnum='$idnum',p_department='$p_department',p_name='p_name',money='$money',ticketname=$ticketname, ticketcompany='$ticketcompany',ticketnote='$ticketnote',dateline='$dateline',tickettype='$tickettype',where idnum=$id";
	// if(mysql_query($updatesql)){
	// 	echo "<script>alert('修改文章成功');window.location.href='article.manage.php';</script>";
	// }else{
	// 	echo "<script>alert('修改文章失败');window.location.href='article.manage.php';</script>";
	// }
?>
