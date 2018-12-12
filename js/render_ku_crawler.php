<?php

	function array_flatten($array) {
		if (!is_array($array)) {
			return false;
		}
		$result = array();
		foreach ($array as $key => $value) {
			if (is_array($value)) {
				$result = array_merge($result, array_flatten($value));
			} else {
				$result[$key] = $value;
			}
		}
		return $result;
	}

	$options = '<option value="%23SPLUS025E5A">Cand.scient.san - 1. semester - </option><option value="%23SPLUS4F9487">Cand.scient.san - 2. semester - </option><option value="%23SPLUSB99E15">Cand.scient.san - 3. semester - </option><option value="%23SPLUS5710A1">Cand.scient.san - 4. semester - </option><option value="%23SPLUS025E59">Cand.scient.san - suppleringssemester - </option><option value="%23SPLUS96B85F">Diverse - mik/mak-lokaler - </option><option value="%23SPLUSDB78FE">Folkesundhedsvidenskab Bachelor - 3. semester - </option><option value="%23SPLUS10DD30">Folkesundhedsvidenskab Bachelor - 4. semester - </option><option value="%23SPLUS001DC2">Human Biology 1. semester - </option><option value="%23SPLUS001DC3">Human Biology 2. semester - </option><option value="%23SPLUS001DC4">Human Biology 3. semester - </option><option value="%23SPLUSD35497">Human Biology 4. semester - </option><option value="%23SPLUSD43041">Immunology and Inflammation 1st Sem. - </option><option value="%23SPLUSCE5F6B">Immunology and Inflammation 2nd Sem. - </option><option value="%23SPLUSCE5F6C">Immunology and Inflammation 3rd Sem. - </option><option value="%23SPLUS19CE96">Immunology and Inflammation Electives - </option><option value="%23SPLUS001DC5">Klinikassistent uddannelsen - </option><option value="%23SPLUS51669E">Master of HIV 1. semester - </option><option value="%23SPLUS0CE695">Master of HIV 2. semester - </option><option value="%23SPLUS001DBC">MedTek - 01.semester - </option><option value="%23SPLUS001DBD">MedTek - 02.semester - </option><option value="%23SPLUS001DBE">MedTek - 03.semester - </option><option value="%23SPLUS001DBF">MedTek - 04.semester - </option><option value="%23SPLUS001DC0">MedTek - 05.semester - </option><option value="%23SPLUS001DC1">MedTek - 06.semester - </option><option value="%23SPLUS025EF3">MedTek - 07.semester - </option><option value="%23SPLUSA0086D">MedTek - 08.semester - </option><option value="%23SPLUS565A63">MedTek - 09.semester - </option><option value="%23SPLUS001DD0">Medicin Bachelor 01. semester - </option><option value="%23SPLUS001DD1">Medicin Bachelor 02. semester - </option><option value="%23SPLUS001DD2">Medicin Bachelor 03. semester - </option><option value="%23SPLUS001DD3">Medicin Bachelor 04. semester - </option><option value="%23SPLUS001DD4">Medicin Bachelor 05. semester - </option><option value="%23SPLUS001DD5">Medicin Bachelor 06. semester - </option><option value="%23SPLUS001DD6">Medicin Kandidat 01. semester - </option><option value="%23SPLUS6844B3">Medicin Kandidat 02. semester (2009-ordning) - </option><option value="%23SPLUS001DD7">Medicin Kandidat 02. semester - </option><option value="%23SPLUS661125">Medicin Kandidat 03. semester (2015) - </option><option value="%23SPLUS001DD8">Medicin Kandidat 03. semester - </option><option value="%23SPLUS001DD9">Medicin Kandidat 04. semester - </option><option value="%23SPLUSE5A3BE">Medicin Kandidat 05. semester - </option><option value="%23SPLUS1A3943">Medicin Kandidat 06. semester - </option><option value="%23SPLUS001DC7">Molekylærbiomedicin Bachelor 2. sem. - </option><option value="%23SPLUS001DC8">Molekylærbiomedicin Bachelor 3. sem. - </option><option value="%23SPLUS001DCB">Molekylærbiomedicin Bachelor 5. sem. - </option><option value="%23SPLUSA6EBCC">Molekylærbiomedicin Bachelor 6. sem. - Molekylærbiomedicin Bachelor 6. sem.</option><option value="%23SPLUSCA6712">Molekylærbiomedicin Kandidat 1. sem. - Molekylærbiomedicin Kandidat 1. sem.</option><option value="%23SPLUSC1A935">Molekylærbiomedicin Kandidat 2. sem. - Molekylærbiomedicin Kandidat 2. sem.</option><option value="%23SPLUS3DC2E6">Odontologi, Bachelor 01.semester - </option><option value="%23SPLUSD35499">Odontologi, Bachelor 02.semester - </option><option value="%23SPLUS001DDD">Odontologi, Bachelor 03.semester - </option><option value="%23SPLUSDEF70F">Odontologi, Bachelor 04.semester - </option><option value="%23SPLUS001DDF">Odontologi, Bachelor 05.semester - </option><option value="%23SPLUS001DE0">Odontologi, Bachelor 06.semester - </option><option value="%23SPLUS001DE1">Odontologi, Kandidat 01.semester - </option><option value="%23SPLUS001DE2">Odontologi, Kandidat 02.semester - </option><option value="%23SPLUS001DE3">Odontologi, Kandidat 03.semester - </option><option value="%23SPLUS001DE4">Odontologi, Kandidat 04.semester - </option><option value="%23SPLUSDD20CE">Sundhed og Informatik Bachelor 1. semester - Sundhed og Informatik Bachelor 1. semester</option><option value="%23SPLUS7E883E">Sundhed og Informatik Bachelor 2. semester - Sundhed og Informatik Bachelor 2. semester</option><option value="%23SPLUSBA3229">Sundhed og Informatik Bachelor 3. semester - Sundhed og Informatik Bachelor 3. semester</option><option value="%23SPLUS5CA941">Sundhed og Informatik Bachelor 4. semester - Sundhed og Informatik Bachelor 4. semester</option><option value="%23SPLUS565A67">Sundhed og Informatik Bachelor 5. semester - Sundhed og Informatik Bachelor 5. semester</option><option value="%23SPLUS68118E">Sundhed og Informatik Kandidat 1. semester - Sundhed og Informatik Kandidat 1. semester</option><option value="%23SPLUSC2EFA1">Sundhed og Informatik Kandidat 2. semester - Sundhed og Informatik Kandidat 2. semester</option><option value="%23SPLUSB10079">Sundhed og Informatik Kandidat 3. semester - Sundhed og Informatik Kandidat 3. semester</option><option value="%23SPLUSCB0DEB">Tandplejer - 1. semester / modul 01+02 (E) - Tp01</option><option value="%23SPLUS0DA556">Tandplejer - 2. semester / modul 03+04 (F) - Tp01</option><option value="%23SPLUSCB0DEC">Tandplejer - 3. semester / modul 05+06 (E) - Tp01</option><option value="%23SPLUS0DA555">Tandplejer - 4. semester / modul 07+08 (F) - Tp02</option><option value="%23SPLUSCB0DED">Tandplejer - 5. semester / modul 09+10 (E) - Tp01</option><option value="%23SPLUS0DA554">Tandplejer - 6. semester / modul 11+12 (F) - Tp03</option><option value="%23SPLUS001DE5">Tandplejeruddannelsen - Modul 01+02 (E) - Tp01</option><option value="%23SPLUS001DE6">Tandplejeruddannelsen - Modul 03+04 (F) - Tp02</option><option value="%23SPLUS001DE7">Tandplejeruddannelsen - Modul 05+06 (E) - Tp03</option><option value="%23SPLUS001DE8">Tandplejeruddannelsen - Modul 07+08 (F) - Tp04</option><option value="%23SPLUS96F34C">Tandplejeruddannelsen - Modul 09+10 (E) - Tp05</option><option value="%23SPLUS96F34D">Tandplejeruddannelsen - Modul 11+12 (F) - Tp06</option><option value="%23SPLUSD3549A">Tandplejeruddannelsen - introforløb - </option>';

	$options = explode('value="', str_replace("<option", "", str_replace("</option>", "", $options)));

	for ($j = 0; $j < count($options); $j++) {
		$sorted[$j] = substr($options[$j],0,strpos($options[$j],'">'));
	}

	for ($i = 1; $i < count($sorted); $i++) {
		try {
			$skemaer[$i] = trim(preg_replace('/\s\s+/', ' ', utf8_encode(file_get_contents('https://skema.ku.dk/SUND1819/reporting/textspreadsheet?objectclass=programme+of+study&idtype=id&identifier=' . $sorted[$i] . '&t=SWSCUST2+programme+of+study+textspreadsheet&days=1-5&weeks=1-27&periods=1-68&template=SWSCUST2+programme+of+study+textspreadsheet'))));
		} catch (Exception $e) {
			$skemaer[$i] = 'error';
		}
	}
	for ($k = 1; $k < count($skemaer); $k++) {
		$tables[$k] = explode("spreadsheet", str_replace(" ", "", $skemaer[$k]));
		for ($kk = 0; $kk < count($tables[$k]); $kk++) {
			$tables[$k][$kk] = explode("</tr><tr><td>", $tables[$k][$kk]);
			for ($kkk = 0; $kkk < count($tables[$k][$kk]); $kkk++) {
				$tables[$k][$kk][$kkk] = substr($tables[$k][$kk][$kkk], 0, 6);
			}
		}
		$uniques[$k] = implode("_", preg_replace("/[^a-zA-Z0-9]+/", "", array_unique(array_flatten($tables[$k])))) . '_____' . $sorted[$k];
	}

	$output = json_encode($uniques);
	file_put_contents("data_ku_codes.json", $output);

	/*
	Function that should be used on the other side, where $output has been turned into a JSON-file.

	for ($l = 0; $l < count($uniques); $l++) {
		if (strpos($uniques[$l], 'Me04F')) { echo explode('_____', $uniques[$l])[1]; }
	}
	*/

?>
