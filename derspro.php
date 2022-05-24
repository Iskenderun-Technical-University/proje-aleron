<?php
        include("admin/vt.php");
		date_default_timezone_set("Asia/Baghdad");		

		$gun=date("w");
		if($gun==0){
			$gun=7;
		}
		$saat=date("H:i:s");
		$sayisi=0;
		$toplam=0;
		$derssay=mysqli_query($baglan, "select * from program_tbl where gun=$gun order by konum");
		while($sayibul=mysqli_fetch_assoc($derssay)){
			if($saat>=date("H:i", strtotime($sayibul["baslama"])) and $saat<=date("H:i", strtotime($sayibul["bitis"]))){
				$sayisi++;
			}
		}
		$toplam=$sayisi*3;
		$toplam-=(round($sayisi/3,0));
	if($toplam==0){
		$toplam=60;
	}

?>
<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="Content-Language" content="tr">
	<meta http-equiv="Refresh" content="<?=$toplam;?>">	
	<meta charset="utf-8">
	<meta http-equiv="Refresh" content="60">
    <meta name="author" content="ALERON">
    	<link rel="shortcut icon" href="assets/paye.ico">  
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">        
        
        <title>ALERON - Dijital Pano</title>
    <link rel='stylesheet' href='images/bootstrap.min.css'>	
    <style>
        body{
            overflow: hidden;
        }
    </style>
</head>

<body>
    <?php
		
		//echo "<p>$saat";	
	
		$renk=array("#00bbfc","#bd463f","#fe413b","#03c03c","#7a86ff","#cd5700","#00008b","#a6569e","#784d2e","#584bb1");	
	
		$saatara=mysqli_query($baglan, "select * from program_tbl where gun=$gun order by konum");
		if($saatbul=mysqli_fetch_assoc($saatara)){    
    ?>
    
	<table border="0" width="95%" align="center"><caption id="baslik"><h3>DERS PROGRAMI</h3></caption><tr><td>

        <marquee direction="up" height="600">
        
<!--        <table class="table table-bordered table-striped">
-->	<?php
        }
		$i=0;
	
/*----------------------------------------------------------------------------------------------*/
		$girisler=array();
        $cikislar=array();
		$saatara=mysqli_query($baglan, "select * from girisler_tbl where gun=$gun");
		while($saatbul=mysqli_fetch_assoc($saatara)){
			$girisler[]=date("H:i", strtotime($saatbul["giris"]));
		}

        $saatara=mysqli_query($baglan, "select * from girisler_tbl where gun=$gun");
		while($saatbul=mysqli_fetch_assoc($saatara)){
			$cikislar[]=date("H:i", strtotime($saatbul["cikis"]));
		}	
        $tensay=1; 
        $diziboyut=count($girisler);                
/*----------------------------------------------------------------------------------------------*/
		$kontrolsayi=0;
		$saatara=mysqli_query($baglan, "select * from program_tbl where gun=$gun order by konum");
		while($saatbul=mysqli_fetch_assoc($saatara)){
			if($saat>=date("H:i", strtotime($saatbul["baslama"])) and $saat<=date("H:i", strtotime($saatbul["bitis"]))){
				$sinifara=mysqli_query($baglan, "select * from siniflar_tbl where id=".$saatbul["sinif"]);
				if($sinifbul=mysqli_fetch_assoc($sinifara)){
					$sinif=$sinifbul["sinif"];
				
				
					echo "<div style='background:".$renk[$i].";border-radius:15px;width:95%;color:white;margin:10px;'>
							<table border='0' width='90%' align='center'>

					";
					echo "<tr><td colspan='2' align='center'><h3>$sinif</h3></td></tr>
							<tr><td width='70'>Ders:</td><td>".$saatbul["ders"]."</td></tr>
							<tr><td>Öğretmen:</td><td>".$saatbul["ogretmen"]."</td></tr>
							<tr><td>Yer:</td><td>".$saatbul["konum"]."</td></tr>
							<tr><td>&nbsp;</td></tr>
							";				
					echo "	</table>
						  </div>";
					$i++;
					if($i==10){
						$i=0;
					}
					//		
					$sayac=0;
				}
			}

//------------------------------------------------------------------------------------------
		
        foreach($girisler as $anh=>$elm){
            //echo "$elm - ".date("H:i");
            if($tensay<$diziboyut){
               if($cikislar[$anh]<date("H:i:s") and date("H:i:s")<$girisler[$anh+1]){
                    if($gun==5){
                        if(date("H:i:s")>="12:40:00" and date("H:i:s")<="13:40:00"){
                            echo "<div style='background:".$renk[$i].";border-radius:15px;width:95%;color:white;margin:10px;padding:30px;'><h1 style='align:center;'><center><h2> ÖĞLE ARASI </h2></center></div>";                        
                        }else if(date("H:i:s")<"15:50:00" and $kontrolsayi==0){
				   echo "<div style='background:".$renk[$i].";border-radius:15px;width:95%;color:white;margin:10px;padding:30px;'><h1 style='align:center;'><center>TENEFÜS SAATİ</center></h2></div>";
							$kontrolsayi=1;
                            break;							
                        }
                    }else{
                        if(date("H:i:s")>="11:50:00" and date("H:i:s")<="12:40:00"){
                            echo "<div style='background:".$renk[$i].";border-radius:15px;width:95%;color:white;margin:10px;padding:30px;'><h1 style='align:center;'><center><h2> ÖĞLE ARASI </h2></center></div>";                        
                        }else if(date("H:i:s")<"15:50:00"){
				   echo "<div style='background:".$renk[$i].";border-radius:15px;width:95%;color:white;margin:10px;padding:30px;'><h1 style='align:center;'><center>TENEFÜS SAATİ</center></h2></div>";
                            break;
                        }
                    }				   
                }
                $tensay++;				
            }
        }
			if(date("H:i:s")>="15:50:00" or date("H:i:s")<="07:50:00"){
				echo "<div style='background:".$renk[$i].";border-radius:15px;width:95%;color:white;margin:10px;padding:30px;'><h1 style='align:center;'><center><h2> Çalışma Saati Dışı </h2></center></div>";   
                break;
			}
									
		}
	?>
<!--	</table>
-->    </marquee>   
</td></tr></table>            
            
    </td></tr></table>	
    
</body>
</html>