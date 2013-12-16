(function ($) {
	// Remove the textarea before displaying visual editor
	var $description = $('#description');
	if ($description.length > 0) {
		$description.parents('tr').remove();
	}
})(jQuery);