<?php
	$db = new mysqli('localhost', 'dbwjd7265', '!72dbwjd65!', 'dbwjd22');

	if ($db->connect_error) {
		die('데이터베이스 연결에 문제가 있습니다.\n관리자에게 문의 바랍니다.');
	}

	$db->set_charset('utf8');
?>