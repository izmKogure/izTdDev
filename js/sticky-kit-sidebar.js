jQuery(function() {

	return jQuery('aside').stick_in_parent({
			offset_top: 20
	});

	setTimeout(function() {
			jQuery(document.body).trigger('sticky_kit:recalc');
	}, 1000);
});