<?php
$mysqli = new mysqli("localhost", "root", "", "web_trangsuc_sql");

// Kiểm tra kết nối
if ($mysqli->connect_errno) {
    echo "Kết nối SQL lỗi: " . $mysqli->connect_error;
    exit();
}

// Kiểm tra nếu có tham số "id" được truyền qua URL
if (isset($_GET["id"])) {
    $id_dangky = $_GET["id"];

    // Truy vấn để lấy thông tin người dùng dựa trên ID
    $sql = "SELECT id_dangky, tenkhachhang, email, diachi FROM tbl_dangky WHERE id_dangky = $id_dangky";
    $result = $mysqli->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            // Hiển thị thông tin người dùng trong một biểu mẫu sửa đổi
            $row = $result->fetch_assoc();
            $tenkhachhang = $row["tenkhachhang"];
            $email = $row["email"];
            $diachi = $row["diachi"];
            ?>

            <h2>Sửa thông tin người dùng</h2>
            <form method="POST" action="">
                <input type="text" name="tenkhachhang" value="<?php echo $tenkhachhang; ?>" required><br>
                <input type="email" name="email" value="<?php echo $email; ?>" required><br>
                <input type="text" name="diachi" value="<?php echo $diachi; ?>" required><br>
                <input type="submit" name="submit" value="Lưu">
            </form>

            <?php
        } else {
            echo "<h2>Người dùng không tồn tại</h2>";
        }

        // Giải phóng kết quả
        $result->free_result();
    } else {
        echo "Lỗi truy vấn: " . $mysqli->error;
    }
} else {
    echo "<h2>Tham số ID không được cung cấp</h2>";
}

// Xử lý khi người dùng nhấn nút "Lưu"
if (isset($_POST["submit"])) {
    $tenkhachhang = $_POST["tenkhachhang"];
    $email = $_POST["email"];
    $diachi = $_POST["diachi"];

    // Cập nhật thông tin người dùng trong cơ sở dữ liệu
    $sql_update = "UPDATE tbl_dangky SET tenkhachhang = '$tenkhachhang', email = '$email', diachi = '$diachi' WHERE id_dangky = $id_dangky";
    $result_update = $mysqli->query($sql_update);

    if ($result_update) {
        echo "<h2>Cập nhật thông tin người dùng thành công</h2>";
    } else {
        echo "Lỗi cập nhật thông tin người dùng: " . $mysqli->error;
    }
}

// Đóng kết nối
$mysqli->close();
?>
<a href="../quanlyuser/quanlyuser.php" class="back-button">Quay lại</a>
