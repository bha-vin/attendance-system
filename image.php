

<!DOCTYPE html>
<html>
<head>
	<title>images uplode</title>
</head>
<body >
<div style="position:absolute;top:10%;position: fixed; background-color: #ff0000;width:380px;margin-left: 20%;">
		<a href="public.php"><div style="font-size: 25px;color: #fff;padding-left: 5px;"><b><~</b></div></a>
	<form method="post" action="public.php" enctype="multipart/form-data">
		<div style=" margin-top: 10px;margin-bottom: 10px;width:100%;height:25px;">
		<input type="hidden" name="size" value="1000000">
		    <label for="img" style="background-color: #f3f3f3;padding: 3px; float: left;margin-left:5%;">Select Image</label>
			<input type="file" name="image" id="img" style="display: none;visibility: none;">
			<label for="vid" style="background-color: #f3f3f3;padding: 3px;float:right;margin-right:5%;">Select Video</label>
			<input type="file" name="video" id="vid" style="display: none;visibility: none;">
		</div>
		<div style="margin-left: 10%; margin-bottom: 10px; margin-bottom: 10px;">
			<textarea name="text" cols="40" rows="4" placeholder="description..."></textarea>
		</div>
		<div style="margin-left: 40%; margin-bottom: 10px;">
		<input type="submit" name="upload" value="Upload">
		</div>
	</form>
	</div>

</body>
</html>