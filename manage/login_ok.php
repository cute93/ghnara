<?
	if(!isset($_POST["pid"]) || !isset($_POST["ppass"])) {
		echo ("<script>alert('���̵�� �н����带 �Է��ϼ���..');history.back();</script>");
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
		echo ("<script>alert('���̵� �������� �ʽ��ϴ�..�����ڿ��� �����ϼ���..');history.back();</script>");
		exit;
	}
	if($ppass != $row[2]){
		mysqli_free_result($result);
		mysqli_close($dbconn);
		echo ("<script>alert('��й�ȣ�� ��ġ���� �ʽ��ϴ�..');history.back();</script>");
		exit;
	}
	if($row[1]==0){
		mysqli_free_result($result);
		mysqli_close($dbconn);
		echo ("<script>alert('�����ڿ� ���� ������ �������� ���� �����Դϴ�.. ������ ������ ��û�ϼ���!!');history.back();</script>");
		exit;
	}
	setcookie('cid', $pid, time()+86400);
	setcookie('clevel', $row[1], time()+86400);
    setcookie('cname', $row[0], time()+86400);  
	mysqli_free_result($result);
	mysqli_close($dbconn);
?>

<meta http-equiv="refresh" content="0;url='index.php'">
