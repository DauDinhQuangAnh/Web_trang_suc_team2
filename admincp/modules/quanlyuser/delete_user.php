<?php
$mysqli = new mysqli("localhost", "root", "", "web_trangsuc_sql");

// Kiểm tra kết nối
if ($mysqli->connect_errno) {
    echo "Kết nối SQL lỗi: " . $mysqli->connect_error;
    exit();
}

// Kiểm tra xem ID người dùng đã được truyền qua URL hay không
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    // Xóa người dùng từ bảng
    $sql = "DELETE FROM tbl_dangky WHERE id_dangky = $id";
    if ($mysqli->query($sql)) {
        echo "Người dùng đã được xóa thành công.";
    } else {
        echo "Lỗi xóa người dùng: " . $mysqli->error;
    }
}

// Đóng kết nối
$mysqli->close();
?>
<a href="../quanlyuser/quanlyuser.php" class="back-button">Quay lại</a>