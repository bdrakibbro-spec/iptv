<?php
include 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $account_type = $_POST['account_type']; // 'official' অথবা 'trial'
    
    $start_date = date('Y-m-d');
    
    // অ্যাকাউন্ট টাইপ অনুযায়ী মেয়াদ নির্ধারণ
    if ($account_type == 'trial') {
        $end_date = date('Y-m-d', strtotime('+1 day')); // ট্রায়ালের জন্য ১ দিন মেয়াদ
        $status = 'trial';
    } else {
        $end_date = date('Y-m-d', strtotime('+30 days')); // অফিসিয়াল ইউজারের জন্য ৩০ দিন
        $status = 'active';
    }

    // ডেটাবেজে ইউজার সেভ করার কুয়েরি
    $sql = "INSERT INTO users (username, password, status, start_date, end_date) 
            VALUES ('$username', '$password', '$status', '$start_date', '$end_date')";

    if ($conn->query($sql) === TRUE) {
        $message = "<div style='color: green; font-weight: bold;'>সফলভাবে নতুন " . ucfirst($status) . " অ্যাকাউন্ট তৈরি হয়েছে! মেয়াদ শেষ হবে: $end_date</div>";
    } else {
        $message = "<div style='color: red; font-weight: bold;'>ভুল হয়েছে: " . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPTV User Creator</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px; background-color: #f4f4f4; text-align: center;">

    <div style="max-width: 400px; margin: auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0px 0px 15px rgba(0,0,0,0.1); text-align: left;">
        <h2 style="text-align: center; color: #333;">IPTV ইউজার ও ট্রায়াল পোর্টাল</h2>
        
        <?php echo $message; ?>
        <br>

        <form method="POST" action="">
            <label style="font-weight: bold;">ইউজারনেম:</label><br>
            <input type="text" name="username" required style="width: 100%; padding: 10px; margin: 8px 0 20px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;"><br>

            <label style="font-weight: bold;">পাসওয়ার্ড:</label><br>
            <input type="password" name="password" required style="width: 100%; padding: 10px; margin: 8px 0 20px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;"><br>

            <label style="font-weight: bold;">অ্যাকাউন্টের ধরন:</label><br>
            <select name="account_type" style="width: 100%; padding: 10px; margin: 8px 0 25px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                <option value="trial">ফ্রি ট্রায়াল (২৪ ঘণ্টা / ১ দিন)</option>
                <option value="official">অফিসিয়াল গ্রাহক (৩০ দিন)</option>
            </select><br>

            <button type="submit" style="background-color: #007BFF; color: white; padding: 12px 15px; border: none; border-radius: 4px; cursor: pointer; width: 100%; font-size: 16px; font-weight: bold;">অ্যাকাউন্ট তৈরি করুন</button>
        </form>
    </div>

</body>
</html>
