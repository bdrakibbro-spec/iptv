<?php
$host = 'mysql-2fa06d22-bdrakibbro-08e1.l.aivencloud.com';
$port = 14648;
$user = 'avnadmin';
$pass = 'AVNS_8S16f59r-lgKycT_uxL';
$dbname = 'defaultdb';

$conn = mysqli_init();

if (!$conn) {
    die("mysqli_init failed");
}

// এটি সার্টিফিকেট ভেরিফিকেশন স্কিপ করে সরাসরি SSL কানেকশন নিশ্চিত করবে
$conn->options(MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, false);

// SSL হ্যান্ডশেক সেটআপ
$conn->ssl_set(NULL, NULL, NULL, NULL, NULL);

// ডাটাবেজের সাথে কানেক্ট করা
if (!$conn->real_connect($host, $user, $pass, $dbname, $port, NULL, MYSQLI_CLIENT_SSL)) {
    die("Connect Error: " . mysqli_connect_error());
}
?>
