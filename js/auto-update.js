var update = function() {
    $.ajax({
        type: "GET",
        url: BASE_URL + '/php/companies.php',
        success: function (result) {
            renderCompanies(result);
        },
        error: function (result) {
            console.log(result);
        }
    });
};

var renderCompanies = function (companies) {
    console.log('Refresh.');
    var data = companies;
    for(var i = 0; i < data.length; i++) {
        var target = $('.company.'+data[i].tag);
        if(data[i].present == 1) {
            target.removeClass('offline');
        } else {
            target.addClass('offline');
        }
    }
};

setInterval(function () { update(); }, 3000);

