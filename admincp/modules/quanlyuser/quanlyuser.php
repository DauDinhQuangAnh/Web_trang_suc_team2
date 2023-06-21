<?php
$mysqli = new mysqli("localhost", "root", "", "web_trangsuc_sql");

// Kiểm tra kết nối
if ($mysqli->connect_errno) {
    echo "Kết nối SQL lỗi: " . $mysqli->connect_error;
    exit();
}
?>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th, table td {
        padding: 12px 15px;
        text-align: left;
    }

    table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    table td {
        border-bottom: 1px solid #ddd;
    }
</style>

<?php
// Truy vấn để lấy thông tin người dùng từ bảng tbl_dangky
$sql = "SELECT id_dangky, tenkhachhang, email, diachi FROM tbl_dangky";
$result = $mysqli->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        // Hiển thị thông tin người dùng
        echo "<h2>Danh sách người dùng</h2>";
        echo "<table>";
        echo "<tr><th>ID Đăng ký</th><th>Tên Khách hàng</th><th>Email</th><th>Địa chỉ</th><th>Xóa user</th><th>Sửa user</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id_dangky"] . "</td>";
            echo "<td>" . $row["tenkhachhang"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["diachi"] . "</td>";
            echo "<td><a href='delete_user.php?id=" . $row["id_dangky"] . "'>Xóa</a></td>"; // Liên kết xóa user
            echo "<td><a href='edit_user.php?id=" . $row["id_dangky"] . "'>Sửa</a></td>"; // Liên kết sửa user
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<h2>Danh sách người dùng</h2>";
        echo "Không có người dùng nào.";
    }

    // Giải phóng kết quả và đóng kết nối
    $result->free_result();
    $mysqli->close();
} else {
    echo "Lỗi truy vấn: " . $mysqli->error;
}
?>
<a href="../../index.php" class="back-button">Quay lại</a>
