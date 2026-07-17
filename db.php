<?php
$host = "mysql-2fa06d22-bdrakibbro-08e1.l.aivencloud.com"; 
$db_user = "avnadmin"; 
$db_pass = "AVNS_8S16f59r-lgKycT_uxL"; 
$db_name = "defaultdb"; 
$port = "14644"; 

// ডাটাবেজ কানেকশন তৈরি
$conn = new mysqli($host, $db_user, $db_pass, $db_name, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
