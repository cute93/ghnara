<?
include("intro.html");
?>
<div class="content">
<?
$postid = $_POST["fid"];
include("dbconn.php");
$qry = "select uid from manager_table where uid='$postid'";
$result = mysqli_query($dbconn, $qry);
$rows = mysqli_num_rows($result);

if($rows){
	echo "<script>alert('중복된 ID가 존재합니다. 다른 매니저 ID를 지정하세요.. ');</script>";
	include("resultclose.php");
	echo "<meta http-equiv='refresh' content='0;url=managerin.php'>";
	exit;
}
$postname = $_POST["fname"];
$posttel = $_POST["ftel"];
$postpass = $_POST["fpass1"];

$qry = "insert into manager_table(uid, managername, managerpassword, managertelephone) values('$postid', '$postname', '$postpass', '$posttel')";
$result = mysqli_query($dbconn, $qry);

if($result){
	echo "<script>alert('매니저 ID [ $postid ]로 신청되었습니다. ');</script>";
	echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}else {
	echo "<script>alert('DB오류!!! 다시 신청해 보세요!! ');</script>";
	echo "<meta http-equiv='refresh' content='0;url=managerin.php'>";
}

include("dbclose.php");
?>
</div>
<?
include("footer.html");
?>