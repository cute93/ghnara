<?
	include("intro.html");
?>
<div class="content">
<?
	echo "<h1> ALL REQUEST </h1>";
	echo "<a href='#' onclick='javascript:history.go(-1);'>뒤로</a><br><br>";
	foreach($_REQUEST as $key => $value){
		echo "$key : $value <br>";
	}
?>
</div>
<?
	include("footer.html");
?>