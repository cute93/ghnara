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
<div class="logout"><a href="logout.php">Logout</a></div>
	<?=$cookiename?>님 로그인 되었습니다..<br><br>
<?
	include("dbconn.php");
	$query = "select * from ghnara where progress<5 order by shopid desc";
	$result = mysqli_query($dbconn, $query);
	echo "<table width='100%' border='1' cellspacing='0'>";
	echo "<tr><th>상호명</th><th>사장님성함</th><th>전화번호</th><th>주소</th><th>메인메뉴1</th><th>메인메뉴2</th><th>진행상태</th><th>접수</th></tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr><td> $row[shopname] </td><td> $row[mastername] </td><td> $row[mastertel] </td><td> $row[shopaddress] </td><td> $row[menu1] </td><td> $row[menu2] </td><td> $row[progress] ";
		if( $row[progress] == 0){
			echo "<img src='../img/new.jpg' width='30' alt='new'>";
		}
		$putid = $row[shopid];
		echo "</td><td><a href='manageshop.php?fid=$putid'>";
		
		switch($row[7]){
	case 0:
		echo '접수';
		break;
    case 1:
		echo '담당자배정';
		break;
    case 2:
		echo '면담진행(견적협의중)';
		break;
    case 3:
		echo '앱제작중';
		break;
    case 4:
		echo '완료(AS상태)';
		break;
    case 5:
		echo '완료(AS종료)';
		break;
    
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