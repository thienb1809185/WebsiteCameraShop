<?php
session_start();
require_once('../../utils/utility.php');
require_once('../../database/dbhelper.php');

$user = getUserToken();
$MSNV = '';
if($user == null) {
	die();
} else{
    $MSNV = $user['MSNV'];
}

if(!empty($_POST)) {
	$action = getPost('action');

	switch ($action) {
		case 'update_status':
			updateStatus();
			break;
	}
}

function updateStatus() {
	$user = getUserToken();
  	$MSNV = $user['MSNV'];
	$id = getPost('id');
	$status = getPost('status');
    $updated_at = date("Y-m-d H:i:s");

	$sql = "update dathang set TrangThaiDH = $status, MSNV ='$MSNV', NgayGH = '$updated_at'  where SoDonDH = $id";
	execute($sql);
}