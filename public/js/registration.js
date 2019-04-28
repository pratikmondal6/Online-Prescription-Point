$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip({ placement: 'auto top' });

    $("#datePicker").datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: "-216M -0D"
    });

    var error_firstname = true;
    var error_lastname = true;
    var error_email = true;
    var error_emailExist = true;
    var error_pass = true;
    var error_cpass = true;
    var error_dob = true;

    $('input[name="email"]').keyup(function() {
        checkEmail();
    });

    $('input[name="email"]').focusout(function() {
        checkEmail();
    });


    function checkEmail() {

        var value = $('input[name="email"]').val();
        $.ajax({
            type: 'GET',
            url: "/register/ajax/" + value,
            success: function(result) {
                if (result.length != '') {
                    error_emailExist = false;
                    $('#e_error').html('*Email is already registered')
                        .css({ 'color': 'red' });
                } else {
                    error_emailExist = true;
                    $('#e_error').html("");
                }
            }
        });

    }

    $('input[name="f_name"]').focusout(function() {
        validateFirstname();
    });

    function validateFirstname() {
        var name = $('input[name="f_name"]').val();
        if ($.trim(name) == "") {
            error_firstname = false;
            $('#f_error').html('*First Name is required')
                .css({ 'color': 'red' });
        } else {
            error_firstname = true;
            $('#f_error').html("");
        }
        return error_firstname;
    }

    $('input[name="l_name"]').focusout(function() {
        validateLastname();
    });

    function validateLastname() {
        var lname = $('input[name="l_name"]').val();
        if ($.trim(lname) == "") {
            error_lastname = false;
            $('#l_error').html('*Last Name is required')
                .css({ 'color': 'red' });
        } else {
            error_lastname = true;
            $('#l_error').html("");
        }
        return error_lastname;
    }

    $('input[name="email"]').focusout(function() {
        validateEmail();
    });

    function validateEmail() {
        var em = $('input[name="email"]').val();
        if ($.trim(em) == "") {
            error_email = false;
            $('#e_error').html('*Email is required')
                .css({ 'color': 'red' });
        } else {
            if (error_emailExist) {
                error_email = true;
                $('#e_error').html("");
            }
        }
        return error_email;
    }

    $('input[name="pass"]').focusout(function() {
        validatePassword();
    });

    function validatePassword() {
        var p = $('input[name="pass"]').val();
        if ($.trim(p) == "") {
            error_pass = false;
            $('#p_error').html('*Password is required')
                .css({ 'color': 'red' });
        } else {
            error_pass = true;
            $('#p_error').html("");
        }
        return error_pass;
    }

    $('input[name="c_pass"]').focusout(function() {
        validateConfirmPassword();
    });

    function validateConfirmPassword() {
        var cpass = $('input[name="c_pass"]').val();
        if ($.trim(cpass) == "") {
            error_cpass = false;
            $('#cp_error').html('*Confirm password is required')
                .css({ 'color': 'red' });
        } else {
            error_cpass = true;
            $('#cp_error').html("");
            error_cpass = checkPassword();
        }
        return error_cpass;
    }

    function checkPassword() {
        var pass = $('input[name="pass"]').val();
        var cpass = $('input[name="c_pass"]').val();
        if (pass != cpass) {
            error_cpass = false;
            $('#cp_error').html("Password miss-matched");
        } else {
            error_cpass = true;
            $('#cp_error').html("");
            if (pass.length < 4) {
                error_cpass = false;
                $('#cp_error').html("Password length less than 4");
            }
        }
        return error_cpass;
    }


    $('input[name="dob"]').focusout(function() {
        validatedob();
    });

    function validatedob() {
        var dob = $('input[name="dob"]').val();
        if ($.trim(dob) == "") {
            error_dob = false;
            $('#dob_error').html('*Date of birth is required')
                .css({ 'color': 'red' });
        } else {
            error_dob = true;
            $('#dob_error').html("");
        }
        return error_dob;
    }

    $('button[type="submit"]').click(function() {
        var error_fn = validateFirstname();
        var error_ln = validateLastname();
        var error_e = validateEmail();
        var error_p = validatePassword();
        var error_cp = validateConfirmPassword();
        var error_d = validatedob();

        if (error_fn && error_ln && error_e && error_p && error_cp && error_d && error_emailExist) {
            return true;
        } else {
            return false;
        }
    });

});