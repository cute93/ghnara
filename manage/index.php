<?
	include("./intro.html");	
	if(!isset($_COOKIE["cid"]) || !isset($_COOKIE["cname"]) || !isset($_COOKIE["clevel"])){
?>
<div class="content">
<h1>관리자 메뉴</h1>
	<form action="login_ok.php" method="post">
	관리자ID : <input type="text" name="pid" size="5"><br>
	비밀번호 : <input type="password" name="ppass" size="5"><br><br>
	<input type="submit" value="관리자로그인">
	<input type="button" value="관리자 신청" onclick="javascript:location.href='managerin.php'">
	</form>
</div>
<?
	}else{
	$cookieid = $_COOKIE["cid"];
	$cookiename = $_COOKIE["cname"];
	$cookielevel = $_COOKIE["clevel"];
?>
<div class="content">
<div class="logout"><a href="logout.php">Logout</a></div>
	<?=$cookiename?>님 로그인 되었습니다..
	<br>--------------------------------------------------------------------<br>
<?
	include("dbconn.php");
	$qry = "select shopid from ghnara where progress=0";
	echo "<br>";
	$result = mysqli_query($dbconn, $qry);
	$rows = mysqli_num_rows($result);
	if($rows){
		echo "새로운 상점예약앱 주문이 있습니다.. <img src='../img/new.jpg' width='50' alt='새로운 상점'><a href='shopmanage.php'>바로가기</a>";
	}else{
		echo "새로운 상점예약앱 주문이 없습니다..";
	}
	echo "<br>";
    $qry = "select uid from manager_table where managerlevel=0";
	echo "<br>";
    $result = mysqli_query($dbconn, $qry);
	$rows = mysqli_num_rows($result);
	if($rows){
		echo "새로운 관리자 요청이 있습니다.. <img src='../img/new.jpg' width='50' alt='새로운 관리자'><a href='membermanage.php'>바로가기</a>";
	}else{
		echo "새로운 관리자 요청이 없습니다..";
	}
	echo "<br><br>--------------------------------------------------------------------<br><br></div>";
	include("resultclose.php");
	}
	include("./footer.html");
?>