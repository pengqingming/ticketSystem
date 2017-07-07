<?php 
require_once 'connect.php';
require_once 'hanshu.php';
require_once 'page.func.php';
// $rows = getAllmes();
// if(!$rows){
// 	alertMes("没有信息，请先添加!","./admin/ticket.add.php");
// 	exit;
// }else{
error_reporting(0);
$sql = "select * from ticket";
$totalRows = getResultNum($sql);
$pageSize = 10;
$totalPage = ceil($totalRows/$pageSize);
$page = $_REQUEST['page']?(int)$_REQUEST['page']:1;
if ($page<1||$page==null||!is_numeric($page)) {
	$page = 1;
}
if ($page>$totalPage) {
	$page = $totalPage;
}
$offset = ($page-1)*$pageSize;
$sql = "select * from ticket limit {$offset},{$pageSize}";
$rows=fetchAll($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style></style>
</head>
<body>
	<div class="bottonbox">
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
			<?php $i=1;  foreach ($rows as $row):?>
			<tr>
				<td><?php echo $i?></td>
				<td><?php echo $row["idnum"]?></td>
				<td><?php echo $row["p_department"]?> </td>
				<td><?php echo $row['payment']?></td>
				<td><?php echo $row["p_name"]?> </td>
				<td><?php echo $row['money'] ?> </td>
				<td><?php echo $row['dateline'] ?></td>
				<td><?php echo $row["ticketcompany"]?></td>
				<td><input type="button" onclick="showContent(<?php echo $row['idnum'];?>)" value = "详情">  </td>
			</tr>
			<?php $i++; endforeach;?>
			<?php if($totalRows>$pageSize):?>
				<tr style="text-align: center;">
					<td colspan="8"><?php echo showPage($page, $totalPage);?></td>
				</tr>
			<?php endif;?>
		</table>
		
	</div>
</div>
</div>
</body>
<script type="text/javascript">
	function showContent(id){
		parent.location='admin/content.php/?idnum='+id;
	}

</script>
</html>