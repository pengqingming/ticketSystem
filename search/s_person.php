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
//获取表单中提交过来的值
$key1 = isset($_GET['key1'])?trim($_GET['key1']):'';
$sql = "select * from ticket where p_name like '%{$key1}%'";
$query = mysql_query($sql);
$data = array();
if (!empty($key1)&&mysql_num_rows($query)) {
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
 	<form method="get" action="">
		<input type="text" id="s" name="key1" value="" />
		<input type="submit" id="x" value="Search" />
	</form> 
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
					<td><?php echo $i ?></td>
					<td><?php echo $value['idnum']?></td>	
					<td><?php echo $value['p_department']?></td>
					
					<td><?php echo $value['payment']?></td>
					<td><?php echo $value['p_name']?></td>	
					<td><?php echo $value['money']?></td>
					
					
					<td><?php echo $value['dateline']?></td>
					<td><?php echo $value['ticketcompany']?></td>
				
					<td><a href="#">详情</a></td>
					</tr>
				<?php $i++; endforeach ?>
			
			</table>
		<?php endif;?>
</body>
</html>