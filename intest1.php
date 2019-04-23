<!doctype html>
<html lang="ko-kr">
<head>
<title>연습</title>
<meta charset="utf-8" />
</head>
<body>
<?
	$name = $_POST["wname"];
      	$test = $_POST["wcont"];
	echo "내이름은 $name / $test ";
	$conn = mysqli_connect("localhost", "root", "apmsetup", "appdb");
	mysqli_query($conn, "set names utf8");
	$query = "insert into mytest(uname, utest) values('".$name."','".$test."')";
	$result = mysqli_query($conn, $query);
	if($result==1){
	    echo "<br> $query";
	}else{
		echo "DB실패!!";
	}
?>
</body>
</html>