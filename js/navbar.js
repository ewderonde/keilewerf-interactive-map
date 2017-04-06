$(document).ready(function() {
    $('#warehouse-one-tab').click(function(){
        showWarehouse($(this).data('tag'));
    });
    $('#warehouse-two-tab').click(function(){
        showWarehouse($(this).data('tag'));
    });
});

var showWarehouse = function (tag) {
    if(tag == 1) {
        $('.warehouse-one').show();
        $('.warehouse-two').hide();
    } else {
        $('.warehouse-two').show();
        $('.warehouse-one').hide();
    }
};

