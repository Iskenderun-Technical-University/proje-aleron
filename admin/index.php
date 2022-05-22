<?php
	ob_start();
	session_start();
	if(isset($_SESSION["kullanici"]) && isset($_SESSION["kontrol"]))
	{	
		header("Location: oturum.php");
	}
	else
	{
?>
<!DOCTYPE html>
<html lang="tr-TR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Yetkili Kullanıcı Girişi</title>

<style>
.textbox1 {
	background: url(images/inputText.png) no-repeat;
	background-position: 5px -7px !important;
	font-size: 16px;
	border: none;
	width: 180px;
	font-family: Tahoma, Geneva, sans-serif;
	color:#F00;	
	padding-top: 10px;
	padding-right: 10px;
	padding-bottom: 10px;
	padding-left: 5px;
}
.textbox2 {
	background: url(images/inputText.png) no-repeat;
	background-position: 5px -55px !important;
	font-size: 16px;
	border:none;
	width: 180px;
	font-family: Tahoma, Geneva, sans-serif;
	color:#F00;
	padding-top: 10px;
	padding-right: 10px;
	padding-bottom: 10px;
	padding-left: 5px;
}
.textbox3 {
		font-size:16px;
    padding: 10px 10px 10px 10px;
    width: 200px;
	text-align:center;
	font-family: Tahoma, Geneva, sans-serif;
	color:#F00;
    border: 1px solid #CCC;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    -moz-box-shadow: 0 1px 1px #ccc inset, 0 1px 0 #fff;
    -webkit-box-shadow: 0 1px 1px #CCC inset, 0 1px 0 #FFF;
    box-shadow: 0 1px 1px #CCC inset, 0 1px 0 #FFF;
}

.textbox1:focus {
    background-color: transparent;
    outline: none;

}
.textbox2:focus {
    background-color: transparent;
    outline: none;

}
#form1 table tr td font b {
	font-family: Tahoma, Geneva, sans-serif;
}
#form1 table tr td font {
	font-family: Tahoma, Geneva, sans-serif;
}
.button{
	background-image:url(images/giris_01.gif);}
.button:hover{
	background-image:url(images/giris_02.gif);}
</style>
<link rel="shortcut icon" href="images/terminal.ico"> 
	<script language="javascript">
		function gonder(){
			window.location.href="../index.php";
		}
	</script>
</head>

<body bgcolor="#000000" background="images/indir.png">
<form id="form1" name="form1" action="kontrol.php?veri=1" method="post"><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
<table width="802" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#666666" style="border-radius:15px;" background="images/back.gif">
  <tr>
    <td height="56" align="center"><font size="5" color="#FFFFFF"><B>YÖNETİM PANELİ</B></font></td>
  </tr>
  <tr>
    <td height="270">
    
<table width="650" height="235" border="0" align="center" cellpadding="0" cellspacing="0" background="images/arka.png">
  <tr>
    <td width="29%" height="61">&nbsp;</td>
    <td width="41%" rowspan="2"><div style="width: 100%; height: 100%; background-color: transparent;cursor: pointer;" onClick="gonder()"></div></td>
    <td width="30%">&nbsp;</td>
  </tr>
  <tr>
    <td height="114" align="right"><input name="kad" type="text" class="textbox1" id="kad" value="" required placeholder="Kullanıcı adı" onclick="this.value=''" /></td>    
    <td><input name="sifre" type="text" class="textbox2" id="sifre" value="" required placeholder="Şifre"  onclick="this.value='';this.type='password'" onfocus="this.value='';this.type='password';"/></td>
  </tr>
  <tr>
    <td colspan="3" align="center">&nbsp;</td>
    </tr>
</table>    
    
    </td>
    </tr>

    <td height="58" align="center"><br />
	    <input name="bt" type="submit" value="" style="border-radius:10px; width:154px; height:48px; background-size:100% 100%; background-image:url(images/giris_02.gif); cursor:pointer;"/>    <p>
		<p>&nbsp;</p>

    </td>
    </tr>
</table>

<p>&nbsp;</p>
<p>
  <?php
	if(isset($_SESSION["mesg"]))
	{
		echo "<br><center><font color='red'>".$_SESSION["mesg"]."</font>";
		$_SESSION["mesg"]="";
	}
?>
  <br><br>
</p>
</form>
</body>
</html>
<?php
	}
?>	