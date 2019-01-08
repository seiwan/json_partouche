function validURL(field) {
    $('[name="' + field + '"]').on('blur change', function() {
        var urlregex = new RegExp( "^(http|https)\://([a-zA-Z0-9\.\-]+(\:[a-zA-Z0-9\.&amp;%\$\-]+)*@)*((25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[0-9])|localhost|([a-zA-Z0-9\-]+\.)*[a-zA-Z0-9\-]+\.(com|edu|gov|int|mil|net|org|biz|arpa|info|name|pro|aero|coop|museum|[a-zA-Z]{2}))(\:[0-9]+)*(/($|[a-zA-Z0-9\.\,\?\'\\\+&amp;%\$#\=~_\-]+))*$");

        $('#' + field + 'ErrorMsg').remove();

        if ($('[name="' + field + '"]').val() == '' || !urlregex.test( $('[name="' + field + '"]').val() )) {
            $('#group-' + field).removeClass('has-success');
            $('#group-' + field).addClass('has-error');

            if ($('[name="' + field + '"]').val() == '') {
                var errorMsg = 'Veuillez saisir une URL.';
            } else if ( !urlregex.test( $(this).val() ) ) {
                var errorMsg = 'L\'URL n\'est pas valide. (http ou https uniquement)';
            }

            $('[name="' + field + '"]').after('<span id="' + field + 'ErrorMsg" class="help-block"><strong>' + errorMsg + '</strong></span>');
        } else {
            $('#group-' + field).removeClass('has-error');
            $('#group-' + field).addClass('has-success');
        }
    });
}

function validNumber(field, min ,max) {
    $('[name="' + field + '"]').on('blur change', function() {
        $('#' + field + 'ErrorMsg').remove();

        if ($(this).val() == '' || ( parseFloat( $(this).val() ) != parseInt( $(this).val() ) || isNaN( $(this).val() ) ) || $(this).val() < 0 || $(this).val() > 600) {
            $('#group-' + field).removeClass('has-success');
            $('#group-' + field).addClass('has-error');

            if ($(this).val() == '') {
                var errorMsg = 'Veuillez saisir une valeur valide.';
            } else if ( ( parseFloat( $(this).val() ) != parseInt( $(this).val() ) || isNaN( $(this).val() ) ) ) {
                var errorMsg = 'La valeur doit être un nombre entier uniquement.';
            } else if ($(this).val() < 0 || $(this).val() > 600) {
                var errorMsg = 'La valeur doit être comprise entre 0 et 600.';
            }

            $(this).after('<span id="' + field + 'ErrorMsg" class="help-block"><strong>' + errorMsg + '</strong></span>');
        } else {
            $('#group-' + field).removeClass('has-error');
            $('#group-' + field).addClass('has-success');
        }
    });
}

$('#reset').on('click', function() {
    $('[name="json-form"] input[type="text"]').val('');
    $('[name="json-form"] input[type="number"]').val('');
    $('[name="json-form"] div').removeClass('has-error');
    $('[name="json-form"] div').removeClass('has-success');
    $('[name="json-form"] div div .help-block').remove();
    $('.alert').remove();
});

validURL(field = 'url');
validNumber(field = 'reloadTimeout', min = 0, max = 600);

$('[name="screenOrientation"]').on('blur change', function() {
    $('#screenOrientationErrorMsg').remove();

    if ($(this).val() == null) {
        $('#group-screenOrientation').removeClass('has-success');
        $('#group-screenOrientation').addClass('has-error');

        $(this).after('<span id="screenOrientationErrorMsg" class="help-block"><strong>Veuillez sélectionner une orientation</strong></span>');
    } else {
        $('#group-screenOrientation').removeClass('has-error');
        $('#group-screenOrientation').addClass('has-success');
    }
});

validNumber(field = 'screenSaverTimeout', min = 0, max = 600);
validNumber(field = 'screenSaverDelay', min = 0, max = 60);
validURL(field = 'screenSaverImage1');
validURL(field = 'screenSaverImage2');
validURL(field = 'screenSaverImage3');
