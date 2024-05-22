// Show popup
$(document).ready(function() {
    $("button").filter(function() {
        return $(this).text() === "Ordina";
    }).click(function() {
        var $popup = $("#buyPopup");
        var $overlay = $("#overlay");
        $popup.show();
        $overlay.show();

        $('html, body').css({
            'overflow': 'hidden',
            'height': '100%',
            'margin': '0'
        });
    });
});

// Hide popup
$(document).ready(function() {
    var $popup = $("#buyPopup");
    var $overlay = $("#overlay");

    $("#close").click(function() {
        $popup.hide();
        $overlay.hide();
        $('html, body').css({
            'overflow': 'auto',
            'height': 'auto',
            'margin': 'auto'
        });
    });
});


// Show / hide prices
function hidePrices(groupName) {
    $(`#productForm input[name=${groupName}]`).each(function() {
        $(`#${this.id}_price`).hide();
    });
}

function addRadioEventListeners(groupName) {
    $(`#productForm input[name=${groupName}]`).on('change', function() {
        hidePrices(groupName);
        $(`#${this.id}_price`).show();
    });
}

addRadioEventListeners('rasp_version');
addRadioEventListeners('sd_size');
addRadioEventListeners('monitor_size');

$('#productForm input[type=checkbox]').on('change', function() {
    $(`#${this.id}_price`).css('display', this.checked ? 'block' : 'none');
});