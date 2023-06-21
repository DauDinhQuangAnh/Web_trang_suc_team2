<h3>Lịch Sử Đơn Hàng</h3>
<?php
$id_khachhang = $_SESSION['id_khachhang'];
    $sql_lietke_dh = "SELECT * FROM tbl_cart, tbl_dangky WHERE tbl_cart.id_khachhang = tbl_dangky.id_dangky AND tbl_cart.id_khachhang = '$id_khachhang' ORDER BY tbl_cart.id_cart DESC";
    $query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?>


<table style="width:100% " border ="1" style="border-collapse: collapse;">
    <tr>
        <th>ID</th>
        <th>Mã Đơn Hàng</th>
        <th>Tên Khách Hàng</th>
        <th>Địa Chỉ</th>
        <th>Email</th>
        <th>Số Điện Thoại</th>
        <th>Tình Trạng</th>
        
    </tr>
    <?php
        $i = 0;
        while ($row = mysqli_fetch_array($query_lietke_dh)) {
            $i++;
    ?>

    <tr>
        <td><?php echo $i ?></td> 
        <td><?php echo $row['code_cart'] ?></td>
        <td><?php echo $row['tenkhachhang'] ?></td>
        <td><?php echo $row['diachi'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['dienthoai'] ?></td>
        
        <td>
            <a href="index.php?quanly=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem Đơn Hàng</a>
        </td>
    </tr>
    <?php
        }
    ?>

</table>