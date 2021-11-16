$(document).ready(function() {
    $("#email").on( 'focusout', function() {
        var email = $(this).val();
        $.post("./ajax/contactCheckEmail", {email: email}, function(resp) {
            resp = resp.slice(1, -1);
            if (resp === "email_empty") {
                $('#em-invalid').html("Please enter email address.");
                $('#em-invalid').show();
                $('#em-validate').hide();
                $('#email').addClass('is-invalid');
                $('#email').removeClass('is-valid');
            } else if (resp === "email_invalid") {
                $('#em-invalid').html("Please enter the correct email format.");
                $('#em-invalid').show();
                $('#em-validate').hide();
                $('#email').addClass('is-invalid');
                $('#email').removeClass('is-valid');
            } else {
                $('#email').addClass('is-valid');
                $('#em-invalid').hide();
                $('#em-validate').hide();
                $('#email').removeClass('is-invalid');
            }
        });
    });    
});