<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Retrojector</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <p>Hello world! Basic CSV Uploader</p>
	<form action="upload.php" method="post" enctype="multipart/form-data">
    		Please select CSV file to upload:
    		<input type="file" name="fileToUpload" id="fileToUpload">
    		<input type="submit" value="Upload CSV" name="submit">
	</form>
    </body>
</html>
