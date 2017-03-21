$(document).ready(init);
var currentCategory = '';
var lastCategory = '-';

function init() {
	// Set eventlisteners on company elements.
	Methods.setEventListeners();

	$('.plattegrond').click(function(){
		$('#plattegrond').fadeIn("slow");
		$('#welcome').fadeOut("fast");
	});

	$('.company.man-van-hout').click(function(){
		$('.company-opacity').fadeIn();
		$('.display.man-van-hout').fadeIn();
		$('.slider').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  autoplay: true,
		  autoplaySpeed: 5000,
		});
	});

	$('.close-display, .company-opacity').on('click', function(){
		$('.display.man-van-hout').fadeOut();
		$('.company-opacity').fadeOut();
	});

	$('#reset-search').click(function() { Methods.resetSearchTag() });

}


var Methods = {
	setEventListeners: function() {
		// Event listener for showing info.
		$('.company').on('click', function() {
			Methods.toggleInfo($(this));
		});

		// Event listener for hiding info.
		$('.company .close').on('click', function() {
			Methods.hideInfo($(this).closest('.company'));
		})
	},
	create: function ($el, options) {
		// Set values for each company.
		console.log('Creating new company.');
	},
	toggleInfo: function ($el) {
		// Show popup info.
		var hiddenContent = $el.find('.hidden-content');
		hiddenContent.toggleClass('hide');
	},
	hideInfo: function ($el) {
		// Hide popup info.
		$el.find('.hidden-content').hide();
	},
	highlightCompanies: function (companies) {
		if(currentCategory != lastCategory) {
			Methods.resetHighlights();

			// Give all companies opacity 0.2;
			$('.company').css('opacity','0.4');

			for (var i = 0; i < companies.length; i++) {
				var companyContainer = $('.'+companies[i].tag);
				// companyContainer.toggle( "highlight" );
				// companyContainer.effect("highlight", {}, 10000);

				companyContainer.addClass('highlight');
				console.log(companyContainer);
			}

			lastCategory = currentCategory;
		} else {
			console.log('same category as last time, no need to highlight');
		}
	},
	setSearchTag: function (tag) {
		$('#tag').html('Resultaten voor: ' + tag);
		$('#selected-tag').removeClass('hidden');
	},
	resetSearchTag: function () {
		console.log('Reset search tag.');
		var $selectedTag = $('#selected-tag');
		$selectedTag.addClass('hidden');
		Methods.resetHighlights();

		currentCategory = '';
		lastCategory = '-';
	},
	resetHighlights: function () {
		var $companies = $('.company');
		$companies.removeClass('highlight');
		$companies.css('opacity','1');
	}

};

var categories = [
	{'value': 'hout', 'data': 'hout'},
	{'value': 'meubels', 'data': 'hout'},
	{'value': 'tafels', 'data': 'hout'},
	{'value': 'surfplank', 'data': 'hout'},
	{'value': 'fietsen', 'data': 'hout'},
	{'value': 'metaal', 'data': 'hout'},
	{'value': 'houtbewerking', 'data': 'hout'},
	{'value': 'staal', 'data': 'hout'},
	{'value': 'design', 'data': 'hout'},
	{'value': 'stof', 'data': 'hout'}
];

$('#autocomplete').autocomplete({
	lookup: categories,
	autoSelectFirst: true,
	noSuggestionNotice: 'Geen resultaten',
	showNoSuggestionNotice: true,
	onSelect: function (suggestion) {
		$('#autocomplete').val('');
		Methods.setSearchTag(suggestion.value);
		$.ajax({
			type: "POST",
			url: BASE_URL+'/php/search.php',
			data: {'search': suggestion.value },
			success: function (result) {
				console.log(result);
				currentCategory = suggestion.value;

				if(result.data.length > 0){
					console.log('Zoekresultaten voor ' + suggestion.value + ':');
					for (var i = 0; i < result.data.length; i++) {
						console.log(result.data[i].name);
					}

					Methods.highlightCompanies(result.data);
				} else {
					console.log('Geen bedrijven die voldoen aan de criteria.');
				}
			},
			error: function(result) {
				console.log(result);
			}
		});
	}
});


