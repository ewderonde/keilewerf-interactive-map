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

	$(document).on('click', '.company', function(){
		$('.company-opacity').fadeIn();
		var tagName = $(this).data('tag');
		$('.display.'+tagName).fadeIn();
		$('.display.'+tagName+ ' .slider').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  autoplay: true,
		  autoplaySpeed: 5000,
		});
	});

	//SVEN OPTIMALISEREN VOOR CURRENT OPENEND PANEL
	$('.close-display, .company-opacity').on('click', function(){
		$('.display').fadeOut();
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
	{'value': 'Metaal', 'data': 'metaal'},
	{'value': 'Hout', 'data': 'hout'},
	{'value': 'Meubels', 'data': 'meubels'},
	{'value': 'Stof', 'data': 'stof'},
	{'value': 'Tafels', 'data': 'tafels'},
	{'value': 'Surfplank', 'data': 'surfplank'},
	{'value': 'Fietsen', 'data': 'fietsen'},
	{'value': 'Houtbewerking', 'data': 'houtbewerking'},
	{'value': 'Staal', 'data': 'staal'},
	{'value': 'Design', 'data': 'design'},
	{'value': 'Muziek', 'data': 'hout'},
	{'value': 'Gitaar', 'data': 'hout'},
	{'value': 'Architectuur', 'data': 'hout'},
	{'value': 'Vintage', 'data': 'hout'},
	{'value': 'Decor', 'data': 'hout'},
	{'value': 'Evenementen', 'data': 'hout'},
	{'value': 'Materiaal', 'data': 'hout'},
	{'value': 'Dans', 'data': 'hout'},
	{'value': 'Industrieel', 'data': 'hout'},
	{'value': 'Film', 'data': 'hout'},
	{'value': 'Beeldhouwen', 'data': 'hout'},
	{'value': 'Kunst', 'data': 'hout'},
	{'value': 'Spacecreators', 'data': 'hout'},
	{'value': 'Meesterlijk Stofferen', 'data': 'hout'},
	{'value': 'Verbaasde Ree', 'data': 'hout'},
	{'value': 'United Enterprises', 'data': 'hout'},
	{'value': 'Dansvloer', 'data': 'hout'},
	{'value': 'In Scene Gezet', 'data': 'hout'},
	{'value': 'Studio Met', 'data': 'hout'},
	{'value': 'A69 Design', 'data': 'hout'},
	{'value': 'Funkie', 'data': 'hout'},
	{'value': 'Edutones', 'data': 'hout'},
	{'value': 'Weller Design', 'data': 'hout'},
	{'value': 'Studio Olivier', 'data': 'hout'},
	{'value': 'Van Gilst Design', 'data': 'hout'},
	{'value': 'Buurman', 'data': 'hout'},
	{'value': 'Guyot Duquesnoy', 'data': 'hout'},
	{'value': 'Buurman', 'data': 'hout'},
	{'value': 'Buro van Wieren', 'data': 'hout'},
	{'value': 'Barmhart Sound', 'data': 'hout'},
	{'value': 'Friends of the Family', 'data': 'hout'},
	{'value': 'Cosmic Carnival', 'data': 'hout'},
	{'value': 'Sil Krol', 'data': 'hout'},
	{'value': 'Art in Marble', 'data': 'hout'},
	{'value': 'Bart Lentze', 'data': 'hout'},
	{'value': 'Bende', 'data': 'hout'},
	{'value': 'Mobile Escape Room', 'data': 'hout'},
	{'value': 'Event Motor Company', 'data': 'hout'},
	{'value': 'Puk Bresser', 'data': 'hout'},
	{'value': 'Carlo Walter', 'data': 'hout'},
	{'value': 'Alex Zaagt', 'data': 'hout'},
	{'value': 'Joost Goudriaan', 'data': 'hout'},
	{'value': 'Sanitair', 'data': 'hout'},
	{'value': 'Pixelbar', 'data': 'hout'},
	{'value': 'Letolab', 'data': 'hout'},
	{'value': 'Hart voor Hout', 'data': 'hout'},
	{'value': 'Insère', 'data': 'hout'},
	{'value': 'Rinke van Wilegen', 'data': 'hout'},
	{'value': 'Gedeelde Machinale Werkplaats', 'data': 'hout'},
	{'value': 'Bananas & Bread', 'data': 'hout'},
	{'value': 'Give a Bike Foundation', 'data': 'hout'},
	{'value': 'Just Just', 'data': 'hout'},
	{'value': 'Studio Jom Heidekamp', 'data': 'hout'},
	{'value': 'Annette Vermeij', 'data': 'hout'},
	{'value': 'Assymetree', 'data': 'hout'},
	{'value': 'Bouwer', 'data': 'hout'},
	{'value': 'Hokori', 'data': 'hout'},
	{'value': 'Studio Lentekind', 'data': 'hout'},
	{'value': 'Staalslagerij', 'data': 'hout'},
	{'value': 'Man van Hout', 'data': 'hout'},
	{'value': "Beerda's Timmerwerk", 'data': 'hout'},
	{'value': 'Magic Designz', 'data': 'hout'}

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
					Methods.highlightCompanies([]);
					console.log('Geen bedrijven die voldoen aan de criteria.');
				}
			},
			error: function(result) {
				console.log(result);
			}
		});
	}
});


