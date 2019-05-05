<?php
	session_start();
?>




<html>
<head>
	<title> Đăng kí </title>
	<link rel="stylesheet" href ="style.css" >
	<meta charset="utf8">
<head>
<body>
	<div id="main-container">
		<div id="table">
			<table align="center" name="table-dk"/>
			<div id="form" >
				<form name="form-dn" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
				<tr> <td align="center" colspan="2"> Đăng kí </td> </tr>
				<tr> <td> Tài khoản  </td>	
					<td> <INPUT type="text" name="tendn"> </td>
				</tr>
				<tr> <td> Mật khẩu </td>
					<td> <INPUT type="password" name="matkhau"> </td>
				</tr>
				<tr> <td> Nhập lại mật khẩu </td>
					<td> <INPUT type="password" name="rmatkhau" ></td>
				</tr>
				<tr> <td colspan="2" align="center" > <INPUT type="submit" name="dangki" value="Đăng kí" >
					<INPUT type="reset" name="nhaplai" value="Làm lại" >
					</td>	
				</tr>
				</form>
			</div>
			</table>
		</div>
	</div>
		<?php
			if (isset($_POST['dangki'])){	
					$username=$_POST['tendn'];
					$pass=$_POST['matkhau'];
					$rpass=$_POST['rmatkhau'];
					$conn=mysqli_connect("localhost","root","","khachhang");
					mysqli_set_charset($conn,'UTF8');
					$kiemtra="SELECT * FROM thongtinkhachhang WHERE taikhoan='$username'";
					$ketquakt=mysqli_query($conn,$kiemtra);
					$chen="INSERT INTO `thongtinkhachhang` (`taikhoan`, `matkhau`) VALUES ('$username', '$pass')";
					if(($username==null)||($pass==null)){
						echo "vui lòng nhập đủ thông tin"; exit();
					}
					if ($dong=mysqli_fetch_array($ketquakt)){
						echo "tài khoản đã tồn tại";
					} else if ($pass != $rpass){
							echo"Nhập lại mật khẩu không đúng";
					}
					 else{
							$check=mysqli_query($conn,$chen);
							echo"Đăng kí thành công";
					}
			mysqli_close($conn);
			}	
			
		?>
</body>
</html>

