<?
	include("./intro.html");
?>
<div class="content">
<?
	$ftitle = $_POST["ftitle"];
    $fmaster = $_POST["fmaster"];
    $ftel = $_POST["ftel"];
    $faddress = $_POST["faddress"];
    $fmenu1 = $_POST["fmenu1"];
    $fmenu2 = $_POST["fmenu2"];
	$query = "insert into ghnara(shopname, mastername, mastertel, shopaddress, menu1, menu2) values('$ftitle', '$fmaster', '$ftel', '$faddress', '$fmenu1', '$fmenu2')";
	include("dbconn.php");
	$result = mysqli_query($dbconn, $query);
	if(!$result){
?>
<h1>DataBase에 오류가 생겼습니다..</h1>
010-3642-4356(사장 : 김하윤)에게 전화주시기바랍니다..<br>
전화 상담후 방문하여 원하시는 앱결과물로 견적드리겠습니다.<br><br>
항상 최선을다하는 GH Nara Development가 되겠습니다.<br><br>
<a href="./"> HOME </a> <a href="project.html"> 확인하기 </a>
</div>
<?
	}else{
?>
<h1>정상적으로 신청되었습니다.</h1>
몇일 내로 사장님의 전화번호로 연락을 드리겠습니다.<br>
혹시 2~3일이 지나도 연락이 없으시면, 010-3642-4356(사장 : 김하윤)에게 전화주시기바랍니다..<br>
전화 상담후 방문하여 원하시는 앱결과물로 견적드리겠습니다.<br><br>
항상 최선을다하는 GH Nara Development가 되겠습니다.<br><br>
<a href="./"> HOME </a> <a href="project.html"> 확인하기 </a>
</div>
<?
}
	include("./dbclose.php");
	include("./footer.html");
?>