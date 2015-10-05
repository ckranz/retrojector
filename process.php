<html>
<head>
  <title>RetroJector Data Processor</title>
 </head>
 <body>
<?php
foreach($_POST['columns'] AS $key => $value)
{
	if($value != "ignore")
	{
		echo $key . " : " . $value ."<br />";
		if(isset($structure[$value]))
		{
			$structure[$value] = $structure[$value].",".$key;
		}else{
			$structure[$value] = $key;
		}
	}
}
foreach($_POST AS $value)
{
	echo "<!-- $value //-->\r\n";
}
$filename = "uploads/".basename($_POST['UploadedFile']);
$row = 1;
ini_set('auto_detect_line_endings',TRUE);
echo "<!-- $filename //-->";
if (($handle = fopen($filename, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        for ($c=0; $c < $num; $c++) {
            if($row==1)
            {
                $columns[]=$data[$c];
            }else{
		$filedata[$columns[$c]][]=$data[$c];
	    }
        }
        $row++;
    }
    fclose($handle);
}
echo "<pre>";
for($i=count($structure)-1;$i>=0;$i--)
{
    $arrName = "Arr$i";
    $records = split(",",$structure[$i]);
    echo $records[0]."<br />";
    foreach($filedata AS $key => $value)
    {
	$keyval = $records[0];
	if(in_array($key, $records))
	{
	    foreach($value AS $num => $data)
	    {
		if($key != $keyval)
		    ${$arrName}[$filedata[$keyval][$num]][$key] = $data;
	    }
	}
    }
    unset($keyval);
    echo "Array Name: $arrName<br />";
    print_r(${$arrName});
}
print_r($tempArray);
print_r($structure);
//print_r($filedata);
echo "</pre>";
?>
 </body>
</html>
