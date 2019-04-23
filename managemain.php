<?
	include("./intro.html");
?>
<div class="content">
<h1>관리자 메뉴</h1>
<?
	$pid = $_GET['fid'];
	include("dbconn.php");
	$query = "select * from ghnara where shopid='$pid'";
	$result = mysqli_query($dbconn, $query);
	$row = mysqli_fetch_row($result);
	echo $row[1]."상점의 접수상태입니다.<br>";
    echo "상점 : $row[1]<br>";
    echo "업주 : $row[2]<br>";
    echo "전화번호 : $row[3]<br>";
    echo "주소 : $row[4]<br>";
    echo "대표메뉴1 : $row[5]<br>";
    echo "대표메뉴2 : $row[6]<br><br>";
	echo "현재상태 [<font color='red'>";
	switch($row[7]){
	case 0:
		echo "접수";
		break;
    case 1:
		echo "확인";
		break;
    case 2:
		echo "견적요청";
		break;
    case 3:
		echo "앱제작중";
		break;
    case 4:
		echo "AS상태";
		break;
        case 5:
		echo "AS죵료";
		break;
    
	}
?>
</font>]입니다.
<br><br>
<?
if($row[7] != 0){
?>
<a href="manageminus.php?fid=<?=$row[0]?>">이전단계</a>
<?
}
?>
<?
if($row[7] != 5){
?>
<a href="manageplus.php?fid=<?=$row[0]?>">다음단계</a>
<?
}
	include("resultclose.php");
?>
</div>
<?
	include("./footer.html");
?>