<?php
// Đường dẫn đến file CSV
$file_path = "KTPM2.csv";

// Kiểm tra file có tồn tại không
if (!file_exists($file_path)) {
    die("File CSV không tồn tại!");
}

// Mở file CSV
$file = fopen($file_path, "r");

// Đọc dòng đầu tiên để lấy tiêu đề (header)
$headers = fgetcsv($file);

if (!$headers) {
    die("File CSV trống hoặc không hợp lệ!");
}

// Tạo mảng lưu trữ dữ liệu người dùng
$users = [];

// Đọc từng dòng trong file CSV
while (($row = fgetcsv($file)) !== false) {
    // Kết hợp tiêu đề (headers) với dữ liệu (row)
    $users[] = array_combine($headers, $row);
}

// Đóng file CSV
fclose($file);

// Hiển thị dữ liệu
echo "<h1>Danh sách người dùng từ file CSV</h1>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
        <th>Username</th>
        <th>Password</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>City</th>
        <th>Email</th>
        <th>Course 1</th>
      </tr>";

// Duyệt qua từng người dùng và hiển thị dữ liệu
foreach ($users as $user) {
    echo "<tr>";
    echo "<td>" . (isset($user['username']) ? $user['username'] : "N/A") . "</td>";
    echo "<td>" . (isset($user['password']) ? $user['password'] : "N/A") . "</td>";
    echo "<td>" . (isset($user['firstname']) ? $user['firstname'] : "N/A") . "</td>";
    echo "<td>" . (isset($user['lastname']) ? $user['lastname'] : "N/A") . "</td>";
    echo "<td>" . (isset($user['city']) ? $user['city'] : "N/A") . "</td>";
    echo "<td>" . (isset($user['email']) ? $user['email'] : "N/A") . "</td>";
    echo "<td>" . (isset($user['course1']) ? $user['course1'] : "N/A") . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
