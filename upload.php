<?php
$target_dir = "uploads/";
$target_file = $target_dir . substr(md5(rand()), 0, 7) . ".csv";
$original_file = $_FILES["fileToUpload"]["tmp_name"];
$uploadOk = 1;
print $target_file."<br />";
print $original_file."<br />";
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}
?>
