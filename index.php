<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
</head>
<body>
    <h1>Thông tin sinh viên</h1>
    <table border="1">
        <tr>
            <th>MSSV</th>
            <th>Họ và tên</th>
            <th>Kì học</th>
            <th>Môn đăng kí</th>
        </tr>
        <?php
        // Thực hiện kết nối đến cơ sở dữ liệu
        $servername = "localhost"; // Tên máy chủ MySQL
        $username = "root"; // Tên người dùng MySQL
        $password = ""; // Mật khẩu MySQL
        $database = "pka_s"; // Tên cơ sở dữ liệu

        // Tạo kết nối
        $conn = new mysqli($servername, $username, $password, $database);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Truy vấn dữ liệu từ bảng
        $sql = "SELECT MSSV, HO_TEN, KI_HOC, DANG-KI FROM pka_s";
        $result = $conn->query($sql);

        // Hiển thị dữ liệu
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["MSSV"]."</td>";
                echo "<td>".$row["HO_TEN"]."</td>";
                echo "<td>".$row["KI_HOC"]."</td>";
                echo "<td>".$row["DANG-KI"]."</td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>