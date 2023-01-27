<?php
include "koneksi.php";
$db = new database();
$sumber="nuptial_wedding.zip";
$tujuan="/duta/";
$db->ekstrak($sumber,$tujuan);
?>