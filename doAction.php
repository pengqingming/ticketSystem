<?php 
require_once 'connect.php';
require_once 'hanshu.php';
session_start();

$act=$_REQUEST['act'];
$idnum=$_REQUEST['idnum'];
if($act=="editTicket"){
	$where="idnum={$idnum}";
	$mes=editTicket($where);
}elseif($act=="delTicket"){
	$mes=delTicket($idnum);
}elseif($act=="addAdmin"){
	$mes=addAdmin();
}
?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<?php 
	if($mes){
		echo $mes;
	}
?>
</body>
</html>