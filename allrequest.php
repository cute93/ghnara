<?
	include("intro.html");
?>
<div class="content">
<?
	foreach($_GET as $key => $value){
		echo "$key : $value <br>";
	}
	foreach($_POST as $key => $value){
		echo "$key : $value <br>";
	}
?>
</div>
<?
	include("footer.html");
?>