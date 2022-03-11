<?php
session_start();

require_once('../../utils/utility.php');
require_once('../../database/dbhelper.php');

$user = getUserToken();
if($user != null) {
	$token = getCookie('token');
	$MSNV = $user['MSNV'];
	$sql = "delete from tokens where MSNV = '$MSNV' and token = '$token'";
	execute($sql);
	setcookie('token', '', time(), '/');
}
header('Location: login.php');

session_destroy();