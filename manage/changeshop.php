<?
	include("./intro.html");
	if(!isset($_COOKIE["cid"]) || !isset($_COOKIE["cname"]) || !isset($_COOKIE["clevel"])){
?>
	<script>alert('접근이 불허되었습니다..');</script>
	<meta http-equiv="refresh" content="0;url='index.php'">
<?
	}else{
	$cookieid = $_COOKIE["cid"];
	$cookiename = $_COOKIE["cname"];
	$cookielevel = $_COOKIE["clevel"];
?>
<div class="content">
<?
	$getid = $_POST["fid"];
	$getstatus = $_POST["fstatus"];

	include("dbconn.php");
	$qry = "update ghnara set progress='$getstatus' where shopid='$getid'";
	$result = mysqli_query($dbconn, $qry);
	$alertstr= "";
	if($result){
		$alertstr = "상태가 변경되었습니다..";
	}else{
		$alertstr = "DB가 불안정하여 상태가 변경되지 않았습니다.. 관리자에게 문의하세요..";
	}
?>
	<script>alert('<?=$alertstr?>');</script>
	<meta http-equiv="refresh" content="0;url='shopmanage.php'">
<?
	}
	echo("</div>");
	include("./footer.html");
?>