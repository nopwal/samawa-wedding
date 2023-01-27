<?php
include "koneksi.php";
$db = new database();
$src="2";
$dst="binar";
$db->recurseCopy($src,$dst, $childFolder='');
?>