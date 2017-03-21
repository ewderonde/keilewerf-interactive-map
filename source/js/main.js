$(document).ready(init);


function init() {
	console.log('init');

	// Set eventlisteners on company elements.
	Company.setEventListeners();
}


var Company = {
	setEventListeners: function() {
		// Event listener for showing info.
		$('.company').on('click', function() {
			Company.toggleInfo($(this));
		})

		// Event listener for hiding info.
		$('.company .close').on('click', function() {
			Company.hideInfo($(this).closest('.company'));
		}) wadawd
	},
	create: function ($el, options) {
		// Set values for each company.
		console.log('Creating new company.');
	},
	toggleInfo: function ($el) {
		// Show popup info.
		let hiddenContent = $el.find('.hidden-content');
		hiddenContent.toggleClass('hide');
	},
	hideInfo: function ($el) {
		// Hide popup info.
		$el.find('.hidden-content').hide();
	},
	highlightCompany: function ($el) {
	}
}
