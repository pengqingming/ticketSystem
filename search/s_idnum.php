<?php 
require_once('../connect.php');
require_once '../hanshu.php';
#require_once 'doAction.php';
// function checkLogined(){
// 	if ($_SESSION[adminId]=="") {
// 		alertMes("请先登录","login.php");
// 	}
// }
session_start();
// checkLogined();
error_reporting(0);

$key = isset($_GET['key'])?trim($_GET['key']):'';
$sql = "select * from ticket where idnum like '$key'";
$query = mysql_query($sql);
$data = array();
if (!empty($key)&&mysql_num_rows($query)) {
	while($row = mysql_fetch_assoc($query)){
		$data[] = $row;
	}
}
?>
<!DOCTYPE html>
<html >
<head>
	<meta content = "charset=utf8" />
	<title>票号查询系统</title>
	<style type="text/css">
		form{
			margin-top: 2%;
			margin-left: 35%;
			padding-bottom: 20px;
		}
	</style>
</head>
<body>
	<!--查询功能-->
	<form method="get" action="">
		<input type="text" id="s" name="key" value="" />
		<input type="submit" id="x" value="Search" />
	</form> 
	<?php
	if( !($data[0]['idnum']==$key)){
		echo "<span>没有记录此信息</span>";
		echo "<input type='submit' name='button' id='add' value='添加' onclick =\"window.location.href='../admin/ticket.add.php'\"/>";
			#echo "<script>window.location.href = './admin/ticket.add.php'</script>";
	}else{
		?>
		
		<?php if( $data):?>
			<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>序号</th>
			<th>发票号</th>
			<th>报销部门</th>
			<th>报销金额</th>
			<th>报销人</th>
			<th>开票金额</th>
			<th>开票日期</th>
			<th>购买方单位</th>
			<th>操作</th>
		</tr>
			<?php $i=1; foreach($data as $key => $value): ?>
			<tr>
				<td><?php echo $i?></td>
				<td><?php echo $value['idnum']?></td>	
				<td><?php echo $value['p_department']?></td>
				<td><?php echo $value['p_name']?></td>
				<td><?php echo $value['payment']?></td>	
				<td><?php echo $value['money']?></td>
				<td><?php echo $value['dateline']?></td>
				<td><?php echo $value['ticketcompany']?></td>
				<td><input type="button" onclick="showContent(<?php echo $value['idnum'];?>)" value = "详情"></td>
			</tr>
		<?php  $i++; endforeach ?>

	<?php endif;?>
	</table>
		<?php	
	}
	?>
</body>
<script type="text/javascript">
	function showContent(id){
		top.location='../admin/content.php/?idnum='+id;
	}

</script>
</html>