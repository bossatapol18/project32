<?php
// session_destroy();
unset($_SESSION['user_login']);
unset($_SESSION['role_login']);
$alert = '<script type="text/javascript">';
$alert .= 'alert("ออกจากระบบ!!");';
$alert .= 'window.location.href = "";';
$alert .= '</script>';
echo $alert;
exit();
?>