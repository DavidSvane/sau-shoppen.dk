<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"></meta>
	<meta name="description" content="Skema for studerende ved KU"></meta>
	<meta name="keywords" content="skema, medicin, ku"></meta>
	<meta name="author" content="David Svane"></meta>

	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="window-target" content="_top">
	<meta http-equiv="expires" content="Mon, 22 Jul 2002 11:12:01 GMT">

	<title>SAU Shoppen</title>
	<link rel="icon" href="res/icon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time();?>"></link>
</head>
<body>

<?php

	if (isset($_POST['sel'])) {

	} else if (isset($_POST['id']) || isset($_COOKIE['id'])) {
		isset($_POST['id']) ? $id=$_POST['id'] : $id=$_COOKIE['id'];
		echo('<script> document.cookie = "id=' . $id . '; expires=Thu, 18 Dec 2113 12:00:00 UTC"; </script>');

		require 'js/lib_icalreader.php';
		require 'js/get_personligt_skema.php';

		if (render_skema($id) == false) {
			require 'pages/page_login.php';
		} else {
			$output = render_skema($id);
			try {
				login_stats($id);
			} catch(Exception $e) {
				error_log('Failed to register logi');
			}
			echo '<div id="rendered_skema" class="center_full">' . $output . '</div>';
		}
	} else {
		require 'pages/page_login.php';
	}

?>

	<!-- ***** JavaScripts ***** -->
	<!-- LIBRARIES -->
	<script src="js/lib_jquery.js"></script> <!-- https://jquery.com/ -->
	<script src="js/lib_fuse.js"></script> <!-- http://fusejs.io/ -->

	<!-- CUSTOM -->
	<script src="js/logics.js?v=<?php echo time();?>"></script>

</body>
</html>
