<?
	include("./intro.html");
?>
<div class="content">
<h1>관리자 메뉴</h1>
<?
	$pid = $_POST['pid'];
	$ppass = $_POST['ppass'];
	$pflag = $_POST['flag'];
	
	if($pid=='manager' && $ppass=='manager123'){
	include("dbconn.php");
	$query = "select * from ghnara where progress<5 order by shopid desc";
	$result = mysqli_query($dbconn, $query);
	echo "<table width='100%' border='1' cellspacing='0'>";
	echo "<tr><th>상호명</th><th>사장님성함</th><th>전화번호</th><th>주소</th><th>메인메뉴1</th><th>메인메뉴2</th><th>진행상태</th><th>접수</th></tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr><td> $row[shopname] </td><td> $row[mastername] </td><td> $row[mastertel] </td><td> $row[shopaddress] </td><td> $row[menu1] </td><td> $row[menu2] </td><td> $row[progress] ";
		if( $row[progress] == 0){
			echo "<img src='img/new.jpg' width='30' alt='new'>";
		}
		$putid = $row[shopid];
		echo "</td><td><a href='managemain.php?fid=$putid'>";
		
		switch($row[7]){
	case 0:
		echo '접수';
		break;
    case 1:
		echo '확인';
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
    
	}
		
		echo "</a></td></tr>";
	}
	echo "</table>";
	include("resultclose.php");
	?>
<br><br>
<form><input type="button" value="페이지 새로 고침" onClick="window.location.reload()"></form>
<?
	}else{
		if($pflag==1)
		{
			echo("<h1> 관리자의 ID와 비밀번호가 틀립니다...</h1>");
		}
?>

	<form action="manage.php" method="post">
	관리자ID : <input type="text" name="pid" size="5"><br>
	비밀번호 : <input type="password" name="ppass" size="5"><br>
	<input type="hidden" name="flag" value="1">
	<input type="submit" value="관리자로그인">
	</form>
</div>
<?
	}
	include("./footer.html");
?>