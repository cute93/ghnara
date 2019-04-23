<?
	if(!isset($_POST["pid"]) || !isset($_POST["ppass"])) {
		echo ("<script>alert('아이디와 패스워드를 입력하세요..');history.back();</script>");
		exit;
	}
	$pid = $_POST["pid"];
	$ppass = $_POST["ppass"];
	
	$qry = "select managername, managerlevel, managerpassword from manager_table where uid='$pid'";
	include("dbconn.php");
	$result = mysqli_query($dbconn, $qry);
	$rows = mysqli_num_rows($result);
	$row = mysqli_fetch_row($result);
		
	if(!$rows){
		mysqli_free_result($result);
		mysqli_close($dbconn);
		echo ("<script>alert('아이디가 존재하지 않습니다..관리자에게 문의하세요..');history.back();</script>");
		exit;
	}
	if($ppass != $row[2]){
		mysqli_free_result($result);
		mysqli_close($dbconn);
		echo ("<script>alert('비밀번호가 일치하지 않습니다..');history.back();</script>");
		exit;
	}
	if($row[1]==0){
		mysqli_free_result($result);
		mysqli_close($dbconn);
		echo ("<script>alert('관리자에 대한 승인이 떨어지지 않은 상태입니다.. 관리자 승인을 요청하세요!!');history.back();</script>");
		exit;
	}
	setcookie('cid', $pid, time()+86400);
	setcookie('clevel', $row[1], time()+86400);
    setcookie('cname', $row[0], time()+86400);  
	mysqli_free_result($result);
	mysqli_close($dbconn);
?>

<meta http-equiv="refresh" content="0;url='index.php'">
