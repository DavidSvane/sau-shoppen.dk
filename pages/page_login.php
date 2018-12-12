<?php

	require 'pages/dropdown_options.php';

?>

<div id="login_screen" class="center_full">
	<div id="rendered_login" class="center_ab">

		<!-- FRONT PAGE MAIN TITLE -->
		<h1 class="centered"><b>SAU</b>Shoppen</h1>

		<!-- LOGIN FORM -->
		<form action="index.php" onsubmit="return validateForm()" method="post">

			<div id="form_options">

				<div class="options">
					<a href="javascript:option_click(1)" class="o_selected">KU ID</a>
					<a href="javascript:option_click(2)">Manuelt</a>
					<a href="javascript:option_click(3)">Underviser</a>
				</div>

				<!-- LOGIN WITH KU ID -->
				<div id="opt_1">
					<input type="text" name="id" id="lb_usr" class="centered inputs" pattern="[A-Za-z0-9]{6}" placeholder="KU ID" maxlength="6" autofocus></input>
				</div>

				<!-- LOGIN BY CHOOSING SEMESTER MODULE INSTITUE OR FACULTY -->
				<div id="opt_2">
					<!--<select name="sel" id="lb_sel" class="inputs">
						<option value="" disabled selected>Vælg skema</option>
						<option value="" disabled>SUND Semestre og Blokke</option>
						<?php echo($sund_semesters); ?>
						<option value="" disabled>KU Institutter og Fakulteter</option>
						<?php echo($ku_institutes); ?>
					</select>-->
					<p class="error">Under konstruktion!</p>
				</div>

				<!-- LOGIN BY TYPING NAME OF TEACHER -->
				<div id="opt_3">
					<!--<input type="text" name="und" id="lb_und" class="centered inputs awesomplete" placeholder="Skriv navn" list="teachers"></input>
					<datalist id="teachers">
						<?php
							foreach($teachers as $teacher_id => $teacher) {
								echo('<option>'.$teacher.'</option>');
							}
						?>
					</datalist>-->
					<p class="error">Under konstruktion!</p>
				</div>

			</div>

			<input type="submit" class="centered" value="Vis skema" id="lb_btn"></input>

		</form>

	</div>

	<?php

		require 'pages/page_front.php';

	?>
</div>
