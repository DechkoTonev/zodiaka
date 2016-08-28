$(function() {
    $('#messages li').click(function() {
        $(this).fadeOut();
    });
    setTimeout(function() {
        $('#messages li.info').fadeOut();
    }, 3000);
});

function setFieldValue(fieldName, fieldValue) {
    let field = $("input[name='" + fieldName + "'], textarea[name='" + fieldName + "']");
    field.val(fieldValue);
}

function showValidationError(fieldName, errorMsg) {
    let field = $("input[name='" + fieldName + "'], textarea[name='" + fieldName + "']");
    field.after(
        $("<span class='validation-error'>").text(errorMsg)
    );
    field.focus();
}


// Функции за падащата форма при създаване.
function deselect(e) {
    $('.pop').slideFadeToggle(function() {
        e.removeClass('selected');
    });
}

$(function() {
    $('#contact').on('click', function() {
        if($(this).hasClass('selected')) {
            deselect($(this));
        } else {
            $(this).addClass('selected');
            $('.pop').slideFadeToggle();
        }
        return false;
    });

    $('.close').on('click', function() {
        deselect($('#contact'));
        return false;
    });
});

$.fn.slideFadeToggle = function(easing, callback) {
    return this.animate({ opacity: 'toggle', height: 'toggle' }, 'fast', easing, callback);
};