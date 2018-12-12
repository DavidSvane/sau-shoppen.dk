<?php

	function db_register_click($user, $class) {
		$servername = "mysql13.unoeuro.com";
		$username = "davidsvane_com";
		$password = "fp3a652y";
		$dbname = "davidsvane_com_db";

		try {
			@$conn = new mysqli($servername, $username, $password, $dbname, 3306);
		} catch (Exception $e) {
			error_log('Failed to connect to server');
			return false;
		}

		if ($conn->connect_error) { return false; }

		$stmt = $conn->prepare("INSERT INTO ss_clicks (user, class) VALUES (?, ?)");
		$stmt->bind_param("ss", $u_val, $c_val);

		$u_val = $user;
		$c_val = $class;
		$stmt->execute();

		$stmt->close();
		$conn->close();
	}

	$code = trim(preg_replace('/\s\s+/', ' ', $_POST['c']));
	$url = trim(preg_replace('/\s\s+/', ' ', utf8_encode(file_get_contents('https://skema.ku.dk/SUND1819/reporting/textspreadsheet?objectclass=programme+of+study&idtype=id&identifier=' . $_POST['a'] . '&t=SWSCUST2+programme+of+study+textspreadsheet&days=1-5&weeks=1-27&periods=1-68&template=SWSCUST2+programme+of+study+textspreadsheet'))));

	$count = 0;
	while ($count <= 1) {
		$count = substr_count($url, $code);
		$code = substr($code, 0, strlen($code)-1);
	}
	$count += 1;

	$activities = array();
	$start = 0;
	for ($i = 0; $i < $count; $i++) {
		$start = strpos(strtolower($url), strtolower($code), $start) - 9;
		$stop = strpos(strtolower($url), '</tr>', $start + 20) + 5;
		$len = $stop - $start;
		array_push($activities, substr($url, $start, $len));
		$start += 20;
	}

	try {
		db_register_click($_COOKIE['id'], $code);
	} catch (Exception $e) {
		error_log('Failed to register click');
	}

	echo(json_encode($activities));




?>
