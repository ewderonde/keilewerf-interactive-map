var toggleStatus = function() {
    $.ajax({
        type: "POST",
        data: $('#toggle-form').serialize(),
        url: BASE_URL + '/php/togglestatusajax.php',
        success: function (result) {
            var data = JSON.parse(result);
            var $button = $('#toggle-status');
            var $el = $('#status-text');

            $button.removeClass();
            $button.addClass(data.btnclass);
            $button.html(data.buttonText);
            $el.html(data.statusText);

            console.log(data);
        },
        error: function (result) {
            console.log(result);
        }
    });
};

$(document).ready(function() {
    $('#toggle-status').click(function() {
        toggleStatus();
    });
});

