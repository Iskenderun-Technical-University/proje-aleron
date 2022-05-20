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
	
?>
<body>
<form id="form1" name="form1" method="post" action="kontrol.php?veri=17">
<!--------------------------------------------------------------------------------------------------------------------------------->
 <div class="tabs">
	<input type="radio" name="tabs" id="tabone" value="1" checked="checked">
    <label for="tabone"><h3>Pazartesi</h3></label>
    <div class="tab">
	  
	<h1>NÖBETÇİ BELİRLEME</h1>
<?php
        $renk   =array("#fee4cb","#e9e7fd","#e0f4fc","#ffd3e2","#c8f7dc","#d5deff");
        $bar    =array("#ff942e","#4f3ff0","#096c86","#df3670","#34c471","#4067f9");
        $i=0;
		$sayac=1;
        $listele=mysqli_query($baglan, "select * from nobetler_tbl order by yer");
        while($oku1=mysqli_fetch_assoc($listele)){   
                if($i==5){
                    $i=0;
                }
            
?>        
            <div style="background-color:<?=$renk[$i];?>;width: 390px;padding: 25px; border-radius: 20px;float:left;margin:5px; text-align:center;" align="left">
				
<?php
			echo $oku1["yer"];	
			
			$varmi=mysqli_query($baglan, "select * from nobetpro_tbl where gun=1 and konum='".$oku1["yer"]."'");
			if($var=mysqli_fetch_assoc($varmi)){
				$ogr=$var["ogretmen"];
			}else{
				$ogr="";
			}
?>							
		<p>&nbsp;</p>
		<input type="text" name="ptsogretmen<?=$sayac;?>" id="ogretmen<?=$sayac;?>" value="<?=$ogr;?>" style="width: 200px;text-align: center;color:red;" placeholder="Nöbetçi Seç" list="ogretmenler<?=$sayac;?>" >
		  <datalist id="ogretmenler<?=$sayac;?>">
				<?php
					$listele2=mysqli_query($baglan, "select * from ogretmenler_tbl order by adi");
					while($oku=mysqli_fetch_assoc($listele2)){
						echo "<option value='".$oku["adi"]."'>";
					}			  	
			  ?>
			</datalist>					
            </div>
<?php
            $i++;
			$sayac++;
        }
?>       
	</div>
	 
	<input type="radio" name="tabs" id="tabtwo" value="2">
    <label for="tabtwo"><h3>Salı</h3></label>
    <div class="tab">
	<h1>NÖBETÇİ BELİRLEME</h1>
<?php
        $renk   =array("#fee4cb","#e9e7fd","#e0f4fc","#ffd3e2","#c8f7dc","#d5deff");
        $bar    =array("#ff942e","#4f3ff0","#096c86","#df3670","#34c471","#4067f9");
        $i=0;
		$sayac=1;
        $listele=mysqli_query($baglan, "select * from nobetler_tbl order by yer");
        while($oku1=mysqli_fetch_assoc($listele)){   
                if($i==5){
                    $i=0;
                }
            
?>        
            <div style="background-color:<?=$renk[$i];?>;width: 390px;padding: 25px; border-radius: 20px;float:left;margin:5px; text-align:center;" align="left">
<?php
			echo $oku1["yer"];
			$varmi=mysqli_query($baglan, "select * from nobetpro_tbl where gun=2 and konum='".$oku1["yer"]."'");
			if($var=mysqli_fetch_assoc($varmi)){
				$ogr=$var["ogretmen"];
			}else{
				$ogr="";
			}
			
?>		
		<p>&nbsp;</p>
		<input type="text" name="salogretmen<?=$sayac;?>" id="ogretmen<?=$sayac;?>" value="<?=$ogr;?>" style="width: 200px;text-align: center;color:red;" placeholder="Nöbetçi Seç" list="ogretmenler<?=$sayac;?>" >
		  <datalist id="ogretmenler<?=$sayac;?>">
				<?php
					$listele2=mysqli_query($baglan, "select * from ogretmenler_tbl order by adi");
					while($oku=mysqli_fetch_assoc($listele2)){
						echo "<option value='".$oku["adi"]."'>";
					}			  	
			  ?>
			</datalist>					
				
            </div>
<?php
            $i++;
			$sayac++;
        }
?>       
	
	</div>	  
	<input type="radio" name="tabs" id="tabthree" value="3">
    <label for="tabthree"><h3>Çarşamba</h3></label>
    <div class="tab">
	<h1>NÖBETÇİ BELİRLEME</h1>
<?php
        $renk   =array("#fee4cb","#e9e7fd","#e0f4fc","#ffd3e2","#c8f7dc","#d5deff");
        $bar    =array("#ff942e","#4f3ff0","#096c86","#df3670","#34c471","#4067f9");
        $i=0;
		$sayac=1;
        $listele=mysqli_query($baglan, "select * from nobetler_tbl order by yer");
        while($oku1=mysqli_fetch_assoc($listele)){   
                if($i==5){
                    $i=0;
                }
            
?>        
            <div style="background-color:<?=$renk[$i];?>;width: 390px;padding: 25px; border-radius: 20px;float:left;margin:5px; text-align:center;" align="left">
<?php
			echo $oku1["yer"];
			$varmi=mysqli_query($baglan, "select * from nobetpro_tbl where gun=3 and konum='".$oku1["yer"]."'");
			if($var=mysqli_fetch_assoc($varmi)){
				$ogr=$var["ogretmen"];
			}else{
				$ogr="";
			}
?>							
		<p>&nbsp;</p>
		<input type="text" name="carogretmen<?=$sayac;?>" id="ogretmen<?=$sayac;?>" value="<?=$ogr;?>" style="width: 200px;text-align: center;color:red;" placeholder="Nöbetçi Seç" list="ogretmenler<?=$sayac;?>" >
		  <datalist id="ogretmenler<?=$sayac;?>">
				<?php
					$listele2=mysqli_query($baglan, "select * from ogretmenler_tbl order by adi");
					while($oku=mysqli_fetch_assoc($listele2)){
						echo "<option value='".$oku["adi"]."'>";
					}			  	
			  ?>
			</datalist>					
            </div>
<?php
            $i++;
			$sayac++;
        }
?>       
	
	</div>	  
	<input type="radio" name="tabs" id="tabfour" value="4">
    <label for="tabfour"><h3>Perşembe</h3></label>
    <div class="tab">
	<h1>NÖBETÇİ BELİRLEME</h1>
<?php
        $renk   =array("#fee4cb","#e9e7fd","#e0f4fc","#ffd3e2","#c8f7dc","#d5deff");
        $bar    =array("#ff942e","#4f3ff0","#096c86","#df3670","#34c471","#4067f9");
        $i=0;
		$sayac=1;
        $listele=mysqli_query($baglan, "select * from nobetler_tbl order by yer");
        while($oku1=mysqli_fetch_assoc($listele)){   
                if($i==5){
                    $i=0;
                }
            
?>        
            <div style="background-color:<?=$renk[$i];?>;width: 390px;padding: 25px; border-radius: 20px;float:left;margin:5px; text-align:center;" align="left">
<?php
			echo $oku1["yer"];
			$varmi=mysqli_query($baglan, "select * from nobetpro_tbl where gun=4 and konum='".$oku1["yer"]."'");
			if($var=mysqli_fetch_assoc($varmi)){
				$ogr=$var["ogretmen"];
			}else{
				$ogr="";
			}
?>							
		<p>&nbsp;</p>
		<input type="text" name="perogretmen<?=$sayac;?>" id="ogretmen<?=$sayac;?>" value="<?=$ogr;?>" style="width: 200px;text-align: center;color:red;" placeholder="Nöbetçi Seç" list="ogretmenler<?=$sayac;?>" >
		  <datalist id="ogretmenler<?=$sayac;?>">
				<?php
					$listele2=mysqli_query($baglan, "select * from ogretmenler_tbl order by adi");
					while($oku=mysqli_fetch_assoc($listele2)){
						echo "<option value='".$oku["adi"]."'>";
					}			  	
			  ?>
			</datalist>					
            </div>
<?php
            $i++;
			$sayac++;
        }
?>       
	
	</div>	  
	<input type="radio" name="tabs" id="tabfive" value="5">
    <label for="tabfive"><h3>Cuma</h3></label>
    <div class="tab">
	<h1>NÖBETÇİ BELİRLEME</h1>
<?php
        $renk   =array("#fee4cb","#e9e7fd","#e0f4fc","#ffd3e2","#c8f7dc","#d5deff");
        $bar    =array("#ff942e","#4f3ff0","#096c86","#df3670","#34c471","#4067f9");
        $i=0;
		$sayac=1;
        $listele=mysqli_query($baglan, "select * from nobetler_tbl order by yer");
        while($oku1=mysqli_fetch_assoc($listele)){   
                if($i==5){
                    $i=0;
                }
            
?>        
            <div style="background-color:<?=$renk[$i];?>;width: 390px;padding: 25px; border-radius: 20px;float:left;margin:5px; text-align:center;" align="left">
<?php
			echo $oku1["yer"];
			$varmi=mysqli_query($baglan, "select * from nobetpro_tbl where gun=5 and konum='".$oku1["yer"]."'");
			if($var=mysqli_fetch_assoc($varmi)){
				$ogr=$var["ogretmen"];
			}else{
				$ogr="";
			}
?>							
 		<p>&nbsp;</p>
		<input type="text" name="cumogretmen<?=$sayac;?>" id="ogretmen<?=$sayac;?>" value="<?=$ogr;?>" style="width: 200px;text-align: center;color:red;" placeholder="Nöbetçi Seç" list="ogretmenler<?=$sayac;?>" >
		  <datalist id="ogretmenler<?=$sayac;?>">
				<?php
					$listele2=mysqli_query($baglan, "select * from ogretmenler_tbl order by adi");
					while($oku=mysqli_fetch_assoc($listele2)){
						echo "<option value='".$oku["adi"]."'>";
					}			  	
			  ?>
			</datalist>					
           </div>
<?php
            $i++;
			$sayac++;
        }
?>       
	
	</div>	  
	<input type="radio" name="tabs" id="tabsix" value="6">
    <label for="tabsix"><h3>Cumartesi</h3></label>
    <div class="tab">
	<h1>NÖBETÇİ BELİRLEME</h1>
<?php
        $renk   =array("#fee4cb","#e9e7fd","#e0f4fc","#ffd3e2","#c8f7dc","#d5deff");
        $bar    =array("#ff942e","#4f3ff0","#096c86","#df3670","#34c471","#4067f9");
        $i=0;
		$sayac=1;
        $listele=mysqli_query($baglan, "select * from nobetler_tbl order by yer");
        while($oku1=mysqli_fetch_assoc($listele)){   
                if($i==5){
                    $i=0;
                }
            
?>        
            <div style="background-color:<?=$renk[$i];?>;width: 390px;padding: 25px; border-radius: 20px;float:left;margin:5px; text-align:center;" align="left">
<?php
			echo $oku1["yer"];
			$varmi=mysqli_query($baglan, "select * from nobetpro_tbl where gun=6 and konum='".$oku1["yer"]."'");
			if($var=mysqli_fetch_assoc($varmi)){
				$ogr=$var["ogretmen"];
			}else{
				$ogr="";
			}
?>							
		<p>&nbsp;</p>
		<input type="text" name="ctsogretmen<?=$sayac;?>" id="ogretmen<?=$sayac;?>" value="<?=$ogr;?>" style="width: 200px;text-align: center;color:red;" placeholder="Nöbetçi Seç" list="ogretmenler<?=$sayac;?>" >
		  <datalist id="ogretmenler<?=$sayac;?>">
				<?php
					$listele2=mysqli_query($baglan, "select * from ogretmenler_tbl order by adi");
					while($oku=mysqli_fetch_assoc($listele2)){
						echo "<option value='".$oku["adi"]."'>";
					}			  	
			  ?>
			</datalist>					
            </div>
<?php
            $i++;
			$sayac++;
        }
?>       
	
	</div>	  
	<input type="radio" name="tabs" id="tabseven" value="7">
    <label for="tabseven"><h3>Pazar</h3></label>
    <div class="tab">
	<h1>NÖBETÇİ BELİRLEME</h1>
<?php
        $renk   =array("#fee4cb","#e9e7fd","#e0f4fc","#ffd3e2","#c8f7dc","#d5deff");
        $bar    =array("#ff942e","#4f3ff0","#096c86","#df3670","#34c471","#4067f9");
        $i=0;
		$sayac=1;
        $listele=mysqli_query($baglan, "select * from nobetler_tbl order by yer");
        while($oku1=mysqli_fetch_assoc($listele)){   
                if($i==5){
                    $i=0;
                }
            
?>        
            <div style="background-color:<?=$renk[$i];?>;width: 390px;padding: 25px; border-radius: 20px;float:left;margin:5px; text-align:center;" align="left">
<?php
			echo $oku1["yer"];
			$varmi=mysqli_query($baglan, "select * from nobetpro_tbl where gun=7 and konum='".$oku1["yer"]."'");
			if($var=mysqli_fetch_assoc($varmi)){
				$ogr=$var["ogretmen"];
			}else{
				$ogr="";
			}
?>							
		<p>&nbsp;</p>
		<input type="text" name="pazogretmen<?=$sayac;?>" id="ogretmen<?=$sayac;?>" value="<?=$ogr;?>" style="width: 200px;text-align: center;color:red;" placeholder="Nöbetçi Seç" list="ogretmenler<?=$sayac;?>" >
		  <datalist id="ogretmenler<?=$sayac;?>">
				<?php
					$listele2=mysqli_query($baglan, "select * from ogretmenler_tbl order by adi");
					while($oku=mysqli_fetch_assoc($listele2)){
						echo "<option value='".$oku["adi"]."'>";
					}			  	
			  ?>
			</datalist>					
            </div>
<?php
            $i++;
			$sayac++;
        }
?>       
	
	</div>	  
	 
</div>	

<center><button id="btngnc" title="Değişiklikleri Kaydet" style="width: 250px; border-radius: 15px; font-size: 18px; height: 35px;background-color:forestgreen;color:white;">KAYDET / GÜNCELLE</button></center>
<!--------------------------------------------------------------------------------------------------------------------------------->
</form>	
</body>
</html>
