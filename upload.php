<html>
<head>
  <title>RetroJector Data Processor</title>
 </head>
 <body>
<?php
$target_dir = "uploads/";
$target_file = $target_dir . substr(md5(rand()), 0, 7) . ".csv";
$original_file = $_FILES["fileToUpload"]["tmp_name"];
$uploadOk = 1;
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}
?>
<?php
$row = 1;
ini_set('auto_detect_line_endings',TRUE);
if (($handle = fopen($target_file, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        //echo "<p> $num fields in line $row: <br /></p>\n";
        for ($c=0; $c < $num; $c++) {
            //echo $data[$c] . ", ";
	    if($row==1)
	    {
	    	$columns[]=$data[$c];
	    }
        }
	$row++;
    }
    fclose($handle);
}
echo "<table width=\"100%\"><tr><td valign=\"top\">";
echo "<table>";
echo "<form action=\"process.php\" method=\"post\" id=\"UploadData\" name=\"UploadData\">";
echo "<input type=\"hidden\" name=\"UploadedFile\" value=\"".basename($target_file)."\">";
echo "<tr><th colspan=\"2\">Build Document Structure</th></tr>\r\n";
echo "<tr><td>Data (column heading)</td><td>Document Level</td></tr>\r\n";
$c=count($columns);
foreach($columns AS $col)
{
	echo "<tr>";
	echo "<td>$col:</td><td><select name=\"$col\" onchange=\"retroject();\">";
	echo "<option value=\"ignore\" selected>Remove</option>";
	for($j=0;$j<$c;$j++)
	{
		echo "<option>$j</option>";
	}	
	echo "</select></td>";
	echo "</tr>\r\n";
}
echo "<tr><td colspan=\"2\" align=\"center\"><input type=\"submit\" value=\"Process Data Conversion\" name=\"submit\"></td></tr>";
echo "</form>";
echo "</table></td>\r\n";
echo "<td valign=\"top\">";
for($j=0;$j<$c;$j++)
{
        echo "<div id=\"dom$j\">";
	if($j===0)
	{
		foreach($columns AS $col)
		{
			echo "$col<br />";
		}
	}
	echo "</div>\r\n";
}
?>
</td></tr></table>
  <script type="text/javascript">
    function retroject()
    {
	var arr = new Array("");
        var elem = document.getElementById('UploadData').elements;
	for(var i = 0; i < elem.length; i++)
        {
		arr[i] = " ";
	}
        for(var i = 0; i < elem.length; i++)
        {
	    for(var c = 0; c < elem[i].value; c++)
	    {
  		arr[elem[i].value] += "-->";
	    }
            arr[elem[i].value] += elem[i].name + "<br />";
        } 
	for(var i = 0; i < arr.length; i++)
	{
            document.getElementById('dom' + i).innerHTML = arr[i];
	}
    }
    retroject();
  </script>
 </body>
</html>
