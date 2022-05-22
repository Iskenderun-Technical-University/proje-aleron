<?php
		$baglan=mysqli_connect("SUNUCU_ADI","KULLANICI_ADI","SIFRE");
		mysqli_select_db($baglan,"VERITABANI_ADI");
		mysqli_query($baglan,"set names utf8");//TURKCE KARAKTER KAYIT
?>
