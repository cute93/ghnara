
<?
$dbconn = mysqli_connect("localhost", "ghnara", "ghnara", "ghnaradb");
mysqli_query($dbconn, "set names utf8");
if (!$dbconn){
	echo "Error : Unable to connect to MySQL.".PHP_EOL;
	echo "Debugging errno : ".mysqli_connect_errno().PHP_EOL;
    echo "Debugging error : ".mysqli_connect_error().PHP_EOL;
	include("footer.html");
	exit;
}

?>