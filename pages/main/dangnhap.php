<?php
    if(isset($_POST['dangnhap'])){
        $email = $_POST['email'];
        $matkhau = md5($_POST['password']);
        $sql = "SELECT * FROM tbl_dangky WHERE email = '".$email."' AND matkhau ='".$matkhau."' LIMIT 1";
        $row = mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($row);
        $row_data = mysqli_fetch_array($row);
        if($count>0){
            $_SESSION['dangky'] =$row_data['tenkhachhang'];
            $_SESSION['id_khachhang'] =$row_data['id_dangky'];
            header('Location:index.php?quanly=giohang');
        }else{
            echo '<p style="color:red" > Mật Khẩu Không Đúng, Vui Lòng Nhập Lại!!!! </p>';
        }            
    }
?>
<form action="" autocomplete="off" method="POST">
            <table border="1" class="table-login" style="text-align: center; border-collapse:collapse;">
                <tr>
                    <td colspan="2"><h3>Đăng Nhập Khách hàng</h3></td>
                </tr>

                <tr>
                    <td>Tài Khoản</td>
                    <td><input style="width: 85%" type="text" name="email" placeholder="Email..."></td>
                </tr>

                <tr>
                    <td>Mật Khẩu</td>
                    <td><input style="width: 85%" type="password" name="password" placeholder="Mật Khẩu..."></td>
                </tr>

                <tr>
                    <td colspan="2"><input type="submit" name="dangnhap" value="Đăng Nhập"></td>
                </tr>
            </table>
        </form>