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

	$getid = $_GET["fid"];
?>
<div class="content">
<div class="logout"><a href="logout.php">Logout</a></div>
	<?=$cookiename?>님 로그인 되었습니다..<br>
<?
	
	$qry = "select * from manager_table where uid='$getid'";

	include("dbconn.php");
	$result = mysqli_query($dbconn, $qry);
	$row = mysqli_fetch_row($result);
	echo("<h1>$row[1] 의 정보</h1>");
	echo ("매니저이름 : $row[1] <br>");
	echo ("신청아이디 : $row[0] <br>");
	echo ("매니저전화 : $row[3] <br>");
	echo ("현재상태 : [<font color='red'>");
	switch($row[4]){
	case 0:
		echo '매니저신청';
		break;
    case 1:
		echo '샵매니저';
		break;
    case 2:
		echo '매니저관리';
		break;
    default:
		echo '총괄매니저';
		break;
	}
	echo ("</font>]<br>");
	
?>
<form method="POST" action="changemanager.php">
<input type="hidden" name="fid" value="<?=$getid?>">
<select name="fstatus">
<option value="0">초기화
<option value="1" selected>샵매니저
<option value="2">매니저관리
<option value="10">총괄매니저
</select>
<input type="submit" value="승인">
<br><br>

<?
	}
	echo("</div>");
	include("./footer.html");
?>