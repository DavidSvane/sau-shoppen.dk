// INFO: logud() REMOVES COOKIES AND RELOADS THE PAGE
function logud() {
	document.cookie = 'id=; expires=Thu, 01 Jan 1970 00:00:00 UTC;';
	window.location.href = "";
}


// INFO: validateForm() CHECKS THAT THE USER TYPED AND ID OR MADE A SELECTION
function validateForm() {
	return ($('#lb_usr').val() != '' || $('#lb_sel').val() != null);
}


// INFO: option_click() HIDES AND SHOWS RELEVANT LOGIN DIVS
function option_click(option) {
	$('#form_options a').removeClass('o_selected');
	$('#form_options a:nth-child('+option+')').addClass('o_selected');

	for(var i=1; i<4; i++) { $('#opt_'+i).hide(); }
	$('#opt_'+option).show();
}


// INFO: set_render_height() FITS UPPER OBJECTS AND IS CALLED WHEN WINDOW SIZE CHANGES
function set_render_height() {
	var renderHeight = $(window).outerHeight() - ($('#rendered_skema h1').outerHeight() + $('#week_list').outerHeight());
	$('#rendered_skema').css('height', renderHeight);
	$('#rendered_skema').css('margin-top', $('#rendered_skema h1').outerHeight());
}
set_render_height();
$(window).resize(function () { set_render_height(); });


// INFO: DYNAMICALLY SHOWS AND HIDES DIVS WITH SHOPTION
$('.not_title').click(function () {
	if (!$(this).next().hasClass('shopped')) {
		$(this).next().toggle();
	} else {
		if ($(this).next().css('display') == 'none') {
			$(this).next().show();
			$(this).next().next().show();
		} else {
			$(this).next().hide();
			$(this).next().next().hide();
		}
	}
});


// INFO: RETRIEVES SHOPTIONS THROUGH CODE AND ACTIVITY SCRIPTS
$('.code').click(function () {
	if (!$(this).parent().next().hasClass('shopped')) {
		var shopped_activities = '<img src="res/logo_shop.gif" style="height:80px;width:80px !important;" class="centered"/>';
		var input = $(this).text();
		var input_fix = input.replace(/\W/g, '');

		$(this).parent().after('<tr class="shopped" id="shop_' + input_fix + '" style="display:none;"><td colspan="4" style="padding:1em 0;">' + shopped_activities + '</td></tr>');

		$.post("js/get_shop_codes.php", {c: input}, function(data) {
			var obj = JSON.parse(data);
			if (obj.length > 0) {
				for (var i = 0; i < obj.length; i++) {
					$.post("js/get_shop_activities.php", {c: input, a: obj[i]}, function(data) {
						var classes = JSON.parse(data);
						$('#shop_' + input_fix + ' td').html('<table></table>');
						$('#shop_' + input_fix + ' table').append();
						$('#shop_' + input_fix + ' table').append("<tr class='shop_titles'><td>Aktivitet</td><td>Beskrivelse</td><td>Type</td><td>Dag</td><td>Dato</td><td>Tid</td><td>Slut</td><td>Lokale</td><td>Underviser</td></tr>");
						for (var i = 0; i < classes.length; i++) {
							$('#shop_' + input_fix + ' table').append(classes[i]);
						}
					});
				}
			}
		});
	}
});


// INFO: fuse PROVIDES FUZZY SEARCH
/*var foptions = {
	threshold: 0.5,
	location: 0,
	distance: 100,
	maxPatternLength: 32,
	minMatchCharLength: 1,
	keys: ['name'],
	id: 'kuid'
};
var fuse = new Fuse(teacher_list, foptions);
var fres = fuse.search('');*/


/***** INFO: STUFF THAT GOT REMOVED *****/
/*
function sau_shop(input) {
	$.post("js/get_shop_codes.php", {c: input}, function(data) {
		var obj = JSON.parse(data);
		if (obj.length > 0) {
			for (var i = 0; i < obj.length; i++) {
				$.post("js/get_shop_activities.php", {c: input, a: obj[i]}, function(data) {
					var classes = JSON.parse(data);
					var txt = "";
					txt += "<h1>" + input + "</h1>";
					txt += "<a href='javascript:sau_shop_back()' class='back_btn'>Take me back!</a>";
					txt += "<table class='shopped_activities' cellspacing='0' cellpadding='0'>";
					txt += "<tr><td>Aktivitet</td><td>Beskrivelse</td><td>Type</td><td>Dag</td><td>Dato</td><td>Start</td><td>Slut</td><td>Lokale</td><td>Underviser</td></tr>";
					for (var i = 0; i < classes.length; i++) {
						txt += classes[i];
					}
					txt += "</table>";
					$('#rendered_shop').html(txt);

					$('#rendered_skema').addClass('left_main');
					$('#rendered_shop').addClass('center_shop');
				});
			}
		}
	});
}
function help_show() {
	$('#rendered_skema').addClass('right_main');
	$('#rendered_help').addClass('center_shop');
}
function help_hide() {
	$('#rendered_skema').removeClass('right_main');
	$('#rendered_help').removeClass('center_shop');
}
function sau_shop_back() {
	$('#rendered_skema').removeClass('left_main');
	$('#rendered_shop').removeClass('center_shop');
}
$(document).keypress(function(e) { if (e.key == "i") { $(".row_more").toggle(); }});
*/
