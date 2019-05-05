<?php
	session_start();
?>
<?php

	if (isset($_SESSION['dn'])){
		echo "Xin chào ".$_SESSION['dn'].'<br />';
		echo "bạn rảnh quá, đăng nhập miết" .'<br />';
	}		
?>
<button type="button" onclick="quay_lai_trang_truoc()">Quay lại</button>

  <script>
      function quay_lai_trang_truoc(){
          history.back();
      }
  </script>
