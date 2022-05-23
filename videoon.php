<?php
	include("admin/vt.php");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<script>
		var video=new array(),sayac=1;		
	</script>
</head>
<body>

		<video muted id="video<?=$say;?>" class="video<?=$say;?>">
			<source src="" type="video/mp4">
		</video>	
		<input type="hidden" name="vidsur" id="vidsur<?=$say;?>">
		<script>
		{
			var video[]=document.getElementById("video<?=$say;?>");
			window.sayac=window.sayac+1;
		}
		</script>	
	<script>
		alert(window.sayac);
	</script>
	
</body>
</html>