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
        var target = $('.'+data[i].tag);
        if(data[i].present == 1) {
            target.css('background-color', '#27ae60');
        } else {
            target.css('background-color', '#c0392b');
        }
    }
};

setInterval(function () { update(); }, 3000);

