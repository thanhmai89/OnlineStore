<?php
    session_start();

    if (isset($_POST['btn-login']) && !empty($_POST['btn-login'])) {
        require_once("./config/db.class.php");
        $db = new Db();
        $u_name = $_POST['txtname'];
        $u_pass = $_POST['txtpass'];
        
        if (!$u_name || !$u_pass) {
            echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.";
            exit;
        }
        
        $u_pass = md5($u_pass);
        $query = mysql_query("SELECT UserName, Password FROM users WHERE UserName='$u_name'");
        if (mysql_num_rows($query) == 0) {
            echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại.";
            exit;
        }

        $row = mysql_fetch_array($query);
        if ($u_pass != $row['Password']) {
            echo "Mật khẩu không đúng. Vui lòng nhập lại.";
            exit;
        }

        $_SESSION['username'] = $u_name;
        echo "Xin chào " . $u_name . ". Bạn đã đăng nhập thành công.";
        die();
    }
?>