<?php
	require_once('../connect.php');
	//把传递过来的信息入库,在入库之前对所有的信息校验 
	if (!(isset($_POST['idnum'])&&(!empty($_POST['idnum'])))) {
		echo "<script> alert('电子票号不能为空'');window.location.href = ticket.add.php'</script>";
	}

	$idnum = $_POST['idnum'];
	$p_department = $_POST['p_department'];
	$p_name = $_POST['p_name'];
	$payment = $_POST['payment'];
	$money = $_POST['money'];
	$ticketname = $_POST['ticketname'];
	$ticketcompany = $_POST['ticketcompany'];
	$ticketnote  = $_POST['ticketnote'];
	$dateline = $_POST['dateline'];
	$tickettype = $_POST['tickettype'];
	$dateline = $_POST['dateline'];
	$insertsql = "insert into ticket(idnum,p_department,p_name,payment,ticketname,ticketcompany,ticketnote,tickettype,money,dateline) values('$idnum','$p_department','$p_name',$payment,'$ticketname', '$ticketcompany','$ticketnote','tickettype',$money,'$dateline')";
	// echo $insertsql;
	if(mysql_query($insertsql)){
		echo "<script>alert('记录信息成功');window.location = '../index.php'</script>";
	}else{
		echo "<script>alert('记录信息失败');window.location = '../index.php'</script>";
	}
?>