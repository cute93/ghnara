<?
	include("./intro.html");
?>
<div class="content">
<h1>관리자 메뉴</h1>
<?
	$pid = $_GET['fid'];
	include("dbconn.php");
	$query = "update ghnara set progress = progress - 1 where shopid=$pid";
	$result = mysqli_query($dbconn, $query);
	if($result){
		echo " 프로젝트의 상태가 강등되었습니다..";
	}else{
		echo " 데이터베이스에 오류가 있습니다.";
	}
	include("dbclose.php");
?>
<br><br>

<form method="post" action="manage.php">
<input type="hidden" name="pid" value="manager">
<input type="hidden" name="ppass" value="manager123">
<input type="submit" value="관리자홈">
</form>
</div>
<?
	include("./footer.html");
?>