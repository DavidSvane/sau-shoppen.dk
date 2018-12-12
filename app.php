<?php

function app_skema_personligt() {
	require 'js/class.iCalReader.php';
	require 'js/personligt_skema_script.php';

	echo(render_skema($_POST['id']));
}

function app_login_check() {
	$schedule = file_get_contents('https://personligtskema.ku.dk/ical.asp?objectclass=student&id=' . $_POST["id"]);

	if (strlen($schedule) > 600) {
		echo 1;
	} else {
		echo 0;
	}
}

function app_feedback() {
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

	$stmt = $conn->prepare("INSERT INTO ss_feedback (user, feedback) VALUES (?,?)");
	$stmt->bind_param("ss", $_POST['u'], $_POST['t']);

	$stmt->execute();
	$stmt->close();
	$conn->close();
}

function shop_class() {
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

	$stmt = $conn->prepare("INSERT INTO ss_shopped (time, user, class) VALUES (?,?,?)");
	$stmt->bind_param("sss", $_POST['t'], $_POST['u'], $_POST['c']);

	$stmt->execute();
	$stmt->close();
	$conn->close();
}

function app_manuelt_skema() {
	$valgt = $_POST['valg'];
	//$valgt = rawurldecode($valgt);

	$url = "https://skema.ku.dk/SUND1718/reporting/textspreadsheet?objectclass=programme+of+study&idtype=id&identifier=" . $valgt . "&t=SWSCUST2+programme+of+study+textspreadsheet&days=1-5&weeks=26-52&periods=1-68&template=SWSCUST2+programme+of+study+textspreadsheet";

	/*if (substr($valgt,0,1) == '%') {
		$url = "https://skema.ku.dk/SUND1718/reporting/textspreadsheet?objectclass=programme+of+study&idtype=id&identifier=" . $valgt . "&t=SWSCUST2+programme+of+study+textspreadsheet&days=1-5&weeks=26-52&periods=1-68&template=SWSCUST2+programme+of+study+textspreadsheet";
	} else {
		$valgt = str_replace('æ','%E6',$valgt);
		$valgt = str_replace('ø','%F8',$valgt);
		$valgt = str_replace('å','%E5',$valgt);
		//$valgt = str_replace('Æ','',$valgt);
		$valgt = str_replace('Ø','%D8',$valgt);
		$valgt = str_replace('Å','%C5',$valgt);
		$valgt = str_replace(' ','+',$valgt);
		$url = "https://skema.ku.dk/tt/tt.asp?SDB=KU1718&language=DK&folder=Reporting&style=textspreadsheet&type=department&idtype=name&id=" . $valgt . "&weeks=40&days=1-5&periods=1-68&width=0&height=0&template=SWSCUST2+department+textspreadsheet";
	}*/

	$pattern = '/\s\s+/';
	$skema = preg_replace($pattern, ' ', utf8_encode(file_get_contents($url)));

	$skema = substr($skema, strpos($skema, "<p>"), strpos($skema, 'class="footer-border') - strpos($skema, "<p>"));

	echo($skema);
}

function returnSkemaSelection() {
	return '<option value="" class="disabled" disabled>SUND - Semester / Blok</option><option value="%23SPLUS025E5A">Cand.scient.san - 1. semester</option><option value="%23SPLUS4F9487">Cand.scient.san - 2. semester</option><option value="%23SPLUSB99E15">Cand.scient.san - 3. semester</option><option value="%23SPLUS5710A1">Cand.scient.san - 4. semester</option><option value="%23SPLUS025E59">Cand.scient.san - suppleringssemester</option><option value="%23SPLUS001DBC">Civil.ing - 01.semester</option><option value="%23SPLUS001DBD">Civil.ing - 02.semester</option><option value="%23SPLUS001DBE">Civil.ing - 03.semester</option><option value="%23SPLUS001DBF">Civil.ing - 04.semester</option><option value="%23SPLUS001DC0">Civil.ing - 05.semester</option><option value="%23SPLUS001DC1">Civil.ing - 06.semester</option><option value="%23SPLUS025EF3">Civil.ing - 07.semester</option><option value="%23SPLUSA0086D">Civil.ing - 08.semester</option><option value="%23SPLUS565A63">Civil.ing - 09.semester</option><option value="%23SPLUS96B85F">Diverse - mik/mak-lokaler</option><option value="%23SPLUSDB78FE">Folkesundhedsvidenskab Bachelor - 3. semester</option><option value="%23SPLUS10DD30">Folkesundhedsvidenskab Bachelor - 4. semester</option><option value="%23SPLUS001DC2">Humanbiologi 1. semester</option><option value="%23SPLUS001DC3">Humanbiologi 2. semester</option><option value="%23SPLUS001DC4">Humanbiologi 3. semester</option><option value="%23SPLUSD35497">Humanbiologi 4. semester</option><option value="%23SPLUSDD20CE">IT og Sundhed 1. semester - IT og Sundhed 1. semester</option><option value="%23SPLUS68118E">IT og Sundhed 1. semester Kandidat - IT og Sundhed 1. semester Kandidat</option><option value="%23SPLUS7E883E">IT og Sundhed 2. semester - IT og Sundhed 2. semester</option><option value="%23SPLUSC2EFA1">IT og Sundhed 2. semester Kandidat - IT og Sundhed 2. semester Kandidat</option><option value="%23SPLUSBA3229">IT og Sundhed 3. semester - IT og Sundhed 3. semester</option><option value="%23SPLUSB10079">IT og Sundhed 3. semester Kandidat - IT og Sundhed 3. semester Kandidat</option><option value="%23SPLUS5CA941">IT og Sundhed 4. semester - IT og Sundhed 4. semester</option><option value="%23SPLUS565A67">IT og Sundhed 5. semester - IT og Sundhed 5. semester</option><option value="%23SPLUSD43041">Immunology and Inflammation 1st Sem.</option><option value="%23SPLUSCE5F6B">Immunology and Inflammation 2nd Sem.</option><option value="%23SPLUSCE5F6C">Immunology and Inflammation 3rd Sem.</option><option value="%23SPLUS19CE96">Immunology and Inflammation Electives</option><option value="%23SPLUS001DC5">Klinikassistent uddannelsen</option><option value="%23SPLUS51669E">Master of HIV 1. semester</option><option value="%23SPLUS0CE695">Master of HIV 2. semester</option><option value="%23SPLUS001DD0">Medicin Bachelor 01. semester</option><option value="%23SPLUS001DD1">Medicin Bachelor 02. semester</option><option value="%23SPLUS001DD2">Medicin Bachelor 03. semester</option><option value="%23SPLUS001DD3">Medicin Bachelor 04. semester</option><option value="%23SPLUS001DD4">Medicin Bachelor 05. semester</option><option value="%23SPLUS001DD5">Medicin Bachelor 06. semester</option><option value="%23SPLUS001DD6">Medicin Kandidat 01. semester</option><option value="%23SPLUS6844B3">Medicin Kandidat 02. semester (2009-ordning)</option><option value="%23SPLUS001DD7">Medicin Kandidat 02. semester</option><option value="%23SPLUS661125">Medicin Kandidat 03. semester (2015)</option><option value="%23SPLUS001DD8">Medicin Kandidat 03. semester</option><option value="%23SPLUS001DD9">Medicin Kandidat 04. semester</option><option value="%23SPLUSE5A3BE">Medicin Kandidat 05. semester</option><option value="%23SPLUS1A3943">Medicin Kandidat 06. semester</option><option value="%23SPLUS001DC7">Molekylærbiomedicin 1. år (2. sem.)</option><option value="%23SPLUS001DC8">Molekylærbiomedicin 2. år (3. sem.)</option><option value="%23SPLUS001DCB">Molekylærbiomedicin 3. år (5. sem.)</option><option value="%23SPLUSA6EBCC">Molekylærbiomedicin 6. sem. - Molekylærbiomedicin 6. sem.</option><option value="%23SPLUSCA6712">Molekylærbiomedicin 7. sem. - Molekylærbiomedicin 7. sem.</option><option value="%23SPLUSC1A935">Molekylærbiomedicin 8. sem. - Molekylærbiomedicin 8. sem.</option><option value="%23SPLUS3DC2E6">Odontologi, Bachelor 01.semester</option><option value="%23SPLUSD35499">Odontologi, Bachelor 02.semester</option><option value="%23SPLUS001DDD">Odontologi, Bachelor 03.semester</option><option value="%23SPLUSDEF70F">Odontologi, Bachelor 04.semester</option><option value="%23SPLUS001DDF">Odontologi, Bachelor 05.semester</option><option value="%23SPLUS001DE0">Odontologi, Bachelor 06.semester</option><option value="%23SPLUS001DE1">Odontologi, Kandidat 01.semester</option><option value="%23SPLUS001DE2">Odontologi, Kandidat 02.semester</option><option value="%23SPLUS001DE3">Odontologi, Kandidat 03.semester</option><option value="%23SPLUS001DE4">Odontologi, Kandidat 04.semester</option><option value="%23SPLUSCB0DEB">Tandplejer - 1. semester / modul 01+02 (E) - Tp01</option><option value="%23SPLUS0DA556">Tandplejer - 2. semester / modul 03+04 (F) - Tp01</option><option value="%23SPLUSCB0DEC">Tandplejer - 3. semester / modul 05+06 (E) - Tp01</option><option value="%23SPLUS0DA555">Tandplejer - 4. semester / modul 07+08 (F) - Tp02</option><option value="%23SPLUSCB0DED">Tandplejer - 5. semester / modul 09+10 (E) - Tp01</option><option value="%23SPLUS0DA554">Tandplejer - 6. semester / modul 11+12 (F) - Tp03</option><option value="%23SPLUS001DE5">Tandplejeruddannelsen - Modul 01+02 (E) - Tp01</option><option value="%23SPLUS001DE6">Tandplejeruddannelsen - Modul 03+04 (F) - Tp02</option><option value="%23SPLUS001DE7">Tandplejeruddannelsen - Modul 05+06 (E) - Tp03</option><option value="%23SPLUS001DE8">Tandplejeruddannelsen - Modul 07+08 (F) - Tp04</option><option value="%23SPLUS96F34C">Tandplejeruddannelsen - Modul 09+10 (E) - Tp05</option><option value="%23SPLUS96F34D">Tandplejeruddannelsen - Modul 11+12 (F) - Tp06</option><option value="%23SPLUSD3549A">Tandplejeruddannelsen - introforløb</option><option value="" class="disabled" disabled>KU - Institut / Fakultet</option><option value="1000 - Det Teologiske Fakultet">1000 - Det Teologiske Fakultet</option><option value="1265 - Studienævnet for Afrikastudier">1265 - Studienævnet for Afrikastudier</option><option value="2000 - Det Samfundsvidenskabelige Fakultet">2000 - Det Samfundsvidenskabelige Fakultet</option><option value="2200 - Økonomisk Institut">2200 - Økonomisk Institut</option><option value="2300 - Institut for Statskundskab">2300 - Institut for Statskundskab</option><option value="2400 - Institut for antropologi">2400 - Institut for antropologi</option><option value="2435 - Studienævnet for Global Udvikling">2435 - Studienævnet for Global Udvikling</option><option value="2500 - Sociologisk Institut">2500 - Sociologisk Institut</option><option value="2600 - Institut for Psykologi 2600">2600 - Institut for Psykologi 2600</option><option value="2900 - Driftsområde Indre By">2900 - Driftsområde Indre By</option><option value="3120 - Institut for International Sundhed, Immunologi og Mikrobiologi">3120 - Institut for International Sundhed, Immunologi og Mikrobiologi</option><option value="3300 - Institut for Folkesundhed">3300 - Institut for Folkesundhed</option><option value="3320 - Almen Medicin">3320 - Almen Medicin</option><option value="3660 - Institut for Produktionsdyr og Heste">3660 - Institut for Produktionsdyr og Heste</option><option value="3670 - Institut for Klinisk Veterinær- og Husdyrsvidenskab">3670 - Institut for Klinisk Veterinær- og Husdyrsvidenskab</option><option value="3680 - Institut for Veterinær Sygdomsbiologi">3680 - Institut for Veterinær Sygdomsbiologi</option><option value="3790 - Skolen for Klinikassistenter og Tandplejere 3790">3790 - Skolen for Klinikassistenter og Tandplejere 3790</option><option value="3914 - Uddannelsesråd for veterinærvidenskab og husdyrvidenskab">3914 - Uddannelsesråd for veterinærvidenskab og husdyrvidenskab</option><option value="3915 - BSc + MSc Veterinær Medicin">3915 - BSc + MSc Veterinær Medicin</option><option value="3917 - MSc Animal Science">3917 - MSc Animal Science</option><option value="3925 - Sundhed og Informatik">3925 - Sundhed og Informatik</option><option value="3931 - Miljøkemi og Sundhed">3931 - Miljøkemi og Sundhed</option><option value="3932 - Global Sundhed">3932 - Global Sundhed</option><option value="3934 - BSc + MSc Folkesundhedsvidenskab">3934 - BSc + MSc Folkesundhedsvidenskab</option><option value="3970 - EPH EuroPubHealth">3970 - EPH EuroPubHealth</option><option value="3970 - MPH Master of Public Health">3970 - MPH Master of Public Health</option><option value="3975 - Master of International Health (MIH-MDMa)">3975 - Master of International Health (MIH-MDMa)</option><option value="3979 - Master of Headache Disorders">3979 - Master of Headache Disorders</option><option value="3979 - Masteruddannelse i hovedpinesygdomme">3979 - Masteruddannelse i hovedpinesygdomme</option><option value="3995 - Ph.d. Kurser Biostatistisk Afdeling">3995 - Ph.d. Kurser Biostatistisk Afdeling</option><option value="4000 - Det Humanistiske Fakultet">4000 - Det Humanistiske Fakultet</option><option value="4555 - Åbent Universitet">4555 - Åbent Universitet</option><option value="4691">4691</option><option value="4721 - Institut for Nordiske Studier og Sprogvidenskab">4721 - Institut for Nordiske Studier og Sprogvidenskab</option><option value="4761 - Institut for Medier, Erkendelse og Formidling">4761 - Institut for Medier, Erkendelse og Formidling</option><option value="4781 - Saxo-Instituttet - Arkæologi, Etnologi, Historie og Græsk og Latin">4781 - Saxo-Instituttet - Arkæologi, Etnologi, Historie og Græsk og Latin</option><option value="4801 - Institut for Tværkulturelle og regionale studier">4801 - Institut for Tværkulturelle og regionale studier</option><option value="4821 - Institut for Engelsk, Germansk og Romansk">4821 - Institut for Engelsk, Germansk og Romansk</option><option value="4841 - Institut for Kunst og Kulturvidenskab">4841 - Institut for Kunst og Kulturvidenskab</option><option value="4900 - IVA">4900 - IVA</option><option value="5000 - Det Natur- og Biovidenskabelige Fakultet">5000 - Det Natur- og Biovidenskabelige Fakultet</option><option value="5010 - Institut for Matematiske Fag">5010 - Institut for Matematiske Fag</option><option value="5030 - Niels Bohr Institutet">5030 - Niels Bohr Institutet</option><option value="5070 - Institut for Geovidenskab og Naturforvaltning">5070 - Institut for Geovidenskab og Naturforvaltning</option><option value="5100 - Datalogisk Institut">5100 - Datalogisk Institut</option><option value="5210 - Institut for Naturfagenes Didaktik">5210 - Institut for Naturfagenes Didaktik</option><option value="5230 - Kemisk Institut">5230 - Kemisk Institut</option><option value="5290 - Statens Naturhistoriske Museum">5290 - Statens Naturhistoriske Museum</option><option value="5410 - Institut for Idræt og Ernæring">5410 - Institut for Idræt og Ernæring</option><option value="5440 - Institut for Plante- og Miljøvidenskab">5440 - Institut for Plante- og Miljøvidenskab</option><option value="5480 - Institut for Fødevare- og Ressourceøkonomi">5480 - Institut for Fødevare- og Ressourceøkonomi</option><option value="5520 - Institut for Fødevarevidenskab">5520 - Institut for Fødevarevidenskab</option><option value="5550 - Biologisk Institut">5550 - Biologisk Institut</option><option value="6000 - Det Juridiske Fakultet">6000 - Det Juridiske Fakultet</option><option value="6600">6600</option><option value="6701 - Juridisk Masteruddannelse i Konfliktmægling">6701 - Juridisk Masteruddannelse i Konfliktmægling</option><option value="6702 - Juridisk Diplomuddannelse i Krimonologi">6702 - Juridisk Diplomuddannelse i Krimonologi</option><option value="IBT-7000 - Fællesadministrationen">IBT-7000 - Fællesadministrationen</option><option value="IBT-9000 - Ekstern diverse">IBT-9000 - Ekstern diverse</option><option value="IBT-9040 - Øresundsuniversitet">IBT-9040 - Øresundsuniversitet</option><option value="IBT-9499 - DIS">IBT-9499 - DIS</option><option value="IBT-9500 - Anerkendte Studenter Oganisationer">IBT-9500 - Anerkendte Studenter Oganisationer</option><option value="IBT-9500 - Studenterrådet ved KU">IBT-9500 - Studenterrådet ved KU</option><option value="IBT-9513 - Folkeuniversitetet">IBT-9513 - Folkeuniversitetet</option><option value="IBT-9536 - Studieskolen">IBT-9536 - Studieskolen</option><option value="IBT-9897 - Forskningsenheden for Almen Praksis i København">IBT-9897 - Forskningsenheden for Almen Praksis i København</option><option value="SCI-BRIC">SCI-BRIC</option><option value="SCI-FS">SCI-FS</option><option value="SCI-Folkeuniversitetet">SCI-Folkeuniversitetet</option><option value="SCI-Gymnasiebesøg">SCI-Gymnasiebesøg</option><option value="SCI-Science Stud.">SCI-Science Stud.</option>';
}
function getSkemaSelection() {
	echo(returnSkemaSelection());
}

isset($_POST['quest']) ? $quest = $_POST['quest'] : $quest = '';
switch($quest) {
	case 'personligt_skema': app_skema_personligt(); break;
	case 'login_check': app_login_check(); break;
	case 'feedback': app_feedback(); break;
	case 'shopping': shop_class(); break;
	case 'manuelt_skema': app_manuelt_skema(); break;
	case 'selections': getSkemaSelection(); break;
}

?>
