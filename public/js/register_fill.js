$(document).ready(function() {
    $("#username").on( 'focusout', function() {
        var un = $(this).val();
        $.post("./ajax/regCheckUsername", {username: un}, function(resp) {
            resp = resp.slice(1, -1);
            if (resp === "un_valid") {
                // $('#un-valid').show();
                $('#username').addClass('is-valid');
                $('#un-helper').show();
                $('#un-helper').html('');
                $('#un-validate').hide();
                $('#un-invalid').hide();
                $('#username').removeClass('is-invalid'); 
            }
            else if (resp === "un_existed") {
                $('#un-helper').hide();
                $('#un-invalid').html("Username existed.");
                $('#un-invalid').show();
                $('#un-validate').hide();
                $('#username').addClass('is-invalid');
                // $('#un-valid').hide();
                // $('#username').removeClass('is-valid');
            }
            else if (resp === "un_invalid") {
                $('#un-helper').hide();
                $('#un-invalid').html("Username is at least 3 characters long, can only contain letters and numbers.");
                $('#un-invalid').show();
                $('#un-validate').hide();
                $('#username').addClass('is-invalid');
                // $('#un-valid').hide();
                // $('#username').removeClass('is-valid');
            }
        });
    });
    $("#password").on( 'focusout', function() {
        var passwd = $(this).val();
        $.post("./ajax/regCheckPassword", {password: passwd}, function(resp) {
            resp = resp.slice(1, -1);
            if (resp === "passwd_invalid") {
                $('#password-invalid').show();
                $('#password-helper').hide();
                $('#password-validate').hide();
                $('#password-invalid').html("Password must be at least 5 characters long, must have at least 1 letter, 1 numeric character, 1 special character and 1 uppercase letter.");                $('#password').addClass('is-invalid');
                $('#password').removeClass('is-valid');               
            }
            else {
                $('#password').addClass('is-valid');
                $('#password-helper').show();
                $('#password-helper').html('');
                $('#password-invalid').hide();
                $('#password-validate').hide();
                $('#password').removeClass('is-invalid');
            }
        });
    });
    $("#confirm-password").on( 'focusout', function() {
        var confirmPasswd = $(this).val();
        var passwd = $("#password").val();
        console.log(passwd);
        $.post("./ajax/regCheckConfirmPassword", {password: passwd, confirmPassword: confirmPasswd}, function(resp) {
            resp = resp.slice(1, -1);
            console.log(resp);
            if (resp === "confirmPasswd_empty") {
                $('#confirm-passwd-invalid').show();
                $('#confirm-passwd-helper').hide();
                $('#confirm-passwd-validate').hide();
                $('#confirm-passwd-invalid').html("Please re-enter your password here.");
                $('#confirm-password').addClass('is-invalid');
                $('#confirm-password').removeClass('is-valid');
            }
            else if (resp === "confirmPasswd_notmatch") {
                $('#confirm-passwd-invalid').show();
                $('#confirm-passwd-helper').hide();
                $('#confirm-passwd-validate').hide();
                $('#confirm-passwd-invalid').html("Password do not match, please try again.");
                $('#confirm-password').addClass('is-invalid');
                $('#confirm-password').removeClass('is-valid');
            } 
            else {
                $('#confirm-password').addClass('is-valid');
                $('#confirm-passwd-invalid').hide();
                $('#confirm-passwd-validate').hide();
                $('#confirm-passwd-helper').show();
                $('#confirm-passwd-helper').html('');
                $('#confirm-password').removeClass('is-invalid');
            }
        });
    });
    $("#email").on( 'focusout', function() {
        var email = $(this).val();
        $.post("./ajax/regCheckEmail", {email: email}, function(resp) {
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
            } else if (resp === "email_existed") {
                $('#em-invalid').html("Email existed.");
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