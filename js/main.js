$(document).ready(init);


function init() {
	console.log('init');

	// Set eventlisteners on company elements.
	Company.setEventListeners();
}


var Company = {
	setEventListeners: function() {
		$('.company').each(function() {
			$(this).on('click', Company.info($(this)));
		})
	},
	create: function ($el, options) {
		console.log('Creating new company.');
		
	},
	select: function ($el) {
		console.log('Selecting company.');
	},
	info: function ($el) {
		console.log('Showing company information.');

	}
}


