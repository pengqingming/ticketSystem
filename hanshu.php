<?php 
// error_reporting(0);
function alertMes($mes,$url){
	echo "<script>alert('{$mes}');</script>";
	echo "<script>window.location.href='{$url}';</script>";
}

function fetchOne($sql){
	$result=mysql_query($sql);
	$row=mysql_fetch_assoc($result);
	return $row;
}

function insert($table,$array){
	$keys=join(",",array_keys($array));
	$vals="'".join("','",array_values($array))."'";
	$sql="insert {$table}($keys) values({$vals})";
	mysql_query($sql);
	return mysql_insert_id();
}

function addAdmin(){
	$arr=$_POST;
	$arr['password']=$_POST['password'];
	if(insert("admin",$arr)){
		$mes="添加成功!<br/><a href='addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>查看管理员列表</a>";
	}else{
		$mes="添加失败!<br/><a href='addAdmin.php'>重新添加</a>";
	}
	return $mes;
}
function getResultNum($sql){
	$result = mysql_query($sql);
	return mysql_num_rows($result);
}
function checkAdmin($sql){
	return fetchOne($sql);
}
function update($table,$array,$where=null){
	foreach($array as $key=>$val){
		if($str==null){
			$sep="";
		}else{
			$sep=",";
		}
		$str.=$sep.$key."='".$val."'";
	}
		$sql="update {$table} set {$str} ".($where==null?null:" where ".$where);

		$result=mysql_query($sql);
		// var_dump($result);
		// var_dump(mysql_affected_rows());exit;
		if($result){
			return mysql_affected_rows();
		}else{
			return false;
		}
}
function editTicket($where){
	$arr=$_POST;
	if(update("ticket", $arr,$where)){
		$mes="分类修改成功!<br/><a href='index.php'>查看信息</a>";
	}else{
		$mes="分类修改失败!<br/><a href='./admin/ticket.update.php'>重新修改</a>";
	}
	return $mes;
}

function checkLogined(){
    if($_SESSION['adminId']==""&&$_COOKIE['adminId']==""){
        alertMes("请先登陆","login.php");
    }
}
function fetchAll($sql,$result_type=MYSQL_ASSOC){
	$result = mysql_query($sql);
	while (@$row = mysql_fetch_array($result,$result_type)) {
		$rows[] = $row;
	}
	return $rows;
}
function getAllmes(){
	$sql = "select * from ticket;";
	$rows = fetchAll($sql);
	return $rows;
}

function getProById($id){
	$sql="select * from ticket where idnum = {$id}";
	$row=fetchOne($sql);
	return $row;
}

//删除功能
function delete($table,$where=null){
	$where=$where==null?null:" where ".$where;
	$sql="delete from {$table} {$where}";
	mysql_query($sql);
	return mysql_affected_rows();
}
// function delTicket($id){

// }

function delTicket($idnum){
	if(delete("ticket","idnum={$idnum}")){
		$mes="删除成功!<br/><a href='index.php'>查看信息</a>";
	}else{
		$mes="删除失败!<br/><a href='listAdmin.php'>请重新删除</a>";
	}
	return $mes;
}
 ?>
