<?php
    session_start();
    include('config/config.php');
    if(isset($_POST['dangnhap'])){
        $taikhoan = $_POST['username'];
        $matkhau = md5($_POST['password']);
        $sql = "SELECT * FROM tbl_admin WHERE username = '".$taikhoan."' AND password = '".$matkhau."' LIMIT 1";
        $row = mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($row);
        if($count>0){
            $_SESSION['dangnhap'] =$taikhoan;
            header('Location:index.php');
        }else{
            echo '<script> alert("Tài Khoản Hoặc Mật Khẩu Không Đúng, Vui Lòng Đăng Nhập Lại") </script>';
            header("Location:login.php");
        }            
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admincp</title>
    <style type="text/css">
        body { 
            background: #f2f2f2;
        }
        .wrapper-login{
            width: 25%;
            margin: 0 auto ;
        }
        table.table-login{
            width: 100%;
        }

        table.table-login tr td{
            padding: 5px;
        }


    </style>
</head>
<body>
    <div class="wrapper-login">
        <form action="" autocomplete="off" method="POST">
            <table border="1" class="table-login" style="text-align: center; border-collapse:collapse;">
                <tr>
                    <td colspan="2"><h3>Đăng Nhập ADMIN</h3></td>
                </tr>

                <tr>
                    <td>Tài Khoản</td>
                    <td><input style="width: 85%" type="text" name="username"></td>
                </tr>

                <tr>
                    <td>Mật Khẩu</td>
                    <td><input style="width: 85%" type="password" name="password"></td>
                </tr>

                <tr>
                    <td colspan="2"><input type="submit" name="dangnhap" value="Đăng Nhập"></td>
                </tr>
            </table>
        </form>

    </div>
</body>
</html>