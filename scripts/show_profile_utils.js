function checkWindowSize() {
    if (window.innerWidth <= 768) {
        $("#main-div").removeClass('w3-card');
    } else {
        $("#main-div").addClass('w3-card');
    }
}

$(document).ready(function(){
    $('#number_cc').on('input', function() {
        var val = $(this).val().replace(/\D/g, '');
        var newVal = '';

        for (var i = 0; i < val.length; i++) {
            if (i > 0 && i % 4 === 0) {
                newVal += ' ';
            }
            newVal += val[i];
        }

        $(this).val(newVal);
    });

    $('#exp_cc').on('input', function() {
        var val = $(this).val().replace(/\D/g, '');
        if (val.length > 2) {
            val = val.substring(0, 2) + '/' + val.substring(2, 4);
        }
        $(this).val(val);
    });

    $('#sc_cc').on('input', function() {
        var val = $(this).val().replace(/\D/g, '');
        $(this).val(val);
    });

    // Check on document ready
    checkWindowSize();
});

// Check on window resize
$(window).resize(checkWindowSize);