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
    <link rel='stylesheet' href='images/bootstrap.min.css'>	
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
  <style class="INLINE_PEN_STYLESHEET_ID">
    .tabs {
		margin-top: 5px;
		padding-top: 10px;
  display: flex;
  flex-wrap: wrap;  
  width: 100%;
}

.tabs label {
  order: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 1rem 2rem;
  margin-right: 0.2rem;
  cursor: pointer;
  background-color: #fff;
  font-weight: bold;
  transition: background ease 0.3s;
}

.tabs .tab {
  order: 9;
  flex-grow: 1;
  width: 100%;
  height: 100%;
  display: none;
  padding: 1rem;
  background: #fff;
  padding: 20px;
}

.tabs input[type=radio] {
  display: none;
}

.tabs input[type=radio]:checked + label {
  background: #dfd7ca;
}

.tabs input[type=radio]:checked + label + .tab {
  display: block;
}

@media (max-width: 465px) {
  .tabs .tab,
.tabs label {
    order: initial;
  }

  .tabs label {
    width: 100%;
    margin-left: 50px;
  }
}
body {
  min-height: 100vh;
  box-sizing: border-box;  
  font-weight: 300;
  line-height: 1.5;
  margin: 0 auto;
	max-width: 95%;  
  display: flex;
}
	  
/* width */
::-webkit-scrollbar {
  width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}    
	  
  </style>
	
<?php
		include("vt.php");
        $girisler=array();
        $cikislar=array();
    
            for($j=1;$j<=10;$j++){    
                $saatara=mysqli_query($baglan, "select * from girisler_tbl where ders=$j and gun=1");
                if($saatbul=mysqli_fetch_assoc($saatara)){
                    $ptsgir[]=$saatbul["giris"];
                    $ptscik[]=$saatbul["cikis"];
                }
            }    
            for($j=1;$j<=10;$j++){    
                $saatara=mysqli_query($baglan, "select * from girisler_tbl where ders=$j and gun=2");
                if($saatbul=mysqli_fetch_assoc($saatara)){
                    $salgir[]=$saatbul["giris"];
                    $salcik[]=$saatbul["cikis"];
                }
            }    
            for($j=1;$j<=10;$j++){    
                $saatara=mysqli_query($baglan, "select * from girisler_tbl where ders=$j and gun=3");
                if($saatbul=mysqli_fetch_assoc($saatara)){
                    $cargir[]=$saatbul["giris"];
                    $carcik[]=$saatbul["cikis"];
                }
            }    
            for($j=1;$j<=10;$j++){    
                $saatara=mysqli_query($baglan, "select * from girisler_tbl where ders=$j and gun=4");
                if($saatbul=mysqli_fetch_assoc($saatara)){
                    $pergir[]=$saatbul["giris"];
                    $percik[]=$saatbul["cikis"];
                }
            }    
            for($j=1;$j<=10;$j++){    
                $saatara=mysqli_query($baglan, "select * from girisler_tbl where ders=$j and gun=5");
                if($saatbul=mysqli_fetch_assoc($saatara)){
                    $cumgir[]=$saatbul["giris"];
                    $cumcik[]=$saatbul["cikis"];
                }
            }    
            for($j=1;$j<=10;$j++){    
                $saatara=mysqli_query($baglan, "select * from girisler_tbl where ders=$j and gun=6");
                if($saatbul=mysqli_fetch_assoc($saatara)){
                    $ctsgir[]=$saatbul["giris"];
                    $ctscik[]=$saatbul["cikis"];
                }
            }    
            for($j=1;$j<=10;$j++){    
                $saatara=mysqli_query($baglan, "select * from girisler_tbl where ders=$j and gun=7");
                if($saatbul=mysqli_fetch_assoc($saatara)){
                    $pazgir[]=$saatbul["giris"];
                    $pazcik[]=$saatbul["cikis"];
                }
            }    
	   
    
?>
<body>
<form id="form1" name="form1" method="post" action="kontrol.php?veri=24">
<!--------------------------------------------------------------------------------------------------------------------------------->
<center><button id="btngnc" title="Değişiklikleri Kaydet" style="width: 250px; border-radius: 15px; font-size: 18px; height: 35px;background-color:forestgreen;color:white;">KAYDET / GÜNCELLE</button></center>	
 <div class="tabs">	 
	<input type="radio" name="tabs" id="tabone" value="1" checked="checked">
    <label for="tabone"><h3>Pazartesi</h3></label>	 
    <div class="tab">
	  
	<h1>GİRİŞ - ÇIKIŞ SAATLERİ</h1>
	<table border="0" width="500"><tr><td><table class="table table-bordered table-striped">
<?php		
		for($i=1;$i<=10;$i++){
            if(isset($ptsgir[$i-1])){
                $giris=$ptsgir[$i-1];
            }else{
                $giris="00:00";
            }
            if(isset($ptscik[$i-1])){
                $cikis=$ptscik[$i-1];
            }else{
                $cikis="00:00";
            }
			echo "<tr><td>$i. DERS</td><td><input type='time' name='g1g$i' value='".$giris."'></td><td><input type='time' name='g1c$i' value='".$cikis."'></td></tr>";
		}
?>       
		</table>
	</td></tr></table>
	</div>
	 
	<input type="radio" name="tabs" id="tabtwo" value="2">
    <label for="tabtwo"><h3>Salı</h3></label>
    <div class="tab">
	<h1>GİRİŞ - ÇIKIŞ SAATLERİ</h1>
	<table border="0" width="500"><tr><td><table class="table table-bordered table-striped">
<?php		
		for($i=1;$i<=10;$i++){
            if(isset($salgir[$i-1])){
                $giris=$salgir[$i-1];
            }else{
                $giris="00:00";
            }
            if(isset($salcik[$i-1])){
                $cikis=$salcik[$i-1];
            }else{
                $cikis="00:00";
            }
			echo "<tr><td>$i. DERS</td><td><input type='time' name='g2g$i' value='".$giris."'></td><td><input type='time' name='g2c$i' value='".$cikis."'></td></tr>";
		}
?>       
		</table>
	</td></tr></table>
	</div>
    <input type="radio" name="tabs" id="tabthree" value="3">
    <label for="tabthree"><h3>Çarşamba</h3></label>
    <div class="tab">
	<h1>GİRİŞ - ÇIKIŞ SAATLERİ</h1>
	<table border="0" width="500"><tr><td><table class="table table-bordered table-striped">
<?php		
		for($i=1;$i<=10;$i++){
            if(isset($cargir[$i-1])){
                $giris=$cargir[$i-1];
            }else{
                $giris="00:00";
            }
            if(isset($carcik[$i-1])){
                $cikis=$carcik[$i-1];
            }else{
                $cikis="00:00";
            }
			echo "<tr><td>$i. DERS</td><td><input type='time' name='g3g$i' value='".$giris."'></td><td><input type='time' name='g3c$i' value='".$cikis."'></td></tr>";
		}
?>       
		</table>
	</td></tr></table>
	</div>
	<input type="radio" name="tabs" id="tabfour" value="4">
    <label for="tabfour"><h3>Perşembe</h3></label>
    <div class="tab">
	<h1>GİRİŞ - ÇIKIŞ SAATLERİ</h1>
	<table border="0" width="500"><tr><td><table class="table table-bordered table-striped">
<?php		
		for($i=1;$i<=10;$i++){
            if(isset($pergir[$i-1])){
                $giris=$pergir[$i-1];
            }else{
                $giris="00:00";
            }
            if(isset($percik[$i-1])){
                $cikis=$percik[$i-1];
            }else{
                $cikis="00:00";
            }
			echo "<tr><td>$i. DERS</td><td><input type='time' name='g4g$i' value='".$giris."'></td><td><input type='time' name='g4c$i' value='".$cikis."'></td></tr>";
		}
?>       
		</table>
	</td></tr></table>
	</div>
	<input type="radio" name="tabs" id="tabfive" value="5">
    <label for="tabfive"><h3>Cuma</h3></label>
    <div class="tab">
	<h1>GİRİŞ - ÇIKIŞ SAATLERİ</h1>
	<table border="0" width="500"><tr><td><table class="table table-bordered table-striped">
<?php		
		for($i=1;$i<=10;$i++){
            if(isset($cumgir[$i-1])){
                $giris=$cumgir[$i-1];
            }else{
                $giris="00:00";
            }
            if(isset($cumcik[$i-1])){
                $cikis=$cumcik[$i-1];
            }else{
                $cikis="00:00";
            }
			echo "<tr><td>$i. DERS</td><td><input type='time' name='g5g$i' value='".$giris."'></td><td><input type='time' name='g5c$i' value='".$cikis."'></td></tr>";
		}
?>       
		</table>
	</td></tr></table>
	</div>
	<input type="radio" name="tabs" id="tabsix" value="6">
    <label for="tabsix"><h3>Cumartesi</h3></label>
    <div class="tab">
	<h1>GİRİŞ - ÇIKIŞ SAATLERİ</h1>
	<table border="0" width="500"><tr><td><table class="table table-bordered table-striped">
<?php		
		for($i=1;$i<=10;$i++){
            if(isset($ctsgir[$i-1])){
                $giris=$ctsgir[$i-1];
            }else{
                $giris="00:00";
            }
            if(isset($ctscik[$i-1])){
                $cikis=$ctscik[$i-1];
            }else{
                $cikis="00:00";
            }
			echo "<tr><td>$i. DERS</td><td><input type='time' name='g6g$i' value='".$giris."'></td><td><input type='time' name='g6c$i' value='".$cikis."'></td></tr>";
		}
?>       
		</table>
	</td></tr></table>
	</div>
	<input type="radio" name="tabs" id="tabseven" value="7">
    <label for="tabseven"><h3>Pazar</h3></label>
    <div class="tab">
	<h1>GİRİŞ - ÇIKIŞ SAATLERİ</h1>
	<table border="0" width="500"><tr><td><table class="table table-bordered table-striped">
<?php		
		for($i=1;$i<=10;$i++){
            if(isset($pazgir[$i-1])){
                $giris=$pazgir[$i-1];
            }else{
                $giris="00:00";
            }
            if(isset($pazcik[$i-1])){
                $cikis=$pazcik[$i-1];
            }else{
                $cikis="00:00";
            }
			echo "<tr><td>$i. DERS</td><td><input type='time' name='g7g$i' value='".$giris."'></td><td><input type='time' name='g7c$i' value='".$cikis."'></td></tr>";
		}
?>       
		</table>
	</td></tr></table>
	</div>
	 
</div>	

<!--------------------------------------------------------------------------------------------------------------------------------->
</form>	
</body>
</html>
