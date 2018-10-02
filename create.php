<?php

$name = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];

$error = "";

$blacklist = [".php", ".phtml", ".php3", ".php4", ".html", ".htm"];

foreach ($blacklist as $item){
	if(preg_match("/$item\$/i", $_FILES['image']['name'])) {
		$error = "Неверный тип";
		echo $error; 
		exit;
	} 
}

$type = $_FILES['image']['type'];
$size = $_FILES['image']['size'];

if (($type != "image/jpg") && ($type != "image/jpeg")){
	$error = "Неверный тип"; 
	echo $error; 
	exit;
};

if ($size > 102400) {
	$error = "Неверный тип"; 
	echo $error; 
	exit;
};

$info = pathinfo($name);
$filename = basename($name, '.' . $info['extension']);

$fileSuccess = $filename . (string) rand(10000000, 99999999) . '.' . $info['extension'];

$filePath = "uploads/" . $fileSuccess;

move_uploaded_file($tmp_name, "uploads/{$fileSuccess}");



echo "<pre>";
print_r ($filePath);
echo "</pre>";

echo "<pre>";
print_r($_FILES);
echo "</pre>";