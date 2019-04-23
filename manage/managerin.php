<?
include("intro.html");
?>

<script lang="javascript">
<!--
function check() {
  if(fr.fid.value == "") {
    alert("신청하시고 싶은 ID를 입력해 주세요.");
    fr.fid.focus();
    return false;
  }
  if(fr.fname.value == "") {
    alert("매니저의 이름을 입력해 주세요.");
    fr.fname.focus();
    return false;
  }
  if(fr.fpass1.value == "" || fr.fpass2.value == "") {
    alert("비밀번호를 2개 모두 입력해 주세요.");
	fr.fpass1.value = "";
	fr.fpass2.value = "";
    fr.fpass1.focus();
    return false;
  }
  if(fr.fpass1.value != fr.fpass2.value ) {
    alert("비밀번호가 다릅니다...");
	fr.fpass1.value = "";
	fr.fpass2.value = "";
    fr.fpass1.focus();
    return false;
  }
  if(fr.ftel.value == "") {
    alert("전화번호를 입력해 주세요.");
    fr.ftel.focus();
    return false;
  }
  var telreg  = /^01([0|1|6|7|8|9]?)-?([0-9]{3,4})-?([0-9]{4})$/;
  if(!telreg.test(fr.ftel.value)){
	  alert(fr.ftel.value+"는(은) 잘못된 휴대폰 번호입니다.");
	  fr.ftel.value="";
	  fr.ftel.focus();
	  return false;
	 }
  return true;
}
//-->
</script>
<div class="content">
<h1>샵매니저 신청</h1>

<form method="post" action="newmanager.php" name="fr" onsubmit="return check()">
<table width="80%">
<tr>
<td align="right">신청ID : </td><td><input type="text" name="fid">
</tr>
<tr>
<td align="right">매니저이름 : </td><td><input type="text" name="fname">
</tr>
<tr>
<td align="right">패스워드1 : </td><td><input type="password" name="fpass1">
</tr>
<tr>
<td align="right">패스워드2 : </td><td><input type="password" name="fpass2">
</tr>
<tr>
<td align="right">전화번호 : </td><td><input type="text" name="ftel">
</tr>
<tr>
<td colspan="2" align="center"> (*) 매니저를 신청하시고 내선번호 1613으로 전화주세요... </td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" value="신청하기"> <input type="reset" value="취   소"></td>
</tr>
<table>
</form>
</div>

<?
include("footer.html");
?>