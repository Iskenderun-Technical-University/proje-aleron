<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="Content-Language" content="tr">
	<meta charset="utf-8">
    <meta name="author" content="ALERON">
    	<link rel="shortcut icon" href="assets/paye.ico">  
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">        
        
        <title>ALERON - Dijital Pano</title>

</head>
	<style type="text/css">
	body{
			font-family: 'Montserrat', sans-serif;
			/*background:url(images/back.png);*/
			background-repeat:no-repeat;
			background-attachment:fixed;
			background-position:center;		
			
	}	
	</style>
<?php
		include("vt.php");
	
?>
<body>
<form id="form1" name="form1" method="post" action="kontrol.php?veri=15">
<table width="550" height="150" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#64C5B1" style="border-radius: 15px;">
    <tbody>
      <tr>
        <td colspan="2" align="center" style="border-top-left-radius: 15px;border-top-right-radius: 15px;">NÖBET YERLERİ KAYIT</td>
      </tr>
      <tr>
        <td>Yer Adı:</td>
        <td>
			<input type="text" name="nobet" id="nobet" style="width: 250px;" required>		
		  </td>
      </tr>
      <tr>
        <td colspan="2" align="center" style="border-bottom-right-radius: 15px;border-bottom-left-radius: 15px;"><input type="submit" name="submit" id="submit" value="KAYDET"></td>
      </tr>
    </tbody>
  </table>
</form><p></p>
	<table width="400" border="0" align="center"><caption><h3>Kayıtlı Nöbet Yerleri</h3></caption>		
	  <tbody>
		  <tr><td colspan="2"><hr></td></tr>
<?php
			$listele=mysqli_query($baglan, "select * from nobetler_tbl order by yer");
			while($oku=mysqli_fetch_assoc($listele)){
				echo "<tr><td>".$oku["yer"]."</td><td width='40'><a href='kontrol.php?veri=16&id=".$oku["id"]."' title='Sil'><img src='images/delete.png' width='30' height='30'></a></td></tr>";
			}
			mysqli_close($baglan);
	?>      
		</tbody>
</table>
</body>
</html>
