<?php
	session_start();
?>



<html>
<head> <title> Đăng nhập </title>
</head>
<body>
	<div id="main-container">
		<div id="table">
			<table align="center" name="table-dn"/>
			<div id="form" >
				<form name="form-dn" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
				<tr> <td align="center" colspan="2"> Đăng nhập </td> </tr>
				<tr> <td> Tài khoản  </td>	
					<td> <INPUT type="text" name="tendn"> </td>
				</tr>
				<tr> <td> Mật khẩu </td>
					<td> <INPUT type="password" name="matkhau"> </td>
				</tr>
				<tr> <td align="center" colspan="2"> <INPUT type="checkbox" name="nhomatkhau"> Nhớ mật khẩu </td>
				</tr>
				<tr> <td colspan="2" align="center" > <INPUT type="submit" name="dangnhap" value="Đăng nhập" >
				</td> </tr>
				</form>
			</div>
			</table>
		</div>
	</div>
</body>
		<?php
			if (isset($_POST['dangnhap'])){
				$username=$_POST['tendn'];
				$pass=$_POST['matkhau'];
				$conn=mysqli_connect("localhost","root","","khachhang");
				mysqli_set_charset($conn,'UTF8');
				$kiemtra="SELECT * FROM thongtinkhachhang WHERE taikhoan='$username' and matkhau='$pass'";
				$kq=mysqli_query($conn,$kiemtra);
				if ($dong=mysqli_fetch_array($kq)){
					echo"Đăng nhập thành công";
					$_SESSION['dn']=$username;
					header('location:http://localhost:8080/sesion.php');
				} else {
					echo "tài khoản hoặc mật khẩu sai";
				}
				mysqli_close($conn);
			} 
		?>
</html>
