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
	<?=$cookiename?>님 로그인 되었습니다..<br>
<?
	echo("<h1>쿠키</h1>");
	foreach($_COOKIE as $key => $value)
	{
		echo ("$key : $value <br>");
	}
	echo("<h1>GET</h1>");
	foreach($_GET as $key => $value)
	{
		echo ("$key : $value <br>");
	}
	echo("<h1>POST</h1>");
	foreach($_POST as $key => $value)
	{
		echo ("$key : $value <br>");
	}
	echo("<h1>_SERVER</h1>");
	foreach($_SERVER as $key => $value)
	{
		echo ("$key : $value <br>");
	}
	echo("<h1>_ENV</h1>");
	foreach($_ENV as $key => $value)
	{
		echo ("$key : $value <br>");
	}
	echo("<h1>_FILES </h1>");
	foreach($_FILES as $key => $value)
	{
		echo ("$key : $value <br>");
	}
	echo("<h1>_REQUEST </h1>");
	foreach($_REQUEST as $key => $value)
	{
		echo ("$key : $value <br>");
	}
	echo("<h1>_SESSION </h1>");
	foreach($_SESSION as $key => $value)
	{
		echo ("$key : $value <br>");
	}
?>
<br><br>

<?
	}
	echo("</div>");
	include("./footer.html");
?>