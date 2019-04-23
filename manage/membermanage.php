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
	if($cookielevel<2){
?>
    <script>alert('shop매니저는 접근할 수 없습니다..');</script>
	<meta http-equiv="refresh" content="0;url='index.php'">
<?
	}
?>
<div class="content">
<div class="logout"><a href="logout.php">Logout</a></div>
	<?=$cookiename?>님 로그인 되었습니다..<br><br>
<?
	include("dbconn.php");
	$query = "select * from manager_table order by managerlevel";
	$result = mysqli_query($dbconn, $query);
	echo "<table width='100%' border='1' cellspacing='0'>";
	echo "<tr><th>manager ID</th><th>Manager Name</th><th>전화번호</th><th>Manager Level</th><th>접수</th></tr>";
	while($row = mysqli_fetch_row($result)){
		echo "<tr><td> $row[0] </td><td> $row[1] </td><td> $row[3] </td><td> $row[4] ";
		if( $row[3] == 0){
			echo "<img src='../img/new.jpg' width='30' alt='new'>";
		}
		$putid = $row[shopid];
		echo "</td><td><a href='managemember.php?fid=$row[0]'>";
		
		switch($row[4]){
	case 0:
		echo '매니저 신청';
		break;
    case 1:
		echo 'shop매니저';
		break;
    case 2:
		echo '견적요청';
		break;
    case 3:
		echo '앱제작중';
		break;
    case 4:
		echo 'AS상태';
		break;
    case 5:
		echo 'AS죵료';
		break;
    default:
		echo '최종관리자';
	}
		
		echo "</a></td></tr>";
	}
	echo "</table>";
	include("resultclose.php");
?>
<br><br>
<form><input type="button" value="페이지 새로 고침" onClick="window.location.reload()"></form>	
<?
	}
	echo("</div>");
	include("./footer.html");
?>