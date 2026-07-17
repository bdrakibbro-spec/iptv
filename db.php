<?php
$host = 'mysql-2fa06d22-bdrakibbro-08e1.l.aivencloud.com';
$port = 14648;
$user = 'avnadmin';
$pass = 'AVNS_8S16f59r-lgKycT_uxL';
$dbname = 'defaultdb';

// SSL মোডে কানেক্ট করার জন্য mysqli অবজেক্ট তৈরি করা
$conn = mysqli_init();

if (!$conn) {
    die("mysqli_init failed");
}

// SSL রিকোয়ারমেন্ট সেট করা (Aiven-এর জন্য এটি বাধ্যতামূলক)
$conn->ssl_set(NULL, NULL, NULL, NULL, NULL);

// ডাটাবেজের সাথে কানেক্ট করা
if (!$conn->real_connect($host, $user, $pass, $dbname, $port, NULL, MYSQLI_CLIENT_SSL)) {
    die("Connect Error: " . mysqli_connect_error());
}
?>
