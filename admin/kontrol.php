<?php
	@ob_start();
	session_start();
?>	
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Yönetim Paneli</title>
<style type="text/css">
body{
	background-repeat: no-repeat;
	background-size: 100%, 100%	;
	}
</style>
</head>

<body>
<?php
	$gelen=$_REQUEST["veri"];	
	include "vt.php";
	
	
	if($gelen==0)
	{	
		session_destroy();
		header("location: ../index.php");
	}
	
	
	if($gelen==1)
	{
		$kul=$_POST["kad"];
		$sfr=$_POST["sifre"];

			
			$ara=mysqli_query($baglan,"select * from kullanici_tbl where kul_adi='$kul' and sifre='$sfr'") or die("Giriş sorunlu");
			$_SESSION["mesg"]="";
			if($bul=mysqli_fetch_assoc($ara))
			{
				$_SESSION["kullanici"]=$bul["kul_adi"];
				$_SESSION["kontrol"]="aleron";
				mysqli_close($baglan);
				header('Location: oturum.php');
			}
			else
			{			
				mysqli_close($baglan);
				header('Location: hata.php');
			}

	}
	if($gelen==2)
	{
		if($_SESSION["kullanici"]!="" && $_SESSION["kontrol"]="aleron")
		{
			$mslk=$_POST["gorev"];
			
			mysqli_query($baglan, "insert into dersler_tbl (ders) values('$mslk')");
			
			mysqli_close($baglan);
			header('Location: kytders.php');
		}
		else
		{
			mysqli_close($baglan);
			header('Location: hata.php');
		}
	}
	if($gelen==3)
	{
		if($_SESSION["kullanici"]!="" && $_SESSION["kontrol"]="aleron")
		{		
			$sil=$_REQUEST["id"];
			mysqli_query($baglan, "delete from dersler_tbl where id=$sil");
			
		mysqli_close($baglan);
			header('Location: kytders.php');
		}
		else
		{
			mysqli_close($baglan);
			header('Location: hata.php');
		}		
	}
	if($gelen==4)
	{
		if($_SESSION["kullanici"]!="" && $_SESSION["kontrol"]="aleron")
		{
			$v1=$_POST["sinif"];
			$v2=$_POST["sube"];
			$v3=$_POST["alan"];
			
			mysqli_query($baglan, "insert into siniflar_tbl (sinif, alan) values('$v1/$v2', '$v3')");
			
			mysqli_close($baglan);
			header('Location: kytsinif.php');
		}
		else
		{
			mysqli_close($baglan);
			header('Location: hata.php');
		}
	}
	if($gelen==5)
	{
		if($_SESSION["kullanici"]!="" && $_SESSION["kontrol"]="aleron")
		{		
			$sil=$_REQUEST["id"];
			mysqli_query($baglan, "delete from siniflar_tbl where id=$sil");
			
		mysqli_close($baglan);
			header('Location: kytsinif.php');
		}
		else
		{
			mysqli_close($baglan);
			header('Location: hata.php');
		}		
	}
	if($gelen==6)
	{
		if($_SESSION["kullanici"]!="" && $_SESSION["kontrol"]="aleron")
		{
			$mslk=$_POST["gorev"];
			
			mysqli_query($baglan, "insert into ogretmenler_tbl (adi) values('$mslk')");
			
			mysqli_close($baglan);
			header('Location: kytogretmen.php');
		}
		else
		{
			mysqli_close($baglan);
			header('Location: hata.php');
		}
	}
	if($gelen==7)
	{
		if($_SESSION["kullanici"]!="" && $_SESSION["kontrol"]="aleron")
		{		
			$sil=$_REQUEST["id"];
			mysqli_query($baglan, "delete from ogretmenler_tbl where id=$sil");
			
		mysqli_close($baglan);
			header('Location: kytogretmen.php');
		}
		else
		{
			mysqli_close($baglan);
			header('Location: hata.php');
		}		
	}	
	if($gelen==8)
	{
		if($_SESSION["kullanici"]!="" && $_SESSION["kontrol"]="aleron")
		{
			$mslk=$_POST["konum"];
			
			mysqli_query($baglan, "insert into konumlar_tbl (konum) values('$mslk')");
			
			mysqli_close($baglan);
			header('Location: kytkonum.php');
		}
		else
		{
			mysqli_close($baglan);
			header('Location: hata.php');
		}
	}
	if($gelen==9)
	{
		if($_SESSION["kullanici"]!="" && $_SESSION["kontrol"]="aleron")
		{		
			$sil=$_REQUEST["id"];
			mysqli_query($baglan, "delete from konumlar_tbl where id=$sil");
			
			mysqli_close($baglan);
			header('Location: kytkonum.php');
		}
		else
		{
			mysqli_close($baglan);
			header('Location: hata.php');
		}		
	}	
	
	if($gelen==10)
	{
		if($_SESSION["kullanici"]!="" && $_SESSION["kontrol"]="aleron")
		{
			$der=$_POST["ders"];
			$sin=$_POST["sinifadi"];
			$kon=$_POST["konum"];
			$ogr=$_POST["ogretmen"];
			$bas=$_POST["baslama"];
			$bit=$_POST["bitis"];
			
			$v2=date("Y-m-d", strtotime($bas));
			$gun=date("l", strtotime($v2));
			switch($gun){
				case "Monday":
					$gunsayi=1;
					break;
				case "Tuesday":
					$gunsayi=2;
					break;
				case "Wednesday":
					$gunsayi=3;
					break;
				case "Thursday":
					$gunsayi=4;
					break;
				case "Friday":
					$gunsayi=5;
					break;
				case "Saturday":
					$gunsayi=6;
					break;
				case "Sunday":
					$gunsayi=7;
					break;					
				default:
					$gunsayi=0;
			}							
			mysqli_query($baglan, "insert into program_tbl (ders, sinif,konum, ogretmen, gun, baslama, bitis) values('$der', $sin, '$kon', '$ogr', $gunsayi, '$bas', '$bit')");

			mysqli_close($baglan);
			header("Location: program.php?snc=1&prsinif=$sin");		
		}
			else
		{
			mysqli_close($baglan);
			header('Location: hata.php');
		}		
	}	
	if ($gelen==11)
	{
		if($_SESSION["kullanici"]!="" && $_SESSION["kontrol"]="aleron")
		{
			$der=$_POST["ders"];
			$sin=$_POST["sinifadi"];
			$kon=$_POST["konum"];
			$ogr=$_POST["ogretmen"];
			$bas=$_POST["baslama"];
			$bit=$_POST["bitis"];
			
			$prog=$_POST["progid"];
						
			$v2=date("Y-m-d", strtotime($bas));
			$gun=date("l", strtotime($v2));
			switch($gun){
				case "Monday":
					$gunsayi=1;
					break;
				case "Tuesday":
					$gunsayi=2;
					break;
				case "Wednesday":
					$gunsayi=3;
					break;
				case "Thursday":
					$gunsayi=4;
					break;
				case "Friday":
					$gunsayi=5;
					break;
				case "Saturday":
					$gunsayi=6;
					break;
				case "Sunday":
					$gunsayi=7;
					break;					
				default:
					$gunsayi=0;
			}							
			mysqli_query($baglan, "update program_tbl set ders='$der', sinif=$sin,konum='$kon', ogretmen='$ogr', gun=$gunsayi, baslama='$bas', bitis='$bit' where id=$prog");

			mysqli_close($baglan);
			header("Location: program.php?snc=1&prsinif=$sin");		
		}
		else
		{
			mysqli_close($baglan);
			header('Location: hata.php');
		}		
	}	
	
	if($gelen==12)
	{	
		if($_SESSION["kullanici"]!="" && $_SESSION["kontrol"]="aleron")
		{
			$prog=$_POST["progid"];
			$sin=$_POST["sinifadi"];
			
			mysqli_query($baglan, "delete from program_tbl where id=$prog");
			
			mysqli_close($baglan);
			header("Location: program.php?snc=1&prsinif=$sin");		
		}
		else
		{
			mysqli_close($baglan);
			header('Location: hata.php');
		}			
	}
			
	if($gelen==13)
	{
		if($_SESSION["kullanici"]!="" && $_SESSION["kontrol"]="aleron")
		{
			$mslk=$_POST["gorev"];
			
			mysqli_query($baglan, "insert into alanlar_tbl (alan) values('$mslk')");
			
			mysqli_close($baglan);
			header('Location: kytalan.php');
		}
		else
		{
			mysqli_close($baglan);
			header('Location: hata.php');
		}
	}
	if($gelen==14)
	{
		if($_SESSION["kullanici"]!="" && $_SESSION["kontrol"]="aleron")
		{		
			$sil=$_REQUEST["id"];
			mysqli_query($baglan, "delete from alanlar_tbl where id=$sil");
			
		mysqli_close($baglan);
			header('Location: kytalan.php');
		}
		else
		{
			mysqli_close($baglan);
			header('Location: hata.php');
		}		
	}
	
	if ($gelen==15)
	{
		if($_SESSION["kullanici"]!="" && $_SESSION["kontrol"]="aleron")
		{
			$mslk=$_POST["nobet"];
			
			mysqli_query($baglan, "insert into nobetler_tbl (yer) values('$mslk')");
			
			mysqli_close($baglan);
			header('Location: kytnobet.php');
		}
		else
		{
			mysqli_close($baglan);
			header('Location: hata.php');
		}
	}	
	if($gelen==16)
	{
		if($_SESSION["kullanici"]!="" && $_SESSION["kontrol"]="aleron")
		{		
			$sil=$_REQUEST["id"];
			$ara=mysqli_query($baglan, "select * from nobetler_tbl where id=$sil");
			if($bul=mysqli_fetch_assoc($ara)){
				mysqli_query($baglan, "delete from nobetpro_tbl where konum='".$bul["yer"]."'");	
			}
			mysqli_query($baglan, "delete from nobetler_tbl where id=$sil");
						
			mysqli_close($baglan);
			header('Location: kytnobet.php');
		}
		else
		{
			mysqli_close($baglan);
			header('Location: hata.php');
		}		
	}
	
	if($gelen==17)
	{
		if($_SESSION["kullanici"]!="" && $_SESSION["kontrol"]="aleron")
		{
			$yerler=array();
			$listele=mysqli_query($baglan, "select * from nobetler_tbl order by yer");
			while($oku1=mysqli_fetch_assoc($listele)){ 	
				$yerler[]=$oku1["yer"];
			}
			foreach($_POST as $anh=>$elm){
				$deger=$elm;
				if($anh!="tabs"){					
					$kac=strlen($anh);                    
					$kacinci=substr($anh, 11, $kac-11);                
					$gunu=substr($anh,0, 3);
					switch($gunu){
						case "pts":
							$gun=1;
							break;
						case "sal":
							$gun=2;
							break;
						case "car":
							$gun=3;
							break;
						case "per":
							$gun=4;
							break;
						case "cum":
							$gun=5;
							break;
						case "cts":
							$gun=6;
							break;
						case "paz":
							$gun=7;
							break;							
					}
                    echo($kacinci."-$deger<br>");
					$varmi=mysqli_query($baglan, "select * from nobetpro_tbl where gun=$gun and konum='".$yerler[$kacinci-1]."'");
					if($var=mysqli_fetch_assoc($varmi)){
						mysqli_query($baglan, "update nobetpro_tbl set ogretmen='$deger' where id=".$var["id"]);
					}else{
						mysqli_query($baglan, "insert into nobetpro_tbl (ogretmen, konum, gun) values('$deger', '".$yerler[$kacinci-1]."', $gun)");
					}
				}				
			}
			unset($yerler);
			mysqli_close($baglan);
			header('Location: nobetpro.php');
		}
		else
		{
			mysqli_close($baglan);			
			header('Location: hata.php');
		}					
	}
	
	if($gelen==18) //Haber kayıt
	{
		if($_SESSION["kullanici"]!="" && $_SESSION["kontrol"]="aleron")
		{		
		$g1=$_POST["aciklama"];
        $g3=$_POST["videomu"];
		
	//---------------------------------------------------------------------------------------------------------				
		$g2=$_FILES["resim"];

				$dizi[0]=explode(".",$g2["name"]);
				$uzanti[0]=end($dizi[0]);						

				$x1= rand(1,9999999999);
				$x2= rand(1,9999999999);
				$yeni="slayt".$x1.$x2;								

				move_uploaded_file($g2["tmp_name"],$g2["name"]);

				$dosyaadi=$yeni.".".strtolower($uzanti[0]);					
				copy($g2["name"],"../resimler/".$dosyaadi);		
				unlink($g2["name"]);
						
				unset($dizi);
				unset($uzanti);
	//---------------------------------------------------------------------------------------------------------						

		$say=mysqli_query($baglan, "select count('sira') as sayi from galresim_tbl");
		if($adet=mysqli_fetch_assoc($say)){
			$sayisi=$adet["sayi"];				
		}				
		$kayitsira=$sayisi+1;
		mysqli_query($baglan,"insert into galresim_tbl (resim, sira, aciklama, videomu) values('resimler/$dosyaadi', $kayitsira,'$g1', $g3)") or die("Kayıt hatalı...");
		mysqli_close($baglan);
		header("Location: resimyukle.php");
		}
		else
		{
			header('Location: hata.php');
		}			
	}
	if($gelen==19) //Haber güncelleme
	{
		if($_SESSION["kullanici"]!="" && $_SESSION["kontrol"]="aleron")
		{		
		$sln=$_REQUEST["sil"];

			$ara=mysqli_query($baglan,"select * from galresim_tbl where id=$sln") or die("Resim bulunamadı...");
			if($oku=mysqli_fetch_assoc($ara))
			{
				$sil_sira=$oku["sira"];
				if(is_file("../".$oku["resim"]))
				{
					unlink("../".$oku["resim"]);
				}					
				mysqli_query($baglan,"delete from galresim_tbl where id=$sln") or die("Silme başarısız");				
			}
			$ara2=mysqli_query($baglan,"select * from galresim_tbl where sira>$sil_sira order by sira") or die("Resim bulunamadı...");
			while($oku2=mysqli_fetch_assoc($ara2))
			{
				mysqli_query($baglan,"update galresim_tbl set sira=$sil_sira where id=".$oku2["id"]) or die("Güncelleme sorunu");
				$sil_sira++;
			}
			mysqli_close($baglan);
			header("Location: resimyukle.php");	
		}
		else
		{
			header('Location: hata.php');
		}				
	}
	
	if($gelen==20) //Haberler sıra değiştirme
	{
		if($_SESSION["kullanici"]!="" && $_SESSION["kontrol"]="aleron")
		{
			$menu=$_REQUEST["m"];
			if($menu>1)
			{
				$yeni=$menu-1;
				mysqli_query($baglan, "update galresim_tbl set sira=0 where sira=$menu") or die("Sira güncelleme sorunu");
				mysqli_query($baglan, "update galresim_tbl set sira=$menu where sira=$yeni") or die("Sira güncelleme sorunu");	
				mysqli_query($baglan, "update galresim_tbl set sira=$yeni where sira=0") or die("Sira güncelleme sorunu");	
				mysqli_close($baglan);
			}		
			mysqli_close($baglan);
			header("Location: resimyukle.php");	
		}
		else
		{
			header('Location: hata.php');
		}				
	}
	if($gelen==21) //Haberler sıra değiştirme
	{
		if($_SESSION["kullanici"]!="" && $_SESSION["kontrol"]="aleron")
		{
			$menu=$_REQUEST["m"];
			$say=mysqli_query($baglan, "select count('sira') as sayi from galresim_tbl");
			$oku=mysqli_fetch_assoc($say);
			$sira=$oku["sayi"];
			if($menu<$sira)
			{
				$yeni=$menu+1;
				mysqli_query($baglan, "update galresim_tbl set sira=0 where sira=$menu") or die("Sira güncelleme sorunu");
				mysqli_query($baglan, "update galresim_tbl set sira=$menu where sira=$yeni") or die("Sira güncelleme sorunu");	
				mysqli_query($baglan, "update galresim_tbl set sira=$yeni where sira=0") or die("Sira güncelleme sorunu");	
				mysqli_close($baglan);
			}
			mysqli_close($baglan);
			header("Location: resimyukle.php");	
		}
		else
		{
			header('Location: hata.php');
		}		
	}
	
	
	if($gelen==22) //Kayan yazı kayıt
	{
		if($_SESSION["kullanici"]!="" && $_SESSION["kontrol"]="aleron")
		{
			$mslk=$_POST["kayan"];
			
			mysqli_query($baglan, "insert into kayanyazi_tbl (yazi) values('$mslk')");
			
			mysqli_close($baglan);
			header('Location: kayanyazi.php');
		}
		else
		{
			mysqli_close($baglan);
			header('Location: hata.php');
		}
	}
	if($gelen==23) //Kayan yazı silme
	{
		if($_SESSION["kullanici"]!="" && $_SESSION["kontrol"]="aleron")
		{		
			$sil=$_REQUEST["id"];
			mysqli_query($baglan, "delete from kayanyazi_tbl where id=$sil");
			
		mysqli_close($baglan);
			header('Location: kayanyazi.php');
		}
		else
		{
			mysqli_close($baglan);
			header('Location: hata.php');
		}		
	}
	
	if($gelen==24) //Giriş saatleri kayıt-güncelleme
	{
		if($_SESSION["kullanici"]!="" && $_SESSION["kontrol"]="aleron")
		{		
            for($i=1;$i<=7;$i++){
                for($j=1;$j<=10;$j++){
                    if($_POST["g".$i."g$j"]!=""){
                        echo "$i gün giriş $j. ders:".$_POST["g".$i."g$j"]." - ";
                        echo "$i gün çıkış $j. ders:".$_POST["g".$i."c$j"]."<br>";
                        
                        $saatara=mysqli_query($baglan, "select * from girisler_tbl where ders=$j and gun=$i");
                        if($saatbul=mysqli_fetch_assoc($saatara)){
                            mysqli_query($baglan, "update girisler_tbl set giris='".$_POST["g".$i."g$j"]."', cikis='".$_POST["g".$i."c$j"]."' where  ders=$j and gun=$i");
                        }else{
                            mysqli_query($baglan, "insert into girisler_tbl (ders, gun, giris, cikis) values($j,$i,'".$_POST["g".$i."g$j"]."','".$_POST["g".$i."c$j"]."')");
                        }
                        
                    }
                }
            }
                        
        mysqli_close($baglan);
		header("Location: girisler.php");
		}
		else
		{
			header('Location: hata.php');
		}		
	}	
    
    
    if($gelen==71){
            for($i=2;$i<=7;$i++){
                for($j=1;$j<=10;$j++){        
                    $saatara=mysqli_query($baglan, "select * from girisler_tbl where ders=$j and gun=1");
                    if($saatbul=mysqli_fetch_assoc($saatara)){
                        mysqli_query($baglan, "insert into girisler_tbl (ders, gun, giris, cikis) values($j,$i,'".$saatbul["giris"]."','".$saatbul["cikis"]."')");
                    }
                }
            }
    }
    
    if($gelen==72){
        
        for($j=3;$j<=15;$j++){                
        
        $dersara=mysqli_query($baglan, "select * from program_tbl where sinif=1");              
        while($dersbul=mysqli_fetch_assoc($dersara)){
            mysqli_query($baglan, "insert into program_tbl (`ders`, `sinif`, `konum`, `ogretmen`, `gun`, `baslama`, `bitis`) values('".$dersbul["ders"]."', $j,'".$dersbul["konum"]."', '".$dersbul["ogretmen"]."', ".$dersbul["gun"].", '".$dersbul["baslama"]."', '".$dersbul["bitis"]."')");            
        }            
            
        }
    }
    if($gelen==73){
        
        
        $dersara=mysqli_query($baglan, "select * from program_tbl where sinif=1 and gun>3");              
        while($dersbul=mysqli_fetch_assoc($dersara)){
            mysqli_query($baglan, "insert into program_tbl (`ders`, `sinif`, `konum`, `ogretmen`, `gun`, `baslama`, `bitis`) values('".$dersbul["ders"]."', 21,'12/D SINIFI', '".$dersbul["ogretmen"]."', ".$dersbul["gun"].", '".$dersbul["baslama"]."', '".$dersbul["bitis"]."')");            
        }            
            
        
    }
    
    
    
    
	if($gelen==25)
	{
		if($_SESSION["kullanici"]!="" && $_SESSION["kontrol"]="aleron")
		{		
		$gelen=htmlspecialchars($_POST["icerik"]);
		$durum=htmlspecialchars($_POST["gor"]);
		mysqli_query($baglan,"update kurumsal_tbl set metin='$gelen', goruntu=$durum where id=1") or die("Güncelleme sorunu...");
		mysqli_close($baglan);
		header("Location: misyon.php");
		}
		else
		{
			header('Location: hata.php');
		}		
	}	
	if($gelen==26)
	{
		if($_SESSION["kullanici"]!="" && $_SESSION["kontrol"]="aleron")
		{		
		$gelen=htmlspecialchars($_POST["icerik"]);
		$durum=htmlspecialchars($_POST["gor"]);
		mysqli_query($baglan,"update kurumsal_tbl set metin='$gelen', goruntu=$durum where id=2") or die("Güncelleme sorunu...");
		mysqli_close($baglan);
		header("Location: vizyon.php");
		}
		else
		{
			header('Location: hata.php');
		}		
	}	
	if($gelen==27)
	{
		if($_SESSION["kullanici"]!="" && $_SESSION["kontrol"]="aleron")
		{		
		$galeri=htmlspecialchars($_POST["adi"]);
		mysqli_query($baglan,"insert into galeri_tbl (adi) values('$galeri')") or die("Kayıt başarısız...");
		$ara=mysqli_query($baglan,"select * from galeri_tbl order by id desc limit 1") or die("Kayıt bulma sorunlu");
		$oku=mysqli_fetch_assoc($ara);
		$id=$oku["id"];
		mysqli_close($baglan);
		header("Location: resgaleri.php?galeri=$id");
		}
		else
		{
			header('Location: hata.php');
		}				
	}	
	if($gelen==28)
	{
		if($_SESSION["kullanici"]!="" && $_SESSION["kontrol"]="aleron")
		{			
		$gal=htmlspecialchars($_POST["galeri"]);
	//---------------------------------------------------------------------------------------------------------				
		$g5=$_FILES["resim"];

		$x1=rand(1,999999);
		$x2=rand(1,999999);
		$veri="galeri".$x1.$x2;

    	$uzanti=array('image/jpeg','image/jpg','image/png','image/x-png','image/gif');

			if(in_array(strtolower($_FILES['resim']['type']),$uzanti))
			{ 
	    		move_uploaded_file($_FILES['resim']['tmp_name'],"{$_FILES['resim']['name']}");

				$nerde=strpos($g5["name"],".");
				$say=strlen($g5["name"]);
				$fark=$say-$nerde;
	
				$son=substr($g5["name"],$nerde,$fark);

				copy($_FILES['resim']['name'],"../galeri/$veri$son");
				unlink($_FILES['resim']['name']);	
			}
	//---------------------------------------------------------------------------------------------------------	
		mysqli_query($baglan,"insert into galresim_tbl (resim,g_id) values('galeri/$veri$son',$gal)") or die("Kayıt başarısız...");	
		mysqli_close($baglan);	
		header("Location: resgaleri.php?galeri=$gal");
		}
		else
		{
			header('Location: hata.php');
		}	
	}	
	if($gelen==29)
	{
		if($_SESSION["kullanici"]!="" && $_SESSION["kontrol"]="aleron")
		{	
		$sil=$_REQUEST["id"];
		$gal=$_REQUEST["galeri"];
		
			$ara=mysqli_query($baglan,"select * from galresim_tbl where id=$sil") or die("Resim bulunamadı...");
			if($oku=mysqli_fetch_assoc($ara))
			{
					unlink("../".$oku["resim"]);					
			}		
			
		mysqli_query($baglan,"delete from galresim_tbl where id=$sil") or die("Silme başarısız");

			$ara=mysqli_query($baglan,"select * from galresim_tbl where g_id=$gal") or die("Resim bulunamadı...");
			if(mysqli_fetch_assoc($ara))
			{
				mysqli_close($baglan);
				header("Location: resgaleri.php?galeri=$gal");											
			}
			else
			{
				mysqli_query($baglan,"delete from galeri_tbl where id=$gal") or die("Silme başarısız");
				mysqli_close($baglan);
				header("Location: resgaleri.php");				
			}			
		}
		else
		{
			header('Location: hata.php');
		}	
	}	
																	
?>	
</body>
</html>




