<?php
include 'db.php';

// ইউজার টেবিল তৈরি করার SQL কুয়েরি
$sql = "CREATE TABLE IF NOT EXISTS `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `password` VARCHAR(50) NOT NULL,
  `status` ENUM('active', 'expired', 'trial') DEFAULT 'active',
  `start_date` DATE NOT NULL,
  `end_date` DATE NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "<h2 style='color: green; text-align: center; margin-top: 50px;'>অভিনন্দন! আপনার IPTV ইউজার ডেটাবেজ টেবিলটি সফলভাবে তৈরি হয়েছে।</h2>";
} else {
    echo "<h2 style='color: red; text-align: center; margin-top: 50px;'>টেবিল তৈরি করতে সমস্যা হয়েছে: " . $conn->error . "</h2>";
}
?>
