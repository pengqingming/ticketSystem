<?php 
require_once '../connect.php';
require_once '../hanshu.php';
require_once '../page.func.php';

session_start();
#checkLogined();
$rows=getAllmes();
// if(!$rows){
// 	alertMes("没有相应分类，请先添加分类!!", "addCate.php");
// }
$idnum=$_REQUEST['idnum'];
$proInfo=getProById($idnum);
// print_r($idnum);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta content = "charset=utf8">
	<title>Document</title>
	<style type="text/css">
		body{
			margin:0px;
		}
		.right{
			width: 900px;
			height: 600px;
			position: absolute;
			left: 50%;
			top: 60%;
			margin-top: -300px;
			margin-left: -450px;
			text-align: center;
		}
		label{
			width: 100px;
		}
	</style>
</head>
<body>
	
	<div class="right">
		<h3>XXXXX电子发票</h3>
		<div class="content">
			<form method="post" action="../../doAction.php?act=editTicket&idnum=<?php echo $idnum;?>" >
				<p>
					<label for="idnum">&nbsp;&nbsp;发票号&nbsp;</label>
					<input type="text" name="idnum" id="idnum" value="<?php echo $proInfo['idnum'] ?>" disabled = "true"/>

					<label for="p_department">报销部门</label>
					<input type="text" name="p_department" id="p_department" value="<?php echo $proInfo['p_department']?>" />

					<label for="payment">报销金额</label>
					<input type="text" name="payment" id="payment" value="<?php echo $proInfo['payment']?>" />
				</p>
				<p>
					<label for="ticketname" >销售方单位</label>
					<input type="text" name="ticketname" id="ticketname" size="95" value="<?php echo $proInfo['ticketname']?>"/>
				</p>
				<p>
					<label for="ticketcompany">购买方单位</label>
					<input type="text" name="ticketcompany" id="ticketcompany" size="95"  value="<?php echo $proInfo['ticketcompany']?>"/>
				</p>
				<p>
					<label for="ticketnote">开票内容</label>
					<input name="ticketnote" id="ticketnote" size="55" value="<?php echo $proInfo['ticketnote']?>"></input>

					<label for="tickettype">票据类型</label>
					<input name="tickettype" id="tickettype" value="<?php echo $proInfo['tickettype']?>"></input>
				</p>
				<p>
					<label for="p_name">&nbsp;报销人员 </label>
					<input type="text" name="p_name" id="p_name"  value="<?php echo $proInfo['p_name']?>"/>

					<label for="money">开票金额</label>
					<input type="text" name="money" id="money" value="<?php echo $proInfo['money']?>" />

					<label for="dateline">开票时间</label>
					<input type="text" name="dateline" id="dateline" value="<?php echo $proInfo['dateline']?>"/>
				</p>
				<p>
					<input type="submit"  id="button" value="修改" />
					<input type="button" id="return" value="返回" onclick = "window.location.href='../../index.php'"/>
				</p>

			</form>
		</div>
	</div>
	
</body>
</html>