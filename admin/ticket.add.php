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
	<div class="session">
		<div class="right">
			<h3>XXXXX电子发票</h3>
			<div class="content">
				<form id="form1" name="form1" method="post" action="ticket.add.handle.php">
					<p>
						<label for="idnum">&nbsp;&nbsp;发票号&nbsp;</label>
						<input type="text" name="idnum" id="idnum" />
						
						<label for="p_department">报销部门</label>
						<input type="text" name="p_department" id="p_department" />
						
						<label for="payment">报销金额</label>
						<input type="text" name="payment" id="payment" />
					</p>
					<p>
						<label for="ticketname" >销售方单位</label>
						<input type="text" name="ticketname" id="ticketname" size="95" />
					</p>
					<p>
						<label for="ticketcompany">购买方单位</label>
						<input type="text" name="ticketcompany" id="ticketcompany" size="95" />
					</p>
					<p>
						<label for="ticketnote">开票内容</label>
						<input name="ticketnote" id="ticketnote" size="55"></input>

						<label for="tickettype">票据类型</label>
						<input name="tickettype" id="tickettype"></input>
					</p>
					<p>
						<label for="p_name">&nbsp;报销人员 </label>
						<input type="text" name="p_name" id="p_name" />
						
						<label for="money">开票金额</label>
						<input type="text" name="money" id="money" />
						
						<label for="dateline">开票时间</label>
						<input type="text" name="dateline" id="dateline" />
					</p>
					<p>
						<input type="submit" name="button" id="button" value="提交" />
						<input type="submit" name="return" id="return" value="返回" onclick = "window.location.href='../index.php'"/>
					</p>

				</form>
			</div>
		</div>
	</div>
</body>
</html>